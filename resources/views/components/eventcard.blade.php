@props(['event'])

<div>
    <!-- Sesuaikan dengan struktur data event Anda -->
    <img src="{{ $events->foto_event }}" alt="{{ $events->nama_event }}">
    <h3>{{ $events->nama_event }}</h3>
    <p>{{ $events->deskripsi_event }}</p>
    <!-- dst -->
</div>