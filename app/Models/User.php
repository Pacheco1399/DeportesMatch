<?php

namespace App\Models;

use App\Models\Foto;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'password',
        'nacionalidad',
        'fecha_nacimiento',
        'numero_telefono',
        'edad',
        'rut',
        'direccion',
        'direccion_numero',
        'direccion_opcional',
        'foto',
        'rol',
        'estado',
        'ban_time',
        'ban_date',
        'motivo',
        'calificacion',
        'clave_antigua',
        'comuna',
        'region',
        'deporte_id',

    ];
    protected $dates = [
        'ban_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function foto()
    {
        return $this->morphOne(Foto::class, 'imageable');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getFotoPerfilAttribute()
    {

        return $this->foto
        ? "fotos/{$this->Foto->path}"
        : 'https://www.gravatar.com/avatar/404?d=mp';
    }

}
