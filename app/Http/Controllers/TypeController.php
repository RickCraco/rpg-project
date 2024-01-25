<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::paginate(10);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $formdata = $request->validated();

        $slug = Str::slug($formdata['name'], '-');

        $formdata['slug'] = $slug;

        if($request->hasFile('image')) {
            $path = Storage::put('images', $formdata['image']);
            $formdata['image'] = $path;
        }

        $newType = Type::create($formdata);
        return to_route('admin.types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $formdata = $request->validated();

        $formdata['slug'] = $type->slug;

        if ($type->name !== $formdata['name']) {
            $slug = Type::getSlug($formdata['name']);
            $formdata['slug'] = $slug;
        }

        if($request->hasFile('image')) {

            if($type->image) {
                Storage::delete($type->image);
            }

            $path = Storage::put('images', $request->image);
            $formdata['image'] = $path;
        }

        $type->update($formdata);
        return to_route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('admin.types.index')->with('message', "$type->name deleted successfully");
    }
}
