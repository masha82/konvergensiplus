<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Map;
use App\Models\Periode;
use App\Models\Sebaran;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:peta')->except(['anyData']);
    }

    public function index()
    {
        return view('admin.peta.index');
    }

    public function show($id)
    {
        $wilayah = Wilayah::all();
        $periode = Periode::findOrFail($id);
        return view('admin.peta.create', compact('wilayah', 'periode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kec' => 'required',
            'nilai' => 'required|numeric',
        ]);
        $wilayah = Wilayah::findOrFail($request->id_kec);
        $request['nama_kecamatan'] = $wilayah->NAMA_KEC;
        $request['longitude'] = $wilayah->longitude;
        $request['latitude'] = $wilayah->latitude;
        Sebaran::create($request->all());
        return redirect()->route('periode.show', $request->id_periode);
    }

    public function destroy($id)
    {
        Sebaran::destroy($id);
    }

    public function anyData($id)
    {
        return DataTables::of(Sebaran::with('periode')->where('id_periode', $id))
            ->addColumn('action', function ($data) {
                $edit = '<a href="#"><i class="fa fa-edit text-primary"></i></a>';
                $del = '<a href="#" data-id="' . $data->id_sebaran . '" class="hapus-data"> <i class="fa fa-trash text-danger"></i></a>';
                return $edit . '&nbsp' . $del;
            })
            ->make(true);
    }
}
