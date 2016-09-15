<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name'
    ];

    public function characters() {
        return $this->hasMany(Character::class);
    }
}
