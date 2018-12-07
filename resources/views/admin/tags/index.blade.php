@extends('layouts.app')

@section('content')
    <h2>Tags</h2><hr>
    <div class="row">
        <div class="col-md-2">
            Name
        </div>
        <div class="col-md-2">
            Edit
        </div><br>
        <div class="col-md-2">
            Delete
        </div>
    </div><hr style="border-style: inset; border-width: 3px;">
    @if($tags->count() > 0)
        @foreach($tags as $tag)
            <div class="row">
                <div class="col-md-2">
                    {{ $tag->tag }}
                </div>
                <div class="col-md-2">
                    <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-info">
                        <span><i class="fas fa-pencil-alt"></i></span>
                    </a>
                </div><br>
                <div class="col-md-2">
                    <a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-danger">
                        <span><i class="fas fa-trash-alt"></i></span>
                    </a>
                </div>
            </div><hr>
        @endforeach
    @else
        <span>No tags yet</span>
    @endif

@endsection