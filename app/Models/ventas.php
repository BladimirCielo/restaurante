<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_venta';
    protected $fillable = ['id_venta','id_empleado','id_metpag','fecha_venta','total_venta','tipo','nombre_cliente','direccion_envio','costo_envio','hora_salida','estado'];
}