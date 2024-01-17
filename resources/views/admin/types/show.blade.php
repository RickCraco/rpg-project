@extends('layouts.app')
@section('content')
<main class="bg-dark">
    <section class="container py-4">
        <h1 class="text-white">{{$type->name}}</h1>
        <div class="row gy-4">
            <div class="col-12 w-50">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{$type->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('admin.types.edit', $type)}}" class="text-white btn btn-primary my-3">Edit</a>
    </section>
</main>
@endsection
