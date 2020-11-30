<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPendidikan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Dosen\Models\Dosen;

class RiwayatPendidikanController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(RiwayatPendidikan $riwayatPendidikan)
    {
        return view('riwayat-pendidikan.edit', compact('riwayatPendidikan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, RiwayatPendidikan $riwayatPendidikan)
    {
        $riwayatPendidikan->update($request->all());

        return redirect()->back()->withSuccess('Riwayat Pendidikan updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(RiwayatPendidikan $riwayatPendidikan)
    {
        $riwayatPendidikan->delete();

        return redirect()->back()->withSuccess('Riwayat pendidikan deleted');
    }
}
