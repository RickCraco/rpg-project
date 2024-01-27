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
        <form action="{{route('admin.types.update', $type)}}" enctype="multipart/form-data" method="POST" class="p-3">
            @csrf
            @method('PUT')
                <input type="text" id="name" value="{{old('name', $type->name)}}" name="name" placeholder="Name" class="form-control my-2">
                <input type="text" id="description" value="{{old('description', $type->description)}}" name="description" placeholder="Description" class="form-control my-2">
                <label for="image" class="text-white">Image</label>
                <input type="file" id="image" name="image" value="{{old('image', $type->image)}}" class="form-control my-2">
                <label for="icon" class="text-white">Icon</label>
                <input type="file" id="icon" name="icon" value="{{old('icon', $type->icon)}}" class="form-control my-2">
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
</div>
@endsection
