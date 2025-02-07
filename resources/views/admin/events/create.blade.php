<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventz</title>
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
        /* Mengubah warna icon calendar menjadi putih */
        input[type="date"]::-webkit-calendar-picker-indicator,
        input[type="datetime-local"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
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
    </style>
</head>
<body>
    <div class="bg-header py-3">
        <h3 class="text-white text-center">Manage Events</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('events.index') }}" class="btn btn-custom">Back to Events</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg my-4">
                    <div class="card-header">
                        <h3 class="text-white mb-0">Create Events</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('events.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Event Name</label>
                                    <input value="{{ old('nama_event') }}" type="text" class="form-control @error('nama_event') is-invalid @enderror" placeholder="Enter the event name" name="nama_event">
                                    @error('nama_event')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">City</label>
                                    <input value="{{ old('kota_event') }}" type="text" class="form-control @error('kota_event') is-invalid @enderror" placeholder="Enter event city" name="kota_event">
                                    @error('kota_event')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input value="{{ old('alamat') }}" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Enter full address" name="alamat">
                                @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date</label>
                                    <input value="{{ old('tanggal_event') }}" type="date" class="form-control @error('tanggal_event') is-invalid @enderror" name="tanggal_event">
                                    @error('tanggal_event')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Open Gate</label>
                                    <input value="{{ old('open_gate') }}" type="datetime-local" class="form-control @error('open_gate') is-invalid @enderror" name="open_gate">
                                    @error('open_gate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="deskripsi_event" rows="4" placeholder="Masukkan deskripsi event">{{ old('deskripsi_event') }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Contact Person</label>
                                    <input value="{{ old('no_hp') }}" type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Enter contact person" name="no_hp">
                                    @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Event Status</label>
                                    <select class="form-select" name="event_status">
                                        <option value="1" {{ old('event_status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('event_status') == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Photo Event</label>
                                <input type="file" class="form-control" name="foto_event">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Longitude</label>
                                    <input value="{{ old('longitude') }}" type="text" class="form-control @error('longitude') is-invalid @enderror" placeholder="Masukkan longitude" name="longitude">
                                    @error('longitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Latitude</label>
                                    <input value="{{ old('latitude') }}" type="text" class="form-control @error('latitude') is-invalid @enderror" placeholder="Masukkan latitude" name="latitude">
                                    @error('latitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-pink">Create Event</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
