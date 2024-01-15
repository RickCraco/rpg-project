@extends('layouts.app')
@section('content')
    <section style="background-image: url('/img/characters_bg.png'); background-size: cover; background-repeat: no-repeat;">
        <h1 class="text-white text-center py-4">Character List</h1>
        <div class="w-100 pb-4">
            <div class="container">
                <div class="row gy-4 gap-2">
                    @foreach ($characters as $item)
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front d-flex flex-column justify-content-end" style="background-image: url('https://picsum.photos/300/300');">
                                <h3 class="card-title p-2 text-center text-white" style="background-color: rgba(0, 0, 0, 0.5);">{{ $item->name }}</h3>
                            </div>
                            <div class="flip-card-back">
                                <div class="text-white">
                                    <div class="px-2 d-flex flex-column">
                                        <div class="fs-3">
                                            <span style="color: red">Atk</span>
                                            <div class="d-flex align-items-center justify-content-between ">
                                                <div class="d-flex">
                                                    <div class="left-line" style="width:
                                                        @php
                                                            $percentage = $item->attack / 20 * 100;
                                                            $percentage = $percentage * 3;
                                                            echo $percentage;
                                                        @endphp\px; background-color: red;">
                                                    </div>
                                                    <div class="right-line"
                                                        style="width: @php
                                                                $difference = 20 - $item->attack;
                                                                $percentage = $difference / 20 * 100;
                                                                $percentage = $percentage * 3;
                                                                echo $percentage;
                                                            @endphp\px;">
                                                    </div>
                                                </div>
                                                <span style="color: red">{{ $item->attack }}</span>
                                            </div>
                                        </div>
                                        <div class="fs-3">
                                            <span style="color: blue">Def</span>
                                            <div class="d-flex align-items-center justify-content-between ">
                                                <div class="d-flex">
                                                    <div class="left-line" style="width:
                                                        @php
                                                            $percentage = $item->defence / 20 * 100;
                                                            $percentage = $percentage * 3;
                                                            echo $percentage;
                                                        @endphp\px; background-color: blue;">
                                                    </div>
                                                    <div class="right-line"
                                                        style="width: @php
                                                                $difference = 20 - $item->defence;
                                                                $percentage = $difference / 20 * 100;
                                                                $percentage = $percentage * 3;
                                                                echo $percentage;
                                                            @endphp\px;">
                                                    </div>
                                                </div>
                                                <span style="color: blue">{{ $item->defence }}</span>
                                            </div>
                                        </div>
                                        <div class="fs-3">
                                            <span style="color: green">HP</span>
                                            <div class="d-flex align-items-center justify-content-between ">
                                                <div class="d-flex">
                                                    <div class="left-line" style="width:
                                                        @php
                                                            $percentage = $item->life / 100 * 100;
                                                            $percentage = $percentage * 3;
                                                            echo $percentage;
                                                        @endphp\px; background-color: green;">
                                                    </div>
                                                    <div class="right-line"
                                                        style="width: @php
                                                                $difference = 100 - $item->life;
                                                                $percentage = $difference / 100 * 100;
                                                                $percentage = $percentage * 3;
                                                                echo $percentage;
                                                            @endphp\px;">
                                                    </div>
                                                </div>
                                                <span style="color: green">{{ $item->life }}</span>
                                            </div>
                                        </div>
                                        <div class="fs-3">
                                            <span style="color: yellow">Spd</span>
                                            <div class="d-flex align-items-center justify-content-between ">
                                                <div class="d-flex">
                                                    <div class="left-line" style="width:
                                                        @php
                                                            $percentage = $item->speed / 20 * 100;
                                                            $percentage = $percentage * 3;
                                                            echo $percentage;
                                                        @endphp\px; background-color: yellow;">
                                                    </div>
                                                    <div class="right-line"
                                                        style="width: @php
                                                                $difference = 20 - $item->speed;
                                                                $percentage = $difference / 20 * 100;
                                                                $percentage = $percentage * 3;
                                                                echo $percentage;
                                                            @endphp\px;">
                                                    </div>
                                                </div>
                                                <span style="color: yellow">{{ $item->speed }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-primary fs-3" href="{{ route('admin.characters.show', $item) }}" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); ">Vedi Dettagli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

