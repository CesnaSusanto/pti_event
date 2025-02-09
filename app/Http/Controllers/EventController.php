<?php
namespace App\Http\Controllers;

use App\Models\Event; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function showAllEvents()
{
    $events = Event::where('event_status', 1) // Hanya menampilkan event aktif
        ->orderBy('tanggal_event', 'ASC')
        ->get();

    return view('user.MenuEvent', compact('events'));
}

    public function show($id)
    {
        // Ambil event berdasarkan ID, serta join dengan shows dan artists
        $event = Event::with(['shows.artist'])->findOrFail($id);
    
        return view('user.EventDetails', compact('event'));
    }
    
    public function index() {
        $events = Event::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.events.list', [
            'events' => $events
        ]);
    }

    public function search(Request $request)
    {
        if (!empty($request)) {
            $search = $request->input('search');

            $events = Event::where('nama_event', 'like', "$search%")
                ->orWhere('kota_event', 'like', "$search%")
                ->paginate(2);

            return view('admin.events.list', compact('events'));
        }

        $events = DB::table('events')
        ->orderBy('id', 'ASC')
        ->paginate(5);
        return view('admin.events.list', compact('events'));
    }

    public function create() {
        return view('admin.events.create');
    }

    public function store(Request $request) {
        $rules = [
            'nama_event' => 'required|min:5',
            'alamat' => 'required|min:5',
            'kota_event' => 'required|min:3',
            'tanggal_event' => 'required|date',
            'open_gate' => 'required|date_format:Y-m-d\TH:i',
            'deskripsi_event' => 'required|min:10',
            'no_hp' => 'required|min:10',
            'event_status' => 'required|boolean',
            'foto_event' => 'required|image',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->route('events.create')->withInput()->withErrors($validator);
        }
    
        // insert event
        $event = new Event();
        $event->nama_event = $request->nama_event;
        $event->alamat = $request->alamat;
        $event->kota_event = $request->kota_event;
        $event->tanggal_event = $request->tanggal_event;
        $event->open_gate = date('Y-m-d H:i:s', strtotime($request->open_gate));
        $event->deskripsi_event = $request->deskripsi_event;
        $event->no_hp = $request->no_hp;
        $event->event_status = $request->event_status;
        $event->longitude = $request->longitude;
        $event->latitude = $request->latitude;
    
        if ($request->hasFile('foto_event')) {
            // store image
            $image = $request->file('foto_event');
            $ext = $image->getClientOriginalExtension();
            $imageName = strtolower(str_replace(' ', '_', $request->nama_event)) . '_poster.' . $ext; // Custom image name
    
            // Save image to events directory
            $image->move(public_path('uploads/events'), $imageName);
    
            // Save image name
            $event->foto_event = $imageName;
        }
    
        $event->save();
    
        return redirect()->route('events.index')->with('success', 'Event added successfully.');
    }    

    public function edit($id) {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', [
            'event' => $event
        ]);
    }

    public function update($id, Request $request) {
        $event = Event::findOrFail($id);
    
        $rules = [
            'nama_event' => 'required|min:5',
            'alamat' => 'required|min:5',
            'kota_event' => 'required|min:3',
            'tanggal_event' => 'required|date',
            'open_gate' => 'required|date_format:Y-m-d\TH:i',
            'deskripsi_event' => 'required|min:10',
            'no_hp' => 'required|min:10',
            'event_status' => 'required|boolean',
            'foto_event' => 'image',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->route('events.edit', $event->id)->withInput()->withErrors($validator);
        }
    
        // update event
        $event->nama_event = $request->nama_event;
        $event->alamat = $request->alamat;
        $event->kota_event = $request->kota_event;
        $event->tanggal_event = $request->tanggal_event;
        $event->open_gate = date('Y-m-d H:i:s', strtotime($request->open_gate));
        $event->deskripsi_event = $request->deskripsi_event;
        $event->no_hp = $request->no_hp;
        $event->event_status = $request->event_status;
        $event->longitude = $request->longitude;
        $event->latitude = $request->latitude;
    
        if ($request->hasFile('foto_event')) {
            // delete old image
            File::delete(public_path('uploads/events/' . $event->foto_event));
    
            // store new image
            $image = $request->file('foto_event');
            $ext = $image->getClientOriginalExtension();
            $imageName = strtolower(str_replace(' ', '_', $request->nama_event)) . '_poster.' . $ext; // Custom image name
    
            // Save image to events directory
            $image->move(public_path('uploads/events'), $imageName);
    
            // Save new image name
            $event->foto_event = $imageName;
        }
    
        $event->save();
    
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }    

    public function destroy($id) {
        $event = Event::findOrFail($id);

        // delete image
        File::delete(public_path('uploads/events/' . $event->foto_event));

        // delete event
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}