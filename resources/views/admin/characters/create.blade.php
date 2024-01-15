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
        <form action="{{route('character.store', $character->id)}}" method="POST" class="p-3" enctype="multipart/form-data">
            @csrf
                <input type="text" id="name" name="name" placeholder="Name" class="form-control my-2" required>
                <input type="text" id="description"  name="Description" placeholder="Description" class="form-control my-2">
                <input type="text" id="attack"  name="attack" placeholder="Attack" class="form-control my-2" required>
                <input type="text" id="defence" name="sale_date" placeholder="Sale" class="form-control my-2">
                <input type="text" id="life" name="life"  placeholder="HP" class="form-control my-2" required>
                <input type="text" id="speed" name="speed" placeholder="Speed" class="form-control my-2" required>
            <div class="mb-3 text-white">
                  <label for="image">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{old('image')}}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Profile') }}
    </h2>
    <div class="card p-4 mb-4 bg-white shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
