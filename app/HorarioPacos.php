<?php

namespace PACOS;

use Illuminate\Database\Eloquent\Model;

class HorarioPacos extends Model
{
    protected $table = "horario";
    protected $fillable = ['id', 'DIa_Ini', 'Hora_APert', 'Hora_cierre', 'Dia_cierre', 'id_pacos'];
}

class horarioxrest extends Model
{
    protected $table = "horarioxrest";
    protected $fillable = [	'idRest', 'idHor'];
}
