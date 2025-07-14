@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Jurnal Kegiatan</h2>

    <a href="{{ route('jurnal.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

    {{-- FILTER + SEARCH --}}
    <form action="{{ route('jurnal.index') }}" method="GET" class="mb-3 row g-2">
        <div class="col-md-3">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari tempat / kegiatan / tanggal">
        </div>
        <div class="col-md-2">
            <input type="date" name="from" value="{{ request('from') }}" class="form-control" placeholder="Dari Tanggal">
        </div>
        <div class="col-md-2">
            <input type="date" name="to" value="{{ request('to') }}" class="form-control" placeholder="Sampai Tanggal">
        </div>
        <div class="col-md-2">
            <select name="sort" class="form-select">
                <option value="">Urutkan Tanggal</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Terlama</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Terbaru</option>
            </select>
        </div>
        <div class="col-md-3 text-end">
            <button type="submit" class="btn btn-success">Filter</button>
            <a href="{{ route('jurnal.export.excel') }}" class="btn btn-outline-primary">Excel</a>
            <a href="{{ route('jurnal.export.pdf') }}" class="btn btn-outline-danger">PDF</a>
            <a href="{{ route('jurnal.print', request()->all()) }}" target="_blank" class="btn btn-secondary">🖨️ Print</a>
        </div>
    </form>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- TABEL DATA --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Mulai Pukul</th>
                <th>Selesai Pukul</th>
                <th>Kegiatan</th>
                <th>Paraf Pembimbing</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jurnals as $index => $jurnal)
            <tr>
                <td>{{ ($jurnals->currentPage() - 1) * $jurnals->perPage() + $index + 1 }}</td>
                <td>{{ $jurnal->tempat }}</td>
                <td>{{ $jurnal->tanggal }}</td>
                <td>{{ $jurnal->mulai_pukul }}</td>
                <td>{{ $jurnal->selesai_pukul }}</td>
                <td>{{ $jurnal->kegiatan }}</td>
                <td style="text-align: center;">__________________</td>
                <td>
                    <a href="{{ route('jurnal.edit', $jurnal->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                    <form action="{{ route('jurnal.destroy', $jurnal->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center">
        {{ $jurnals->appends(request()->query())->links() }}
    </div>
</div>
@endsection
