@extends('layouts.app')

@section('content')
    <h2>Trashed Posts</h2><hr>

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
            Restore
        </div>
        <div class="col-md-2">
            Delete
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
                    <a href="#" class="btn btn-info"><span><i class="fas fa-pencil-alt"></i></span></a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('post.restore', ['id' =>$post->id]) }}" class="btn btn-success"> <span><i class="fas fa-window-restore"></i></span></a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('post.kill', ['id' =>$post->id]) }}" class="btn btn-danger"> <span><i class="fas fa-trash-alt"></i></span></a>
                </div>
            </div>
        @endforeach
        @else
        <span>No trashed posts.</span>
        @endif

    <hr>
@endsection