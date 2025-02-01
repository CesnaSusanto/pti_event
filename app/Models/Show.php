<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    public $incrementing = false; // Non-incrementing primary key
    protected $keyType = 'string'; // Set primary key ke string agar tidak error

    protected $fillable = [
        'id_event',
        'id_artist',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'shows', 'id_event', 'id_artist');
    }

    public function getNamaArtisAttribute()
    {
        return $this->artists->pluck('nama_artist')->implode(', ');
    }
}
