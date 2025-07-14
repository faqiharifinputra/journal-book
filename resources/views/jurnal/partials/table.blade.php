@forelse($jurnals as $index => $jurnal)
<tr>
    <td>{{ $index + 1 }}</td>
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
