<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['owner', 'title', 'description', 'date_start', 'date_end', 'date_concluded'];
}
