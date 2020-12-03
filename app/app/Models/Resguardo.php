<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resguardo extends Model
{
    use HasFactory;


    protected $table = 'resguardos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'folio',
        'type_device_id',
        'precio_unitario',
        'estatus',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
