<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'factura';
    protected $primaryKey = 'id_factura'; // Restauramos id como clave primaria
    public $incrementing = true; // Auto-incremental habilitado
    protected $keyType = 'int'; // Tipo integer para la clave primaria

    protected $fillable = [
        'numero_factura', // Nuevo campo
        'matricula_profesional',
        'poliza_medica_semestral',
        'impuesto_procultura',
        'cantidad',
        'nombre_programas',
        'responsable',
        'identificacion',
        'tipo_documento',
        'consecutivo',
        'fecha_factura',
        'fecha_vencimiento',
        'codigo_barras',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id_usuarios');
    }
}