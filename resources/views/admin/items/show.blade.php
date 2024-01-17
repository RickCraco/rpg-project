@extends('layouts.app')
@section('content')
<main class="bg-dark">
    <section class="container py-4">
        <h1 class="text-white">{{$item->name}}</h1>
        <div class="row gy-4">
            <div class="col-12 w-50">
                <div class="card">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{$item->name}}" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">{{$item->description}}</p>
                        <div>
                            <h2 class="fw-bold">Statistics</h2>
                            <h5>Category: {{ $item->category }}</h5>
                            <h5>Weight: {{ $item->weight }}</h5>
                            <h5>Cost: {{ $item->cost }}</h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('admin.items.edit', $item)}}" class="text-white btn btn-primary my-3">Edit</a>
    </section>
</main>
@endsection
