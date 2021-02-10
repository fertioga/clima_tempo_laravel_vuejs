<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $guarded    = ['id'];
    protected $primaryKey = 'id';
    protected $table      = 'cidade';
    public $timestamps    = false;

}
