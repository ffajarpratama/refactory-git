<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Mahasiswa\Models\Mahasiswa;
use Modules\Mkuliah\Models\Mkuliah;

class MahasiswaMatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $matkul = Mkuliah::all();
        $sks = $mahasiswa->mata_kuliah->sum('jumlah_sks');

        return view('mahasiswa-matkul.edit', compact('mahasiswa', 'matkul', 'sks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->mata_kuliah()->sync($request->matkul);

        if ($mahasiswa->mata_kuliah->sum('jumlah_sks') > 24) {
            $mahasiswa->mata_kuliah()->detach();
            return back()->withErrors('Jumlah SKS tidak boleh lebih dari 24!');
        } else {
            return redirect()->back()->withSuccess('Mata Kuliah updated');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
