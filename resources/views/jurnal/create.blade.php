@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Jurnal Kegiatan</h2>

    <form action="{{ route('jurnal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mulai Pukul</label>
            <input type="time" name="mulai_pukul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Selesai Pukul</label>
            <input type="time" name="selesai_pukul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kegiatan</label>
            <textarea name="kegiatan" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jurnal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
