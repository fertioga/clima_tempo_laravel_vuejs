<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrevisaoClima extends Model
{
    protected $guarded    = ['id'];
    protected $primaryKey = 'id';
    protected $table      = 'previsao_clima';
    public $timestamps    = false;
}
