<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'hanzi',
        'pinyin',
        'translation',
        'section_id'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
