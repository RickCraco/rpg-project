@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Section title</h1>
        <p>section content</p>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="img_avatar.png" alt="Avatar" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                    <h1>John Doe</h1>
                    <p>Architect & Engineer</p>
                    <p>We love that guy</p>
                </div>
            </div>
        </div>
    </section>
@endsection
