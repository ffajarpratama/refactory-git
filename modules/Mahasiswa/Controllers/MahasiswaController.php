<?php

namespace Modules\Mahasiswa\Controllers;

use Illuminate\Routing\Controller;
use Modules\Mahasiswa\Requests\Store;
use Modules\Mahasiswa\Requests\Update;
use Modules\Mahasiswa\Models\Mahasiswa;
use Modules\Mahasiswa\Tables\MahasiswaTableView;

class MahasiswaController extends Controller
{
    public function index()
    {
        return MahasiswaTableView::make()->view('mahasiswa::index');
    }

    public function create()
    {
        return view('mahasiswa::create');
    }

    public function store(Store $request)
    {
        Mahasiswa::create($request->validated());

        return redirect()->back()->withSuccess('Mahasiswa saved');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa::show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa::edit', compact('mahasiswa'));
    }

    public function update(Update $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update($request->validated());

        return redirect()->back()->withSuccess('Mahasiswa saved');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->back()->withSuccess('Mahasiswa deleted');
    }
}
