<?php

namespace Modules\Mkuliah\Controllers;

use Illuminate\Routing\Controller;
use Modules\Mkuliah\Requests\Store;
use Modules\Mkuliah\Requests\Update;
use Modules\Mkuliah\Models\Mkuliah;
use Modules\Mkuliah\Tables\MkuliahTableView;

class MkuliahController extends Controller
{
    public function index()
    {
        return MkuliahTableView::make()->view('mkuliah::index');
    }

    public function create()
    {
        return view('mkuliah::create');
    }

    public function store(Store $request)
    {
        Mkuliah::create($request->validated());

        return redirect()->back()->withSuccess('Mata kuliah saved');
    }

    public function show(Mkuliah $mkuliah)
    {
        $mahasiswa = $mkuliah->mahasiswa;

        return view('mkuliah::show', compact('mkuliah', 'mahasiswa'));
    }

    public function edit(Mkuliah $mkuliah)
    {
        return view('mkuliah::edit', compact('mkuliah'));
    }

    public function update(Update $request, Mkuliah $mkuliah)
    {
        $mkuliah->update($request->validated());

        return redirect()->back()->withSuccess('Mata kuliah saved');
    }

    public function destroy(Mkuliah $mkuliah)
    {
        $mkuliah->delete();

        return redirect()->back()->withSuccess('Mata kuliah deleted');
    }
}
