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

     // Show terkait dengan satu event
     public function event()
     {
         return $this->belongsTo(Event::class, 'id_event');
     }
 
     // Show terkait dengan satu artist
     public function artist()
     {
         return $this->belongsTo(Artist::class, 'id_artist');
     }
}
