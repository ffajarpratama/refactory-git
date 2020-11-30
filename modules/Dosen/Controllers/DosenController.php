<?php

namespace Modules\Dosen\Controllers;

use App\Models\RiwayatPendidikan;
use Illuminate\Routing\Controller;
use Modules\Dosen\Requests\Store;
use Modules\Dosen\Requests\Update;
use Modules\Dosen\Models\Dosen;
use Modules\Dosen\Tables\DosenTableView;

class DosenController extends Controller
{
    public function index()
    {
        return DosenTableView::make()->view('dosen::index');
    }

    public function create()
    {
        return view('dosen::create');
    }

    public function store(Store $request)
    {
        $dosen = Dosen::create($request->validated());
        $count = count($request->strata);

        for ($i = 0; $i < $count; $i++) {
            $riwayat = new RiwayatPendidikan();
            $riwayat->dosen_id = $dosen->id;
            $riwayat->strata = $request->strata[$i];
            $riwayat->jurusan = $request->jurusan[$i];
            $riwayat->sekolah = $request->sekolah[$i];
            $riwayat->tahun_mulai = $request->tahun_mulai[$i];
            $riwayat->tahun_selesai = $request->tahun_selesai[$i];
            $riwayat->save();
        }

        return redirect()->back()->withSuccess('Dosen saved');
    }

    public function show(Dosen $dosen)
    {
        $riwayat = $dosen->riwayat_pendidikan;
        return view('dosen::show', compact('dosen', 'riwayat'));
    }

    public function edit(Dosen $dosen)
    {
        $riwayat = $dosen->riwayat_pendidikan;

        return view('dosen::edit', compact('dosen', 'riwayat'));
    }

    public function update(Update $request, Dosen $dosen)
    {
        $dosen->update($request->validated());

        $count = count($request->strata);
        for ($i = 0; $i < $count; $i++) {
            if ($request->strata[$i] != null && $request->jurusan[$i] != null && $request->sekolah[$i] != null && $request->tahun_mulai[$i] != null && $request->tahun_selesai[$i] != null) {
                $riwayat = new RiwayatPendidikan();
                $riwayat->dosen_id = $dosen->id;
                $riwayat->strata = $request->strata[$i];
                $riwayat->jurusan = $request->jurusan[$i];
                $riwayat->sekolah = $request->sekolah[$i];
                $riwayat->tahun_mulai = $request->tahun_mulai[$i];
                $riwayat->tahun_selesai = $request->tahun_selesai[$i];
                $riwayat->save();
            }
        }

        return redirect()->back()->withSuccess('Dosen saved');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->back()->withSuccess('Dosen deleted');
    }
}
