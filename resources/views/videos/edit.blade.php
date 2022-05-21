@extends('layout')
@section('content')
    <x-validation-errors/>
    <div id="upload">
        <div class="row">
            <!-- upload -->
            <div class="col-md-8">
                <h1 class="page-title"><span>آپلود</span> فیلم</h1>
                <form action="{{ route('videos.update',$video->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <label>@lang('videos.name')</label>
                            <input type="text" name="name" value="{{ old('name',$video->name) }}" class="form-control" placeholder="@lang('videos.name')">
                        </div>
                        <div class="col-md-6">
                            <label>@lang('videos.video')</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>@lang('videos.length')</label>
                            <input type="text" name="length" value="{{ old('length',$video->length) }}"  class="form-control" placeholder="@lang('videos.length')">
                        </div>
                        <div class="col-md-6">
                            <label>@lang('videos.slug')</label>
                            <input id="upload_file" name="slug" value="{{ old('slug',$video->slug) }}"  type="text" class="file form-control">
                        </div>
                        <div class="col-md-12">
                            <label>@lang('videos.description')</label>
                            <textarea name="description" value="{{ old('description',$video->description) }}"  class="form-control" rows="4" placeholder="@lang('videos.description')"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>@lang('videos.thumbnail')</label>
                            <input id="featured_image" name="thumbnail" value="{{ old('thumbnail',$video->thumbnail) }}"  type="text" class="file form-control">
                        </div>
                        <div class="col-md-6">
                            <label>@lang('categories.category')</label>
                            <select name="category_id" class="form-control">
                                <option value="">@lang('messages.categories.choose')</option>
                                @foreach($categories as $category)
                                    <option value="{{ old('category_id',$category->id) }}"
                                            {{ old('category_id',$category->id) == $category->id ? 'selected' : '' }}
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="contact_submit" class="btn btn-dm">ذخیره</button>
                        </div>
                    </div>
                </form>
            </div><!-- // col-md-8 -->

            <div class="col-md-4">
                <a href="#"><img src="{{ asset('img/upload-adv.png') }}" alt=""></a>
            </div><!-- // col-md-8 -->
            <!-- // upload -->
@endsection()
