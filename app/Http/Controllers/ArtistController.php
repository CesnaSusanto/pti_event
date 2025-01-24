<?php
namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{
    public function index() {
        $artists = Artist::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.artists.list', [
            'artists' => $artists
        ]);
    }

    public function search(Request $request)
    {
        if (!empty($request)) {
            $search = $request->input('search');

            $artists = Artist::where('nama_artist', 'like', "$search%")
                ->orWhere('tipe_artist', 'like', "$search%")
                ->paginate(2);

            return view('admin.artists.list', compact('artists'));
        }

        $artists = DB::table('artists')
        ->orderBy('id', 'DESC')
        ->paginate(5);
        return view('admin.artists.list', compact('artists'));
    }

    public function create() {
        return view('admin.artists.create');
    }

    public function store(Request $request) {
        $rules = [
            'nama_artist' => 'required|max:255',
            'tipe_artist' => 'required|in:solo,duo,grup',
            'deskripsi' => 'required',
            'foto_artist' => 'required|image|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('artists.create')->withErrors($validator)->withInput();
        }

        $artist = new Artist();
        $artist->nama_artist = $request->nama_artist;
        $artist->tipe_artist = $request->tipe_artist;
        $artist->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto_artist')) {
            $image = $request->file('foto_artist');
            $ext = $image->getClientOriginalExtension();
            $imageName = strtolower(str_replace(' ', '_', $request->nama_artist)) . '_artist.' . $ext; // Custom image name

            $image->move(public_path('uploads/artists'), $imageName);
            $artist->foto_artist = $imageName;
        }

        $artist->save();

        return redirect()->route('artists.index')->with('success', 'Artist created successfully.');
    }

    public function edit($id) {
        $artist = Artist::findOrFail($id);
        return view('admin.artists.edit', compact('artist'));
    }

    public function update(Request $request, $id) {
        $artist = Artist::findOrFail($id);

        $rules = [
            'nama_artist' => 'required|max:255',
            'tipe_artist' => 'required|in:solo,duo,grup',
            'deskripsi' => 'required',
            'foto_artist' => 'image|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('artists.edit', $artist->id)->withErrors($validator)->withInput();
        }

        $artist->nama_artist = $request->nama_artist;
        $artist->tipe_artist = $request->tipe_artist;
        $artist->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto_artist')) {
            File::delete(public_path('uploads/artists/' . $artist->foto_artist));

            $image = $request->file('foto_artist');
            $ext = $image->getClientOriginalExtension();
            $imageName = strtolower(str_replace(' ', '_', $request->nama_artist)) . '_artist.' . $ext; // Custom image name

            $image->move(public_path('uploads/artists'), $imageName);
            $artist->foto_artist = $imageName;
        }

        $artist->save();

        return redirect()->route('artists.index')->with('success', 'Artist updated successfully.');
    }

    public function destroy($id) {
        $artist = Artist::findOrFail($id);
        File::delete(public_path('uploads/artists/' . $artist->foto_artist));
        $artist->delete();

        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully.');
    }
}
