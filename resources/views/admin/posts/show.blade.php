@extends('layouts.app')

@section('content')
    <h2>{{ $posts->title }}</h2><hr>
    <hr style="border-style: inset; border-width: 3px;">

            <div class="row">
                <div class="col-md-2">
                    <img src="{{ $posts->featured }}" style="margin-bottom: 5px;" width="90px" height="50px">
                </div>
                <div class="col-md-8">
                    {{ $posts->content_post }}
                </div>
            </div>
    <div class="row">
        <div class="col-md-4">
          <span>Created: {{ $posts->created_at }}</span>
        </div>
        <div class="col-md-4">
          <span>Updated {{ $posts->updated_at }}</span>
        </div>
    </div>
    <hr>
@endsection