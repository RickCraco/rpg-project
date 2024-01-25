@extends('layouts.app')
@section('content')
    <main class="bg-dark pt-120 vh-100">
        <section class="container py-4">
            <h1 class="text-white">{{ $item->name }}</h1>
            <div class="row gy-4">
                <div class="col-12 w-50">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">{{ $item->description }}</p>
                            <h2 class="fw-bold">Statistics</h2>
                            <ul style="list-style: none" class="p-0">
                                <li>Category: {{ $item->category }}</li>
                                <li>Weight: {{ $item->weight }}</li>
                                <li>Cost: {{ $item->cost }}</li>
                            </ul>

                            <h4>Charaters with this Weapon</h4>
                            @foreach ($item->characters as $items)
                                <li><a class="text-dark text-decoration-none"
                                        href="{{ route('admin.characters.show', $items->id) }}">{{ $items->name }}</a></li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.items.edit', $item) }}" class="text-white btn btn-primary my-3">Edit</a>
        </section>
    </main>
@endsection
