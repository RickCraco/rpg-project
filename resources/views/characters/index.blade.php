@extends('layouts.app')
@section('content')
    <section style="background-image: url('/img/characters_bg.png'); background-size: cover; background-repeat: no-repeat;">
        <h1 class="text-white text-center py-4">Character List</h1>
        <div class="w-100 pb-4">
            <div class="container">
                <div class="row gy-4 gap-2">
                    @foreach ($characters as $item)
                    <div class="card border-0 p-0" style="width: calc(100% / 5 - 0.5rem);">
                        <img src="https://picsum.photos/250/250" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body text-center bg-dark text-white">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p>
                                <span><span style="color: red">Attack:</span> {{ $item->attack }}</span>
                                <span><span style="color: blue">Defense:</span> {{ $item->defence }}</span>
                            </p>
                            <p>
                                <span><span style="color: green">Life:</span> {{ $item->life }}</span>
                                <span><span style="color: yellow">Speed:</span> {{ $item->speed }}</span>
                            </p>
                        </div>
                      </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
