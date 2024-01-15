<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $formdata = $request->validated();

        if($request->hasFile('image')) {
            $path = Storage::put('images', $request->file('image'));
            $formdata['image'] = $path;
        }

        $newItem = Item::create($formdata);
        return to_route('admin.items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $formdata = $request->validated();

        if($request->hasFile('image')) {

            if($item->image) {
                Storage::delete($item->image);
            }

            $path = Storage::put('images', $request->file('image'));
            $formdata['image'] = $path;
        }

        $item->update($formdata);
        return to_route('admin.items.show', $item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {

        if($item->image) {
            Storage::delete($item->image);
        }

        $item->delete();
        return to_route('admin.items.index');
    }
}
