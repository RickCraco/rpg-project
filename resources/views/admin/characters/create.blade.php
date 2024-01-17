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
        <form action="{{route('admin.characters.store', $character->id)}}" enctype="multipart/form-data" method="POST" class="p-3">
            @csrf
                <input type="text" id="name"  name="name" placeholder="Name" class="form-control my-2">
                <input type="text" id="description" name="Description" placeholder="Description" class="form-control my-2">
                <input type="text" id="attack"  name="attack" placeholder="Attack" class="form-control my-2">
                <input type="text" id="defence" name="defence" placeholder="Defense" class="form-control my-2">
                <input type="text" id="life" name="life"  placeholder="HP" class="form-control my-2">
                <input type="text" id="speed" name="speed"  placeholder="Speed" class="form-control my-2">
                <input type="file" id="image" name="image"  class="form-control my-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reser" class="btn btn-danger">Reset</button>
        </form>
</div>
@endsection