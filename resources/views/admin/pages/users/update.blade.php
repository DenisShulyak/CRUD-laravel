@extends('admin.layouts.app')


@section('content')
    <div class="row">
        <div class="col-xs-12 col-lg-4">
            @include('admin.blocks.error')
            <div class="card card-body">
                <form method="post" action="{{route('admin.user.update', $user)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')??$user->username}}" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input  type="hidden" name="superadmin" value="0" hidden>
                        <input id="superadmin" type="checkbox" name="superadmin" value="1" {{(old('superadmin')??$user->superadmin) ? 'checked' : ''}}>
                        <label for="superadmin" >superadmin</label>
                    </div>
                    <button class="btn btn-success" type="submit">
                        Save
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection