<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'foto_event',
        'nama_event',
        'deskripsi_event',
        'tanggal_event',
        'kota_event',
        'open_gate'
    ];

    protected $dates = [
        'tanggal_event' => 'datetime',
        'open_gate' => 'datetime'
    ];
}
