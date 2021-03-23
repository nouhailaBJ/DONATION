<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class InputCard extends Model
{
  protected $fillable = ['title', 'name', 'type_text', 'margin_top', 'margin_right' , 'color','card_id'];
}
