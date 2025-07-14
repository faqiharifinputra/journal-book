@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Jurnal Kegiatan</h2>

    <form action="{{ route('jurnal.update', $jurnal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" value="{{ $jurnal->tempat }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $jurnal->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Mulai Pukul</label>
            <input type="time" name="mulai_pukul" class="form-control" value="{{ $jurnal->mulai_pukul }}" required>
        </div>
        <div class="mb-3">
            <label>Selesai Pukul</label>
            <input type="time" name="selesai_pukul" class="form-control" value="{{ $jurnal->selesai_pukul }}" required>
        </div>
        <div class="mb-3">
            <label>Kegiatan</label>
            <textarea name="kegiatan" class="form-control" required>{{ $jurnal->kegiatan }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('jurnal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
