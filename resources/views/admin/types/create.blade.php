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
        <form action="{{route('admin.types.store')}}" enctype="multipart/form-data" method="POST" class="p-3">
            @csrf
                <div>
                    <input type="text" id="name" required  name="name" placeholder="Name" class="form-control my-2 @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" id="description"  name="description" placeholder="Description" class="form-control my-2  @error('name') is-invalid @enderror">
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-danger">Reset</button>

        </form>
</div>
@endsection
