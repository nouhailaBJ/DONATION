<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
    
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
