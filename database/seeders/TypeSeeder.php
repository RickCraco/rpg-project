<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/types.json');
        $data = json_decode($json, true);

        foreach ($data as $typeData) {
            $type = new Type();
            $type->name = $typeData['name'];
            $type->description = $typeData['desc'];
            $type->slug = Str::slug($typeData['name'], '-');
            $type->save();
        }
    }
}
