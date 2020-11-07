<?php

namespace PACOS;

use Illuminate\Database\Eloquent\Model;

class RelacionFotosxRest extends Model
{
    protected $table = "fotosvidlugar";
    protected $fillable = ['idRest', 'id_Foto'];
}
