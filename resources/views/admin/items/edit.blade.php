@extends('layouts.app')
@section('content')

<div class="container" style="padding-top: 100px;">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('admin.items.update', $item)}}" enctype="multipart/form-data" method="POST" class="p-3">
            @csrf
            @method('PUT')
                <input type="text" id="name" value="{{old('name', $item->name)}}" name="name" placeholder="Name" class="form-control my-2">
                <input type="text" id="slug" value="{{old('slug', $item->slug)}}" name="slug" placeholder="slug" class="form-control my-2">
                <input type="text" id="type" value="{{old('type', $item->type)}}" name="type" placeholder="type" class="form-control my-2">
                <input type="text" id="weight" value="{{old('weight', $item->weight)}}" name="weight" placeholder="weight" class="form-control my-2">
                <input type="text" id="cost" name="cost" value="{{old('cost', $item->cost)}}" placeholder="Cost" class="form-control my-2">
                <input type="text" id="category" name="category" value="{{old('category', $item->category)}}" placeholder="Category" class="form-control my-2">
                <input type="file" id="image" name="image" value="{{old('image', $item->image)}}" class="form-control my-2">
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
</div>
@endsection
