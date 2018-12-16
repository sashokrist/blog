@extends('layouts.app')

@section('content')
        <h2>Categories</h2><hr>
        <div class="row">
            <div class="col-md-2">
                Name
            </div>
            <div class="col-md-2">
                Delete
            </div><br>
            <div class="col-md-2">
                Edit
            </div>
        </div><hr style="border-style: inset; border-width: 3px;">
        @if($categories->count() > 0)
            @foreach($categories as $category)
                <div class="row">
                    <div class="col-md-2">
                       <a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->name }}</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger">
                            <span><i class="fas fa-trash-alt"></i></span>
                        </a>
                    </div><br>
                    <div class="col-md-2">
                        <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info">
                            <span><i class="fas fa-pencil-alt"></i></span>
                        </a>
                    </div>
                </div><hr>
            @endforeach
            @else
            <span>No Categories created</span>
            @endif

    @endsection