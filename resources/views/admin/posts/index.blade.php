@extends('layouts.app')

@section('content')
    <h2>Posts</h2><hr>

        <div class="row">
            <div class="col-md-2">
                Image
            </div>
            <div class="col-md-2">
               Title
            </div><br>
            <div class="col-md-2">
                Edit
            </div><br>
            <div class="col-md-2">
                Trash
            </div>
        </div><hr style="border-style: inset; border-width: 3px;">
    @if($posts->count() > 0)
        @foreach($posts as $post)
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ $post->featured }}" width="90px" height="50px">
                </div>
                <div class="col-md-2">
                    {{ $post->title }}
                </div>
                <div class="col-md-2">
                    <a href="{{ route('post.edit', ['id' =>$post->id]) }}" class="btn btn-info"><span><i class="fas fa-pencil-alt"></i></span></a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('post.delete', ['id' =>$post->id]) }}" class="btn btn-danger"> <span><i class="fas fa-trash-alt"></i></span></a>
                </div>
            </div>
        @endforeach
        @else
        <span>No posts.</span>
        @endif

    <hr>
@endsection