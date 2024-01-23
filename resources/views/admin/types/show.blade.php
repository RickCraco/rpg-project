@extends('layouts.app')
@section('content')
    <main class="bg-dark">
        <section class="container py-4">
            <h1 class="text-white">{{ $type->name }}</h1>
            <div class="row gy-4">
                <div class="col-12 w-50">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{ $type->description }}</p>
                            <h4>Charaters with this Type</h4>
                            @foreach ($type->characters as $item)
                                <li><a class="text-dark text-decoration-none"
                                        href="{{ route('admin.characters.show', $item->id) }}">{{ $item->name }}</a></li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.types.edit', $type) }}" class="text-white btn btn-primary my-3">Edit</a>
        </section>
    </main>
@endsection
