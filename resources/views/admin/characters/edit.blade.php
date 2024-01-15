@extends('layouts.app')
@section('content')

<div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('admin.characters.update', $character->id)}}" enctype="multipart/form-data" method="POST" class="p-3">
            @csrf
            @method('PUT')
                <input type="text" id="name" value="{{old('name', $character->name)}}" name="name" placeholder="Name" class="form-control my-2">
                <input type="text" id="description" value="{{old('description', $character->description)}}" name="Description" placeholder="Description" class="form-control my-2">
                <input type="text" id="attack" value="{{old('attack', $character->attack)}}" name="attack" placeholder="Attack" class="form-control my-2">
                <input type="text" id="defence" value="{{old('defence', $character->defence)}}" name="defence" placeholder="Defense" class="form-control my-2">
                <input type="text" id="life" name="life" value="{{old('life', $character->life)}}" placeholder="HP" class="form-control my-2">
                <input type="text" id="speed" name="speed" value="{{old('speed', $character->speed)}}" placeholder="Speed" class="form-control my-2">
                <input type="file" id="image" name="image" value="{{old('image', $character->image)}}" class="form-control my-2">
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
</div>
@endsection
