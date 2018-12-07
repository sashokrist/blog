@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create new Tag
        </div>
        <div class="panel-body">
            <form action="{{ route('tag.store') }}" method="post">
                <input type="hidden" value="{{ Session::token() }}" name="_token">
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" name="tag" class="form-control" id="tag">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Store Tag
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection