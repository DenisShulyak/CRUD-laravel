@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-lg-3">
            @include('admin.blocks.error')
            <div class="card card-body">
                <form method="post"
                      action="{{($update ?? false) ? route('admin.post.update', $category) : route('admin.post.store')}}">
                    @csrf
                    @if($update ?? false)
                        @method('PUT')
                    @endif
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id" >
                            <option value="0" selected disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{(old('category_id')?? ($post->category_id ?? null)) == $category->id ? 'selected':''}}>{{$category->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group custom-file">
                        <label for="image" class="custom-file-label">Image</label>
                        <input type="file" name="image" id="image" class="custom-file-label">
                    </div>

                    <button class="btn btn-primary" type="submit">{{($update ?? false) ? 'Обновить' : 'Сохранить' }}</button>

                </form>
            </div>
        </div>

    </div>

@endsection