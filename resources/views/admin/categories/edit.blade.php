@extends('layouts.app')

@section('content')
 @include('admin.includes.errors')
    <div>
        <div>
            Update Category: {{ $category->name }}
        </div>
        <div class="panel-body">
            <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">
                <input type="hidden" value="{{ Session::token() }}" name="_token">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection