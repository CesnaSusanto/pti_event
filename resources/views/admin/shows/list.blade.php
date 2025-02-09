<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shows</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1f2122 !important;
        }
        .bg-header {
            background-color: #27292a !important;
            padding: 1rem 0;
            margin-bottom: 2rem;
        }
        .card {
            background-color: #27292a !important;
            border: none !important;
            border-radius: 8px;
            overflow: hidden;
        }
        .table {
            margin-bottom: 0;
            font-size: 0.9rem;
        }
        .table > :not(caption) > * > * {
            background-color: #27292a !important;
            color: white !important;
            border-bottom-color: #323435 !important;
            padding: 1rem 0.75rem;
            vertical-align: middle;
        }
        .table thead th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        .table tbody tr:hover {
            background-color: #323435 !important;
        }
        .btn-custom {
            background-color: #27292a !important;
            border-color: #323435 !important;
            color: white !important;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #323435 !important;
            transform: translateY(-1px);
        }
        .btn-danger {
            background-color: #dc3545 !important;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            border-radius: 6px;
        }
        .btn-danger:hover {
            background-color: #bb2d3b !important;
        }
        .truncate-text {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }
        .table-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
        }
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="bg-header">
        <h3 class="text-white text-center mb-0">Manage Shows</h3>
    </div>

    <div class="container">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('shows.create') }}" class="btn btn-custom">Add Show</a>
            <a href="{{ route('dashboard') }}" class="btn btn-custom ms-2">Go Back</a>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="alert alert-success mb-4">
                {{ Session::get('success') }}
            </div>
            @endif

        <div class="card shadow-lg">
            <div class="card-header py-3">
                <h3 class="text-white mb-0 fs-5">Shows</h3>
            </div>
            <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Open Gate</th>
                                    <th>City</th>
                                    <th>Description</th>
                                    <th>Artist</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shows as $show)
                                <tr>
                                    <td>{{ $show->id_event }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/events/'.$show->foto_event) }}" 
                                            class="table-img" alt="Event photo">
                                    </td>
                                    <td>{{ $show->nama_event }}</td>
                                    <td>{{ $show->hari_tanggal_event }}</td>
                                    <td>{{ $show->open_gate }}</td>
                                    <td>{{ $show->kota_event }}</td>
                                    <td>
                                        <span class="truncate-text">{{ $show->deskripsi_event }}</span>
                                    </td>
                                    <td>{{ $show->nama_artis }}</td>
                                    <td>
                                        <div>Long: {{ $show->longitude }}</div>
                                        <div>Lat: {{ $show->latitude }}</div>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('shows.edit', [$show->id_event, $show->id_artists]) }}" 
                                            class="btn btn-custom btn-sm">Edit</a>
                                            <button onclick="deleteShow({{ $show->id_event }});" 
                                                    class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                        <form id="delete-show-form-{{ $show->id_event }}" 
                                            action="{{ route('shows.destroy', $show->id_event) }}" 
                                            method="post" class="d-none">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {!! $shows->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteShow(id_event) {
            if (confirm("Are you sure you want to delete this show?")) {
                document.getElementById("delete-show-form-" + id_event).submit();
            }
        }
    </script>
</body>
</html>