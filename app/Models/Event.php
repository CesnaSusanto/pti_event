<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'alamat',
        'kota_event',
        'tanggal_event',
        'open_gate',
        'deskripsi_event',
        'no_hp',
        'event_status',
        'foto_event',
        'longitude',
        'latitude',
    ];

    // Event memiliki banyak show (lineup)
    public function shows()
    {
        return $this->hasMany(Show::class, 'id_event');
    }

    // Event memiliki banyak artist melalui tabel shows
    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'shows', 'id_event', 'id_artist');
    }
}
