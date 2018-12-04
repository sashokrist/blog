@extends('layouts.app')

@section('content')
        <h2>Categories</h2><hr>
        @foreach($categories as $category)
            <div class="row">
            <div class="col-md-4">
                {{ $category->name }}
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
    @endsection