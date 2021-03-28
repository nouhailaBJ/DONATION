<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
