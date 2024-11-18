<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apartados extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_apartado';
    protected $fillable = ['id_apartado','id_menu','nombre_apartado','descripcion'];
}