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
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Created at</th>
                                <th scope="col" class="text-center">Last update</th>
                                <th scope="col" class="text-center">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($characters as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center"><a class="text-decoration-none text-black" href="{{ route('admin.characters.show', $item->id) }}">{{ $item->name }}</a></td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">{{ $item->updated_at }}</td>
                                    <td class="text-center">
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

