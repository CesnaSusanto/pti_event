<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="bg-primary py-3">
        <h3 class="text-white text-center">Semua data Artis ada disini</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <form method="GET" action="/artists/search">
                    <div class="input-group" style="margin-right:5px;">
                        <div class="form-outline" data-mdb-input-init>
                            <input class="form-control" name="search" placeholder="Search..." value="{{ request()->input('search') ? request()->input('search') : '' }}">
                        </div>
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
                <a href="{{ route('artists.create') }}" class="btn btn-primary">Create</a>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go Back</a>
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
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Artists</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Nama Artist</th>
                                <th>Tipe Artist</th>
                                <th>Deskripsi</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
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
                                    <a href="{{ route('artists.edit',$artist->id) }}" class="btn btn-info">Edit</a>
                                    <a href="#" onclick="deleteArtist({{ $artist->id  }});" class="btn btn-danger">Delete</a>
                                    <form id="delete-artist-form-{{ $artist->id }}" action="{{ route('artists.destroy',$artist->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                        {!! $artists->withQueryString()->links('pagination::bootstrap-5') !!}
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
