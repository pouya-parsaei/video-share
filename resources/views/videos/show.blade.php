@extends('layout')
@section('content')
    <x-validation-errors/>
    <div class="row">
        <!-- Watch -->
        <div class="col-md-8">
            <div id="watch">

                <!-- Video Player -->
                <h1 class="video-title">{{ $video->name }}</h1>
                <div class="video-code">
                    <video controls style="height: 100%; width: 100%;">
                        <source
                            src="{{ $video->video_url  }}"
                            type="video/mp4">
                    </video>
                </div>

                <div>
                    <p>
                        {{ $video->description }}
                    </p>
                </div>

                <div class="video-share">
                    <x-video-like :video="$video" />



                    <ul class="social_link">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li><a class="youtube" href="#"><i class="fa fa-youtube-play"
                                                           aria-hidden="true"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                        <li><a class="google" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        </li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li><a class="rss" href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                    </ul><!-- // Social -->
                </div><!-- // video-share -->
                <!-- // Video Player -->


                <!-- Chanels Item -->
                <div class="chanel-item">
                    <div class="chanel-thumb">
                        <a href="#"><img src="{{ $video->owner_gravatar }}" alt=""></a>
                    </div>
                    <div class="chanel-info">
                        <a class="title" href="#">{{ $video->owner_name }}</a>
                        <span class="subscribers">436,414 اشتراک</span>
                    </div>
                    <a href="#" class="subscribe">اشتراک</a>
                </div>
                <!-- // Chanels Item -->


                <!-- Comments -->
                <x-video-comments :video="$video"/>
                <!-- // Comments -->


            </div><!-- // watch -->
        </div><!-- // col-md-8 -->
        <!-- // Watch -->

        <x-related-videos :video="$video"/>
    </div><!-- // row -->

@endsection()
@section('scripts')
    <script src="{{ asset('js/show.js') }}"/>
@endsection
