<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function index()
    {
        $shows = DB::table('shows')
            ->join('events', 'shows.id_event', '=', 'events.id')
            ->join('artists', 'shows.id_artist', '=', 'artists.id')
            ->select(
                'shows.id as id_show',
                'events.foto_event',
                'events.nama_event',
                DB::raw('DATE_FORMAT(events.tanggal_event, "%W, %d-%m-%Y") as hari_tanggal_event'),
                'events.open_gate',
                'events.kota_event',
                'events.deskripsi_event',
                DB::raw('GROUP_CONCAT(artists.nama_artist SEPARATOR ", ") as nama_artis'),
                'events.longitude',
                'events.latitude'
            )
            ->groupBy('shows.id', 'events.foto_event', 'events.nama_event', 'events.tanggal_event', 'events.open_gate', 'events.kota_event', 'events.deskripsi_event', 'events.longitude', 'events.latitude')
            ->get();

        return view('admin.dashboard', compact('shows'));
    }
}
