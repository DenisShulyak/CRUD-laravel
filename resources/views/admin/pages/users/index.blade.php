<?php
use Illuminate\Database\Eloquent\Collection;
/**
 * @var Collection User[] $users
 */
?>
@extends('admin.layouts.app')


@section('content')



    <div class="mb-3">
        <a href="{{route('admin.user.create')}}" class="btn btn-success">
            Добавить пользователя
        </a>
    </div>
    <table class="table">
     <thead>
        <tr>
            <th>id</th>
            <th>Имя пользователя</th>
            <th nowrap style="width: 1%">Действие</th>
        </tr>

     </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>
                {{$user->id}}
            </td>
            <td>
                <a >
                {{$user->username}}
                    @if($user->superadmin)
                        <span class="badge badge-primary">Admin</span>
                    @endif
                </a>
            </td>
            <td>
                @if($user->name != 'admin' && $user->id != 1)
            <a href="{{route('admin.user.edit',$user)}}">Редактировать</a>
            <a  href="{{route('admin.user.password.edit', $user)}}" class="text-warning">Обновить пароль</a>
            <a href="{{route('admin.user.destroy', $user)}}" class="text-danger" onclick="event.preventDefault();document.getElementById('delete-{{$user->id}}').submit();">Удалить
            <form id="delete-{{$user->id}}" action="{{route('admin.user.destroy', $user)}}" method="post" class="d-none">
                @csrf
                @method('DELETE')
            </form>
            </a>
                    @endif
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>

    @endsection