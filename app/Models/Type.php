<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'icon'
    ];

    public static function getSlug($name)
    {
        $slug = Str::of($name)->slug('-');
        $count = 1;

        while(Type::where("slug", $slug)->first()) {
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $count++;
        }

        return $slug;
    }

    public function characters(){
        return $this->hasMany(Character::class);
    }
}
