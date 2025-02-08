<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
 
<body>
    <div class="bg-primary py-3">
        <h3 class="text-white text-center">Semua data Event ada disini</h3>
    </div>
    <div class="container">
        <div class="flex justify-end items-center gap-4 mt-6">
            <form method="GET" action="{{ route('events.search') }}" class="flex gap-2">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search..." 
                    value="{{ request()->input('search') ? request()->input('search') : '' }}"
                    class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    Search
                </button>
            </form>
            <a href="{{ route('events.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Create
            </a>
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Go Back
            </a>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Events</h3>
                    </div>
 
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Nama Event</th>
                                <th>Kota Event</th>
                                <th>Tanggal Event</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @if ($events->isNotEmpty())
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>
                                    @if ($event->foto_event != "")
                                    <img width="50" src="{{ asset('uploads/events/'.$event->foto_event) }}" alt="">
                                    @endif
                                </td>
                                <td>{{ $event->nama_event }}</td>
                                <td>{{ $event->kota_event }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('events.edit',$event->id) }}" class="btn btn-info">Edit</a>
                                    <a href="#" onclick="deleteEvent({{ $event->id  }});" class="btn btn-danger">Delete</a>
                                    <form id="delete-event-form-{{ $event->id }}" action="{{ route('events.destroy',$event->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
 
                            @endif
 
                        </table>
 
                        {!! $events->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
 
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteEvent(id) {
            if (confirm("Are you sure you want to delete this event?")) {
                document.getElementById("delete-event-form-" + id).submit();
            }
        }
    </script>
</body>
</html>