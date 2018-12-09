@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create new post
        </div>
        <div class="panel-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{{ Session::token() }}" name="_token">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" name="featured" class="form-control" id="featured">
                </div>
                <div class="form-group">
                    <label for="category">Select a Category image</label>
                   <select name="category_id" id="category" class="form-control">
                       @foreach($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label for="tags">Select tags</label>
                    @foreach($tags as $tag)
                        <div class="custom-checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label>
                        </div>
                        @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea cols="5" rows="5" name="content_post" class="form-control" id="content"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection