<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario'; // Corregido: era 'id_usuarios'

    protected $fillable = [
        'nombre_completo',
        'tipo_documento',
        'numero_documento',
        'email',
        'email_verified_at', // Corregido: era 'email_verificate'
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', // Corregido: era 'email_verificate'
    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'usuario_id', 'id_usuario');
    }
}