<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Artist</title>
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
        .btn-custom {
            background-color: #27292a !important;
            border-color: #323435 !important;
            color: white !important;
        }
        .btn-custom:hover {
            background-color: #323435 !important;
        }
        .btn-pink {
            background: #ec6090 !important;
            border: none !important;
            color: white !important;
            padding: 8px 20px !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
        }
        .btn-pink:hover {
            background: #d4517c !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(236, 96, 144, 0.3);
        }
        .form-control, .form-select {
            background-color: #27292a !important;
            border: 1px solid #323435 !important;
            color: white !important;
            padding: 0.7rem 1rem !important;
            font-size: 0.95rem !important;
            border-radius: 8px !important;
        }
        .form-control:focus, .form-select:focus {
            border-color: #ec6090 !important;
            box-shadow: 0 0 0 0.2rem rgba(236, 96, 144, 0.25) !important;
        }
        .form-control::placeholder {
            color: #6c757d !important;
        }
        .form-label {
            color: white !important;
            font-weight: 500 !important;
            margin-bottom: 0.5rem !important;
            font-size: 0.95rem !important;
        }
        .invalid-feedback {
            color: #ec6090 !important;
            font-size: 0.875rem !important;
        }
        .is-invalid {
            border-color: #ec6090 !important;
        }
        .card-header {
            border-bottom: 1px solid #323435 !important;
            padding: 1.5rem !important;
        }
        .card-body {
            padding: 1.5rem !important;
        }
        .preview-image {
            border-radius: 8px;
            margin-top: 1rem;
            max-width: 200px;
        }
    </style>
</head>
<body>
    <div class="bg-header py-3">
        <h3 class="text-white text-center">Manage Artist</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('artists.index') }}" class="btn btn-custom">Back to Artists</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg my-4">
                    <div class="card-header">
                        <h3 class="text-white mb-0">Edit Artist Details</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('artists.update', $artist->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Artist Name</label>
                                <input value="{{ old('nama_artist', $artist->nama_artist) }}" type="text" class="form-control @error('nama_artist') is-invalid @enderror" placeholder="Masukkan nama artist" name="nama_artist">
                                @error('nama_artist')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Artist Type</label>
                                <select class="form-select @error('tipe_artist') is-invalid @enderror" name="tipe_artist">
                                    <option value="solo" {{ old('tipe_artist', $artist->tipe_artist) == 'solo' ? 'selected' : '' }}>Solo</option>
                                    <option value="duo" {{ old('tipe_artist', $artist->tipe_artist) == 'duo' ? 'selected' : '' }}>Duo</option>
                                    <option value="grup" {{ old('tipe_artist', $artist->tipe_artist) == 'grup' ? 'selected' : '' }}>Grup</option>
                                </select>
                                @error('tipe_artist')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4" placeholder="Masukkan deskripsi artist">{{ old('deskripsi', $artist->deskripsi) }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Select Picture</label>
                                <input type="file" class="form-control @error('foto_artist') is-invalid @enderror" name="foto_artist">
                                @if ($artist->foto_artist != "")
                                <img src="{{ asset('uploads/artists/'.$artist->foto_artist) }}" alt="Preview" class="preview-image">
                                @endif
                                @error('foto_artist')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-pink">Update Artist</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
