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
        <form action="{{route('admin.characters.store')}}" enctype="multipart/form-data" method="POST" class="p-3">
            @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" id="name"  name="name" placeholder="Name" class="form-control my-2 @error('name') is-invalid @enderror" required>
                    @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="attack">Attack</label>
                    <input type="text" id="attack" required  name="attack" placeholder="Attack" class="form-control my-2 @error('attack') is-invalid @enderror">
                    @error('attack')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                     <label for="description">Description</label>
                     <input type="text" id="description" name="Description" placeholder="Description" class="form-control my-2 @error('description') is-invalid @enderror">
                  @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="defence">Defence</label>
                    <input type="text" id="defence" required name="defence" placeholder="Defense" class="form-control my-2 @error('defence') is-invalid @enderror">
                     @error('defence')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="life">Life</label>
                    <input type="text" id="life" name="life" required placeholder="HP" class="form-control my-2 @error('life') is-invalid @enderror">
                     @error('life')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="speed">Speed</label>
                    <input type="text" id="speed" name="speed" required  placeholder="Speed" class="form-control my-2  @error('speed') is-invalid @enderror">
                    @error('speed')
                            <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                        <label for="type">Select Type</label>
                        <select class="form-control @error('item_id') is-invalid @enderror" name="type_id" id="type_id">
                            <option value="">Select a Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                        @foreach ($items as $item)
                            <input type="checkbox" class="mx-2 @error('item') is-invalid @enderror" name="item[]" id="item" value="{{ $item->id }}" {{ in_array($item->id, old('item', [])) ? 'checked' : '' }}>
                            <label for="item">{{ $item->name }}</label>
                        @endforeach
                        @error('item')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" required class="form-control my-2 @error('speed') is-invalid @enderror">
                    @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reser" class="btn btn-danger">Reset</button>
        </form>
</div>
@endsection
