@extends('admin.layouts.app')

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger mb-7">
                {{$error}}
            </div>
    @endforeach
        @endif
    <h1 >{{$user->username}}</h1>
    <p class="lead">
        <b>Создан</b> {{$user->created_at}}
    </p>
    <div class="card">
        <div class="card-header">
            Смена пароля
        </div>
        <div class="card-body">
            <form action="{{route('user.password')}}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="New Password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn btn-success">Обновить пароль</button>
            </form>
        </div>
    </div>
    @endsection