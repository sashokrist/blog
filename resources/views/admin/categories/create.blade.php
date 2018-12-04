@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create new Category
        </div>
        <div class="panel-body">
            <form action="{{ route('category.store') }}" method="post">
                <input type="hidden" value="{{ Session::token() }}" name="_token">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Store Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection