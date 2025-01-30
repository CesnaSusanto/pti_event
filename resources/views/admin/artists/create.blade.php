<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Artist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="bg-primary py-3">
        <h3 class="text-white text-center">Silakan Tambahkan Data Artis</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('artists.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Create Artist</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('artists.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama_artist" class="form-label h5">Nama Artist</label>
                                <input value="{{ old('nama_artist') }}" type="text" class="@error('nama_artist') is-invalid @enderror form-control-lg form-control" placeholder="Nama Artist" name="nama_artist">
                                @error('nama_artist')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tipe_artist" class="form-label h5">Tipe Artist</label>
                                <select class="form-control form-control-lg @error('tipe_artist') is-invalid @enderror" name="tipe_artist">
                                    <option value="solo" {{ old('tipe_artist') == 'solo' ? 'selected' : '' }}>Solo</option>
                                    <option value="duo" {{ old('tipe_artist') == 'duo' ? 'selected' : '' }}>Duo</option>
                                    <option value="grup" {{ old('tipe_artist') == 'grup' ? 'selected' : '' }}>Grup</option>
                                </select>
                                @error('tipe_artist')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label h5">Deskripsi</label>
                                <textarea placeholder="Deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" cols="30" rows="5">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="foto_artist" class="form-label h5">Foto Artist</label>
                                <input type="file" class="form-control form-control-lg @error('foto_artist') is-invalid @enderror" name="foto_artist">
                                @error('foto_artist')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>                          
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
