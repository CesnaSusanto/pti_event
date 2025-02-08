<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $newestEvents = Event::latest('tanggal_event')
                            ->take(8)
                            ->get();
                            
        $nearestEvents = Event::where('tanggal_event', '>=', now())
                             ->orderBy('tanggal_event', 'asc')
                             ->take(3)
                             ->get();

        // Untuk debug, tambahkan ini sementara
        // dd([
        //     'newest' => $newestEvents->count(),
        //     'nearest' => $nearestEvents->count(),
        //     'sample' => $newestEvents->first()
        // ]);

        return view('user.dashboard', compact('newestEvents', 'nearestEvents'));
    }
}
