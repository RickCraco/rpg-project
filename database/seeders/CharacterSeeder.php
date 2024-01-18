<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;
use App\Models\Type;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = Type::all();
        $items = Item::all();

        for($i = 0; $i < 15; $i++) {
            $character = new Character();
            $character->name = $faker->name();
            $character->description = $faker->paragraph();
            $character->attack = $faker->numberBetween(1, 20);
            $character->defence = $faker->numberBetween(1, 20);
            $character->life = $faker->numberBetween(1, 100);
            $character->speed = $faker->numberBetween(1, 20);
            $character->type_id = $types->random(1)->id;
            $character->save();
            $character->items()->sync($items->random(3));
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
