<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $guarded    = ['id'];
    protected $primaryKey = 'id';
    protected $table      = 'estado';
    public $timestamps    = false;
}
