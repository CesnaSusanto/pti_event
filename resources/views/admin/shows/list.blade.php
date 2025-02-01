<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shows</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="bg-primary py-3">
        <h3 class="text-white text-center">Semua Data Show Ada di Sini</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('shows.create') }}" class="btn btn-primary">Tambah Show</a>
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
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Shows</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID Event</th>
                                <th>Foto Event</th>
                                <th>Nama Event</th>
                                <th>Hari & Tanggal Event</th>
                                <th>Open Gate</th>
                                <th>Kota Event</th>
                                <th>Deskripsi</th>
                                <th>Nama Artis</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($shows as $show)
                            <tr>
                                <td>{{ $show->id_event }}</td>
                                <td>
                                    <img src="{{ asset('uploads/events/'.$show->foto_event) }}" width="50">
                                </td>
                                <td>{{ $show->nama_event }}</td>
                                <td>{{ $show->hari_tanggal_event }}</td>
                                <td>{{ $show->open_gate }}</td>
                                <td>{{ $show->kota_event }}</td>
                                <td>{{ $show->deskripsi_event }}</td>
                                <td>{{ $show->nama_artis }}</td>
                                <td>{{ $show->longitude }}</td>
                                <td>{{ $show->latitude }}</td>
                                <td>
                                    <a href="{{ route('shows.edit', [$show->id_event, $show->id_artists]) }}" class="btn btn-info">Edit</a>
                                    <a href="#" onclick="deleteShow({{ $show->id_event }});" class="btn btn-danger">Delete</a>
                                    <form id="delete-show-form-{{ $show->id_event }}" action="{{ route('shows.destroy', $show->id_event) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
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
