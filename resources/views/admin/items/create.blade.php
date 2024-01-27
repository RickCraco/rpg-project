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
        <form action="{{route('admin.items.store')}}" enctype="multipart/form-data" method="POST" class="p-3">
            @csrf
                <div class="mb-3">
                     <label for="name" class="text-white">Name</label>
                     <input type="text" id="name"  name="name" placeholder="Name" class="form-control my-2 @error('name') is-invalid @enderror" required minlength="3" maxlength="200">
                        @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="text-white">Slug</label>
                    <input type="text" id="slug" name="slug" required placeholder="slug" class="form-control my-2 @error('slug') is-invalid @enderror">
                     @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="text-white">Type</label>
                        <input type="text" id="type"  name="type" required placeholder="type" class="form-control my-2 @error('type') is-invalid @enderror">
                         @error('type')
                         <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="text-white">Weight</label>
                        <input type="text" id="weightweightweight"  name="weight"  required placeholder="weight" class="form-control my-2 @error('weight') is-invalid @enderror">
                        @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="text-white">Cost</label>
                        <input type="text" id="cost" name="cost" required  placeholder="Cost" class="form-control my-2 @error('Cost') is-invalid @enderror">
                        @error('cost')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   <div class="mb-3">
                        <label for="category" class="text-white">Category</label>
                        <input type="text" id="category" name="category" required placeholder="Category" class="form-control my-2 @error('Category') is-invalid @enderror">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-danger">Reset</button>
        </form>
</div>
@endsection
