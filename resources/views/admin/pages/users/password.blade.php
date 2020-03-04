@extends('admin.layouts.app')


@section('content')
    <div class="row">
        <div class="col-xs-12 col-lg-4">
            @include('admin.blocks.error')
            <div class="card card-body">
                <form method="post" action="{{route('admin.user.password.update', $user)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password confirm</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password confirmation">
                    </div>
                    <button class="btn btn-success" type="submit">
                        Save
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection