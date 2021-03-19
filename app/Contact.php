<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    protected $fillable = ['full_name', 'email', 'subject', 'message', 'contact_cat_id'];
}
