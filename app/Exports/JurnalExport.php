<?php

namespace App\Exports;

use App\Models\JurnalKegiatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JurnalExport implements FromCollection, WithHeadings
{
    public function collection()
{
    $data = JurnalKegiatan::select('tempat', 'tanggal', 'mulai_pukul', 'selesai_pukul', 'kegiatan')->get();

    // Tambahkan kolom "paraf" manual
    return $data->map(function ($item) {
        return [
            'Tempat' => $item->tempat,
            'Tanggal' => $item->tanggal,
            'Mulai Pukul' => $item->mulai_pukul,
            'Selesai Pukul' => $item->selesai_pukul,
            'Kegiatan' => $item->kegiatan,
            'Paraf Pembimbing' => '__________________',
        ];
    });
}


    public function headings(): array
{
    return [
        'Tempat',
        'Tanggal',
        'Mulai Pukul',
        'Selesai Pukul',
        'Kegiatan',
        'Paraf Pembimbing',
    ];
}

}
