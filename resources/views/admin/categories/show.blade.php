@extends('layouts.app')

@section('content')
    <h2>Categories</h2><hr>
    <div class="row text-center">
        <hr style="border-style: inset; border-width: 3px;">
        <div class="col-12">
           <h1>{{ $categories->name }}</h1>
        </div>
    </div><hr style="border-style: inset; border-width: 3px;">
   

@endsection