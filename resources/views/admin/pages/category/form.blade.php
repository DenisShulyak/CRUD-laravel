<?php
$update = $update ?? false;
?>

@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-lg-3">
            @include('admin.blocks.error')
            <div class="card card-body">
                <form method="post"
                      action="{{$update ? route('admin.category.update', $category) : route('admin.category.store')}}">
                    @csrf
                    @if($update)
                        @method('PUT')
                    @endif
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') ?? ($category->name ?? "") }}"
                               class="form-control">
                    </div>

                    <button class="btn btn-primary" type="submit">{{$update ? 'Обновить' : 'Сохранить' }}</button>

                </form>
            </div>
        </div>

    </div>

@endsection