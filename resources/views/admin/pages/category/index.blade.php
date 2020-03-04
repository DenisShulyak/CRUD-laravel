@extends('admin.layouts.app')

@section('content')

    <div class="mb-3">
        <a class="btn btn-success" href="{{route('admin.category.create')}}">
            Add category
        </a>
    </div>
    @if($categories->count())

    <table class="table table-bordered">
        <thead>
        <tr>
            <th nowrap style="width: 1%">Id</th>
            <th>Автор</th>
            <th>Название</th>
            <th nowrap style="width: 1%">Действие</th>

        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->user->username}}</td>
            <td>{{$category->name}}</td>
                <td>
                    <a href="{{route('admin.category.edit', $category)}}">Edit</a>
                    <a class="text-danger" href="{{$delete = route('admin.category.destroy', $category)}}" onclick="event.preventDefault();document.getElementById('delete{{$category->id}}').submit()">Delete
                    <form id="delete{{$category->id}}" action="{{$delete}}" method="post" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                    </a>

                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
        @else
        <div class="alert alert-secondary">
            Нечего отображать -_-
        </div>
    @endif
    @endsection