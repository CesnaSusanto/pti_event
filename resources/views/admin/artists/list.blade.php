<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1f2122 !important;
        }
        nav, .navbar {
            background-color: #27292a !important;
        }
        .bg-header {
            background-color: #27292a !important;
        }
        .card {
            background-color: #27292a !important;
            border: none !important;
        }
        .table {
            margin-bottom: 0;
        }
        .table > :not(caption) > * > * {
            background-color: #27292a !important;
            color: white !important;
            border-bottom-color: #323435 !important;
        }
        .table tbody tr:hover {
            background-color: #323435 !important;
        }
        .btn-custom {
            background-color: #27292a !important;
            border-color: #323435 !important;
            color: white !important;
        }
        .btn-custom:hover {
            background-color: #323435 !important;
        }
        .form-control {
            background-color: #27292a !important;
            border-color: #323435 !important;
            color: white !important;
        }
        .form-control::placeholder {
            color: #6c757d !important;
        }
        .pagination .page-link {
            background-color: #27292a !important;
            border-color: #323435 !important;
            color: white !important;
        }
        .pagination .page-link:hover {
            background-color: #323435 !important;
        }
                /* Styling untuk teks pagination */
                .datatable-info, 
        .datatable-info span,
        .text-muted {
            color: white !important;
        }
        
        /* Styling untuk komponen pagination Bootstrap 5 */
        .pagination {
            --bs-pagination-color: white;
        }
        
        div[aria-live="polite"] {
            color: white !important;
        }
        
        .pagination-info {
            color: white !important;
        }
    </style>
</head>
<body>
    <div class="bg-header py-3">
        <h3 class="text-white text-center">Manage Artists</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <form method="GET" action="/artists/search">
                    <div class="input-group" style="margin-right:5px;">
                        <div class="form-outline me-2" data-mdb-input-init>
                            <input class="form-control" name="search" placeholder="Search..." value="{{ request()->input('search') ? request()->input('search') : '' }}">
                        </div>
                        <button type="submit" class="btn btn-custom">Search</button>
                    </div>
                </form>
                <a href="{{ route('artists.create') }}" class="btn btn-custom">Create</a>
                <a href="{{ route('dashboard') }}" class="btn btn-custom ms-2">Go Back</a>
            </div>
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
                <div class="card shadow-lg my-4">
                    <div class="card-header">
                        <h3 class="text-white mb-0">Artists</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
                                        <th>Artist Name</th>
                                        <th>Tipe Artist</th>
                                        <th>Description</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ($artists->isNotEmpty())
                                @foreach ($artists as $artist)
                                <tr>
                                    <td>{{ $artist->id }}</td>
                                    <td>
                                        @if ($artist->foto_artist != "")
                                        <img width="50" src="{{ asset('uploads/artists/'.$artist->foto_artist) }}" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $artist->nama_artist }}</td>
                                    <td>{{ $artist->tipe_artist }}</td>
                                    <td>{{ $artist->deskripsi }}</td>
                                    <td>{{ \Carbon\Carbon::parse($artist->created_at)->format('d M, Y') }}</td>
                                    <td>
                                        <a href="{{ route('artists.edit',$artist->id) }}" class="btn btn-custom btn-sm">Edit</a>
                                        <a href="#" onclick="deleteArtist({{ $artist->id  }});" class="btn btn-danger btn-sm">Delete</a>
                                        <form id="delete-artist-form-{{ $artist->id }}" action="{{ route('artists.destroy',$artist->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {!! $artists->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteArtist(id) {
            if (confirm("Are you sure you want to delete this artist?")) {
                document.getElementById("delete-artist-form-" + id).submit();
            }
        }
    </script>
</body>
</html>