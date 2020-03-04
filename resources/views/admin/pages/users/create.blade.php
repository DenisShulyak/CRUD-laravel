@extends('admin.layouts.app')


@section('content')
    <div class="row">
        <div class="col-xs-12 col-lg-4">
            @include('admin.blocks.error')
    <div class="card card-body">

    <form method="post" action="{{route('admin.user.store')}}">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password confirm</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password confirmation">
        </div>
        <div class="form-group">
            <input id="superadmin" type="checkbox" name="superadmin" value="1">
            <label for="superadmin">superadmin</label>
        </div>
        <button class="btn btn-success" type="submit">
            Save
        </button>
    </form>
    </div>

        </div>
    </div>
    @endsection