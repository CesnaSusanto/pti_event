<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Event;
use App\Models\Artist;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function index()
    {
        $shows = DB::table('shows')
            ->join('events', 'shows.id_event', '=', 'events.id')
            ->join('artists', 'shows.id_artist', '=', 'artists.id')
            ->select(
                'shows.id_event',
                DB::raw("GROUP_CONCAT(artists.id SEPARATOR ', ') as id_artists"),
                'events.foto_event',
                'events.nama_event',
                DB::raw("DATE_FORMAT(events.tanggal_event, '%W, %d/%m/%Y') as hari_tanggal_event"),
                'events.open_gate',
                'events.kota_event',
                'events.deskripsi_event',
                DB::raw("GROUP_CONCAT(artists.nama_artist SEPARATOR ', ') as nama_artis"),
                'events.longitude',
                'events.latitude'
            )
            ->groupBy(
                'shows.id_event',
                'events.foto_event',
                'events.nama_event',
                'events.tanggal_event',
                'events.open_gate',
                'events.kota_event',
                'events.deskripsi_event',
                'events.longitude',
                'events.latitude'
            )
            ->paginate(10);
        return view('admin.shows.list', compact('shows'));
    }    

    public function create()
    {
        $events = Event::all();
        $artists = Artist::all();
        return view('admin.shows.create', compact('events', 'artists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_event' => 'required|exists:events,id',
            'id_artist' => 'required|array',
            'id_artist.*' => 'exists:artists,id',
        ]);

        foreach ($request->id_artist as $artistId) {
            Show::create([
                'id_event' => $request->id_event,
                'id_artist' => $artistId,
            ]);
        }
        return redirect()->route('shows.index')->with('success', 'Show berhasil ditambahkan.');
    }

    public function edit($id_event)
    {
        $event = Event::findOrFail($id_event);
        $selectedArtists = $event->artists()->pluck('artists.id')->toArray();
        $artists = Artist::all();
        return view('admin.shows.edit', compact('event', 'artists', 'selectedArtists'));
    }
    public function update(Request $request, $id_event)
    {
        $request->validate([
            'id_artist' => 'required|array', 
            'id_artist.*' => 'exists:artists,id' 
        ]);
        $event = Event::findOrFail($id_event);
        $event->artists()->sync($request->id_artist);
        return redirect()->route('shows.index')->with('success', 'Show berhasil diperbarui.');
    }

    public function destroy($id_event)
    {
        Show::where('id_event', $id_event)->delete();
        return redirect()->route('shows.index')->with('success', 'Show berhasil dihapus.');
    }

}
