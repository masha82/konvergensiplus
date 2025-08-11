<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\Sebaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PeriodeController extends Controller
{
    public function index()
    {
        $data = Periode::all();
        return view('admin.periode.index', compact('data'));
    }

    public function create()
    {
        return view('admin.periode.create');
    }

    public function show($id)
    {
        $data = Periode::findOrFail($id);
        return view('admin.periode.show', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
        ]);
        Periode::create($request->all());
        return redirect()->route('periode.index');
    }

    public function destroy($id)
    {
        Periode::destroy($id);
    }

    public function anyData()
    {
        return DataTables::of(Periode::query())
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . route("periode.show", $data->id_periode) . '"><i class="fa fa-edit text-primary"></i></a>';
                $del = '<a href="#" data-id="' . $data->id_periode . '" class="hapus-data"> <i class="fa fa-trash text-danger"></i></a>';
                return $edit . '&nbsp' . $del;
            })
            ->make(true);
    }
}
