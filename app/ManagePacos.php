<?php

namespace PACOS;

use Illuminate\Database\Eloquent\Model;

class ManagePacos extends Model
{
    protected $table = "foto_vid";
    protected $fillable = ['id', 'Url', 'Principal'];
}

class RedesPacos extends Model
{
    protected $table = "redes";
    protected $fillable = ['id','Url','Icono','Tipo'];
}
