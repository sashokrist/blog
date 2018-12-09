@extends('layouts.app')

@section('content')
    <h2>Users</h2><hr>

    <div class="row">
        <div class="col-md-2">
            Image
        </div>
        <div class="col-md-2">
            Name
        </div><br>
        <div class="col-md-2">
            Permission
        </div><br>
        <div class="col-md-2">
            Delete
        </div>
    </div><hr style="border-style: inset; border-width: 3px;">
    @if($users->count() > 0)
        @foreach($users as $user)
            <div class="row">
               <div class="col-md-2">

                  <img src="{{ asset($user->profile->avatar) }}" style="margin-bottom: 5px; border-radius: 50%;" width="90px" height="50px">
                </div>
                <div class="col-md-2">
                    {{ $user->name }}
                </div>
                <div class="col-md-2">
                   @if($user->admin)
                        <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-danger">Remove admin</a>
                       @else
                       <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-primary">Make admin</a>
                       @endif
                </div>
                <div class="col-md-2">
                    delete
                </div>
            </div>
        @endforeach
    @else
        <span>No users.</span>
    @endif

    <hr>
@endsection