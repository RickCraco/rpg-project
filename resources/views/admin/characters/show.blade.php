@extends('layouts.app')
@section('content')
    <main class="bg-dark pt-120">
        <section class="container py-4">
            <h1 class="text-white">{{ $character->name }}</h1>
            <div class="row gy-4">
                <div class="col-12 w-50">
                    <div class="card">
                        <img src="{{ asset('storage/' . $character->image) }}" alt="{{ $character->name }}"
                            class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">{{ $character->description }}</p>
                            <h2 class="fw-bold">Statistics</h2>
                            <ul style="list-style: none" class="p-0">
                                <li>Attack: {{ $character->attack }}</li>
                                <li>Defense: {{ $character->defence }}</li>
                                <li>Health: {{ $character->life }}</li>
                                <li>Speed: {{ $character->speed }}</li>
                            </ul>
                            @if ($character->type_id)
                                <div class="mb-3">
                                    <h4>Type</h4>
                                    <a class="badge text-bg-primary"
                                        href="{{ route('admin.types.show', $character->type) }}">{{ $character->type->name }}</a>
                                </div>
                            @endif
                            @if (count($character->items) > 0)
                                <div class="mb-3">
                                    <h4>Weapons</h4>
                                    @foreach ($character->items as $item)
                                        <a class="badge rounded-pill text-bg-success"
                                            href="{{ route('admin.items.show', $item) }}">{{ $item->name }}</a>
                                    @endforeach

                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <a href="{{ route('admin.characters.edit', $character) }}" class="text-white btn btn-primary my-3">Edit</a>
        </section>
    </main>
@endsection
