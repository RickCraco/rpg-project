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
        <form action="{{route('admin.characters.update', $character)}}" enctype="multipart/form-data" method="POST" class="p-3">
            @csrf
            @method('PUT')
                <input type="text" id="name" value="{{old('name', $character->name)}}" name="name" placeholder="Name" class="form-control my-2">
                <input type="text" id="description" value="{{old('description', $character->description)}}" name="description" placeholder="Description" class="form-control my-2">
                <input type="text" id="attack" value="{{old('attack', $character->attack)}}" name="attack" placeholder="Attack" class="form-control my-2">
                <input type="text" id="defence" value="{{old('defence', $character->defence)}}" name="defence" placeholder="Defense" class="form-control my-2">
                <input type="text" id="life" name="life" value="{{old('life', $character->life)}}" placeholder="HP" class="form-control my-2">
                <input type="text" id="speed" name="speed" value="{{old('speed', $character->speed)}}" placeholder="Speed" class="form-control my-2">
                <div class="mb-3">
                    <label for="type_id">Select Type</label>
                    <select class="form-control @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                        <option value="">Select a type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                                {{ old('type_id', $character->type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <h6>Items:</h6>
                        @foreach ($items as $item)
                            <div class="form-check @error('items') is-invalid @enderror">
                                @if ($errors->any())
                                    <input type="checkbox" class="form-check-input" name="items[]"
                                        value="{{ $item->id }}"
                                        {{ in_array($item->id, old('items', $character->items)) ? 'checked' : '' }}>
                                @else
                                    <input type="checkbox" class="form-check-input" name="items[]"
                                        value="{{ $item->id }}"
                                        {{ $character->items->contains($item->id) ? 'checked' : '' }}>
                                @endif
                                <label class="form-check-label">
                                    {{ $item->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('item_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="file" id="image" name="image" value="{{old('image', $character->image)}}" class="form-control my-2">
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
</div>
@endsection
