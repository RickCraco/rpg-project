<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;
use App\Models\Item;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::paginate(10);
        return view('admin.characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $items = Item::all();
        return view('admin.characters.create', compact('types', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCharacterRequest $request)
    {
        $formdata = $request->validated();

        if($request->hasFile('image')) {
            $path = Storage::put('images', $request->file('image'));
            $formdata['image'] = $path;
        }

        $newCharacter = Character::create($formdata);

        if($request->items) {
            $newCharacter->items()->attach($request->items);
        }

        return to_route('admin.characters.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('admin.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        $types = Type::all();
        $items = Item::all();
        return view('admin.characters.edit', compact('character', 'types', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
        $formdata = $request->validated();

        if($request->hasFile('image')) {

            if($character->image) {
                Storage::delete($character->image);
            }

            $path = Storage::put('images', $request->file('image'));
            $formdata['image'] = $path;
        }

        //$character->fill($formdata);
        $character->update();

        if($request->has('items')) {
            $character->items()->sync($request->items);
        }else{
            $character->items()->detach();
        }

        return to_route('admin.characters.show', $character);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        if($character->image) {
            Storage::delete($character->image);
        }

        $character->items()->detach();

        $character->delete();
        return to_route('admin.characters.index')->with('message', 'Character deleted');
    }
}
