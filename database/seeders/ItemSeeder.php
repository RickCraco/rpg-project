<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/items.json');
        $data = json_decode($json, true);

        foreach ($data as $itemData) {
            $item = new Item();
            $item->name = $itemData['name'];
            $item->slug = $itemData['slug'];
            $item->type = $itemData['type'];
            $item->category = $itemData['category'];
            $item->weight = $itemData['weight'];
            $item->cost = $itemData['cost'];
            $item->save();
        }
    }

    public static function storeimage($img, $name)
    {
        $myurl = $img;
        $contents = file_get_contents($myurl);

        $name = Str::slug($name, '-') . '.jpg';
        $path = 'images/' . $name;
        Storage::put('images/' . $name, $contents);
        return $path;
    }
}
