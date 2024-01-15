@extends('layouts.app')
@section('content')
    <section style="background-size: cover; background-repeat: no-repeat;">
        <div class="w-100 bg-dark vh-100">
            <h1 class="text-white text-center py-4">Character List</h1>
            <div class="container">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Last update</th>
                                <th scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($characters as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <td><a class="text-decoration-none text-black" href="{{ route('admin.characters.show', $item->id) }}">{{ $item->name }}</a></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.characters.edit', $item->id) }}" class="btn btn-success"><i class="fa-solid fa-gear"></i></a>
                                        <a href="{{ route('admin.characters.destroy', $item->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

