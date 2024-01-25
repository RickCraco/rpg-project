@extends('layouts.app')
@section('content')
    <section style="background-size: cover; background-repeat: no-repeat;">
        <div class="w-100 bg-dark vh-100" style="padding-top: 100px;">
            <h1 class="text-white text-center py-4">Character List</h1>
            <div class="d-flex justify-content-center pb-4">
                <a href="{{ route('admin.characters.create') }}" class="btn btn-primary fs-4">Add character</a>
            </div>
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
                                    <td class="text-center"><a class="text-decoration-none text-black" href="{{ route('admin.characters.show', $item) }}">{{ $item->name }}</a></td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">{{ $item->updated_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.characters.edit', $item) }}" class="btn btn-success"><i class="fa-solid fa-gear"></i></a>
                                        <a href="{{ route('admin.characters.show', $item) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                        <form action="{{route('admin.characters.destroy', $item)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="cancel-button btn btn-danger" data-item-title="{{ $item->title }}"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $characters->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
@include('profile.partials.modal_delete')
@endsection

