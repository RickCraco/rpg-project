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
        $json = file_get_contents(__DIR__ . '/data/characters.json');
        $data = json_decode($json, true);

        foreach($data as $characterData){
            $character = new Character();
            $character->name = $characterData['name'];
            $character->description = $characterData['description'];
            $character->attack = $characterData['attack'];
            $character->defence = $characterData['defence'];
            $character->life = $characterData['life'];
            $character->speed = $characterData['speed'];
            $character->sex = $characterData['sex'];
            $character->image = CharacterSeeder::storeimage($characterData['image'], $characterData['name']);
            $character->slug = Str::slug($characterData['name'], '-');
            $character->type_id = $characterData['type_id'];
            $character->save();
            $character->items()->sync($items->random(3));
        }

        // for($i = 0; $i < 15; $i++) {
        //     $character = new Character();
        //     $character->name = $faker->name();
        //     $character->description = $faker->paragraph();
        //     $character->attack = $faker->numberBetween(1, 20);
        //     $character->defence = $faker->numberBetween(1, 20);
        //     $character->life = $faker->numberBetween(1, 100);
        //     $character->speed = $faker->numberBetween(1, 20);
        //     $character->type_id = $types->random()->id;
        //     $character->save();
        //     $character->items()->sync($items->random(3));
        // }
    }

    public static function storeimage($img, $name)
    {
        $myurl = $img;
        $contents = file_get_contents($myurl);

        $name = Str::slug($name, '-') . '.png';
        $path = 'images/' . $name;
        Storage::put('images/' . $name, $contents);
        return $path;
    }
}
