<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

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
        'device_id',
        'user_id',
    ];

    public function getCreatedAtAtribute($date)
    {
        return new Date($date);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
