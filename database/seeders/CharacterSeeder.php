<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;
use Faker\Generator as Faker;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 15; $i++) {
            $character = new Character();
            $character->name = $faker->name();
            $character->description = $faker->paragraph();
            $character->attack = $faker->numberBetween(1, 20);
            $character->defence = $faker->numberBetween(1, 20);
            $character->life = $faker->numberBetween(1, 100);
            $character->speed = $faker->numberBetween(1, 20);
            $character->save();
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
