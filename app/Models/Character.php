<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'attack',
        'defence',
        'life',
        'speed',
        'image',
        'type_id'
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
