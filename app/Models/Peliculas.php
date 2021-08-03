<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Peliculas extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table='peliculas';
    protected $fillable = [
        'idpeliculas',
        'nombre',
        'descripcion',
        'categorias'

    ];

    protected $primaryKey='idpeliculas';
    protected $hidden = [
        'created_at', 'updated_at'
    ];

}
