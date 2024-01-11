@extends('layouts.app')
@section('content')
    <section style="background-image: url('/img/characters_bg.png'); background-size: cover; background-repeat: no-repeat;">
        <h1 class="text-white text-center py-4">Character List</h1>
        <div class="w-100 pb-4">
            <div class="container">
                <div class="row gy-4 gap-2">
                    @foreach ($characters as $item)
                    <div class="card border-0 rounded p-0" style="width: calc(100% / 5 - 0.5rem); background-color: rgba(13, 13, 34, 0.733);">
                        <img src="https://picsum.photos/250/250" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body text-center text-white b-0" style="">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p>
                                <span><span style="color: red">Atk:</span> {{ $item->attack }}</span>
                                <span><span style="color: blue">Def:</span> {{ $item->defence }}</span>
                            </p>
                            <p>
                                <span><span style="color: green">HP:</span> {{ $item->life }}</span>
                                <span><span style="color: yellow">Speed:</span> {{ $item->speed }}</span>
                            </p>
                            <a class="btn btn-primary" href="{{ route('characters.show', $item) }}">Vedi Dettagli</a>
                        </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
