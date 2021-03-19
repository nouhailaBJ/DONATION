<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
    public function cards()
    {
        return $this->hasMany(ProjectCard::class);
    }
}
