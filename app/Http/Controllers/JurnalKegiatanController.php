<?php

namespace App\Http\Controllers;

use App\Models\JurnalKegiatan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JurnalExport;
use Barryvdh\DomPDF\Facade\Pdf;







class JurnalKegiatanController extends Controller
{
   public function index(Request $request)
{
    $query = JurnalKegiatan::query();

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('tempat', 'like', '%' . $request->search . '%')
              ->orWhere('kegiatan', 'like', '%' . $request->search . '%')
              ->orWhere('tanggal', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('from') && $request->filled('to')) {
        $query->whereBetween('tanggal', [$request->from, $request->to]);
    }

    if ($request->filled('sort')) {
        $query->orderBy('tanggal', $request->sort);
    }

    // ✅ Set pagination ke 25 per halaman
    $jurnals = $query->paginate(25);

    return view('jurnal.index', compact('jurnals'));
}



public function create()
{
    return view('jurnal.create');
}

public function store(Request $request)
{
    $request->validate([
        'tempat' => 'required',
        'tanggal' => 'required|date',
        'mulai_pukul' => 'required',
        'selesai_pukul' => 'required',
        'kegiatan' => 'required',
    ]);

    JurnalKegiatan::create($request->all());

    return redirect()->route('jurnal.index')->with('success', 'Data jurnal berhasil ditambahkan');
}


public function edit($id)
{
    $jurnal = JurnalKegiatan::findOrFail($id);
    return view('jurnal.edit', compact('jurnal'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'tempat' => 'required',
        'tanggal' => 'required|date',
        'mulai_pukul' => 'required',
        'selesai_pukul' => 'required',
        'kegiatan' => 'required',
    ]);

    $jurnal = JurnalKegiatan::findOrFail($id);
    $jurnal->update($request->all());

    return redirect()->route('jurnal.index')->with('success', 'Data jurnal berhasil diperbarui');
}

public function destroy($id)
{
    JurnalKegiatan::findOrFail($id)->delete();
    return redirect()->route('jurnal.index')->with('success', 'Data jurnal berhasil dihapus');
}

public function exportExcel()
{
    return Excel::download(new JurnalExport, 'jurnal_kegiatan.xlsx');
}

public function exportPDF()
{
    $jurnals = JurnalKegiatan::all();
    $pdf = PDF::loadView('jurnal.export_pdf', compact('jurnals'));
    return $pdf->download('jurnal_kegiatan.pdf');
}

public function liveSearch(Request $request)
{
    $query = JurnalKegiatan::query();

    if ($request->has('search') && $request->search !== '') {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('tempat', 'like', '%' . $search . '%')
              ->orWhere('kegiatan', 'like', '%' . $search . '%')
              ->orWhere('tanggal', 'like', '%' . $search . '%');
        });
    }

    if ($request->sort === 'asc') {
        $query->orderBy('tanggal', 'asc');
    } elseif ($request->sort === 'desc') {
        $query->orderBy('tanggal', 'desc');
    }

    $jurnals = $query->get();

    return view('jurnal.partials.table', compact('jurnals'))->render();
}


public function show($id)
{
    $jurnal = JurnalKegiatan::findOrFail($id);
    return view('jurnal.show', compact('jurnal'));
}

public function print(Request $request)
{
    $query = JurnalKegiatan::query();

    if ($request->filled('from') && $request->filled('to')) {
        $query->whereBetween('tanggal', [$request->from, $request->to]);
    }

    $jurnals = $query->get();

    return view('jurnal.print', compact('jurnals'));
}

}
