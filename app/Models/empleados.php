<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_empleado'; 
    protected $fillable=['id_empleado','id_role','nombre_empleado','apellido_pat','apellido_mat','email','nombre_usuario','contrasena','fecha_creacion','estado'];
}
