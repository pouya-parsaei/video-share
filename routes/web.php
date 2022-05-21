<?php

use App\Http\Controllers\CategoryVideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DisLikeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\VideoController;
use App\Jobs\EmailProcess;
use App\Jobs\Otp;
use App\Mail\VerifyEmail;
use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use App\Notifications\VideoCreated;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/videos/create',[VideoController::class,'create'])->name('videos.create');
Route::post('/videos',[VideoController::class,'store'])->name('videos.store');
Route::get('/videos/show/{video}',[VideoController::class,'show'])->name('videos.show');
Route::get('/videos/{video}/edit',[VideoController::class,'edit'])->name('videos.edit');
Route::put('/videos/{video}',[VideoController::class,'update'])->name('videos.update');
Route::post('videos/{video}/comments',[CommentController::class,'store'])->name('videos.comments.store');
Route::post('/{likeable_type}/{likeable_id}/like',[LikeController::class,'store'])->middleware('auth')->name('likes.store');
Route::post('/{likeable_type}/{likeable_id}/dislike',[DisLikeController::class,'store'])->middleware('auth')->name('dislikes.store');

Route::get('categories/{category}/videos',[CategoryVideoController::class,'index'])->name('categories.videos.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/email',function(){
   return new VerifyEmail(User::find(1));
});

Route::get('verify',function(){
    if (! request()->hasValidSignature()) {
        abort(401);
    }
    return 'verify';
})->name('verify');

Route::get('/generate',function(){
    return URL::temporarySignedRoute(
        'verify', now()->addSeconds(10), ['id' => 1]
    );
});
require __DIR__.'/auth.php';

Route::get('/jobs-email-process',function(){
   EmailProcess::dispatch();
});

Route::get('/jobs-otp',function(){
    Otp::dispatch();
});

Route::get('/email',function(){
    Mail::to('pouya@gmail.com')->send(new VerifyEmail(User::first()));
});

Route::get('/event',function(){
   \App\Events\VideoCreated::dispatch(\App\Models\Video::first());
   \App\Events\UserCreated::dispatch(\App\Models\User::first());
});

Route::get('/notify',function(){
    $user = User::first();
    $video = Video::first();
    $user->notify(new VideoCreated($video));
});


Route::get('/file',function(){
    return Storage::download('contracts/test.png');

    return response()->file(storage_path('app/contracts/test.png'));

    $content = Storage::get('contracts/test.png');
    return Response::make($content)->header('content-type', 'image/jpeg');
});

Route::get('/duration',function(){
    $ffprobe = FFMpeg\FFProbe::create([
        'ffmpeg.binaries' => 'C:/ffmpeg/bin/ffmpeg.exe',
        'fprobe.binaries' => 'C:/ffmpeg/bin/ffprobe.exe',
    ]);
    $duration = $ffprobe
        ->format(Storage::path('videos/1K99ZEYxMLjdUK3Aiki3OjhD5QME9W2dCZd6Om5S.mp4')) // extracts file informations
        ->get('duration');             // returns the duration property

    dd($duration);
});

Route::get('/test',function(){
    $user = User::first();
    $user->notify(new \App\Notifications\TestNotification());
});
