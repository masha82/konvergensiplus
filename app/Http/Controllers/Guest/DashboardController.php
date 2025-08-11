<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Map;
use App\Models\Periode;
use App\Models\Post;
use App\Models\Sebaran;
use App\Models\Sidebar;
use App\Models\Video;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(4);
        $videos = Video::latest()->get();
        $map = Map::latest()->first();
        $sidebar = Sidebar::where('status', 1)->get();
        $peta = Map::orderBy('created_at', 'DESC')->get();
        $data = Periode::with('sebaran')
            ->orderBy('tahun', 'DESC')
            ->orderBy('bulan','DESC')->first();
            
        return view('guest.welcome', compact('posts', 'videos', 'map', 'peta', 'sidebar', 'data'));
    }
    
        public function rincian($id)
    {
        $wilayah = Wilayah::find($id);
        $data = DB::table('periode')
            ->join('sebaran', 'periode.id_periode', '=', 'sebaran.id_periode')
            ->where('id_kec', $id)->get();
        return view('guest.rincian', compact('data', 'wilayah'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $posts = Post::paginate(2);
        return view('guest.post', compact('post', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function peta($id)
    {
        $poster = Map::find($id);
        $file = storage_path('app/' . $poster->path);
        return response()
            ->file($file, [
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0'
            ]);
    }
        public function statistik()
    {
        $data = DB::table('periode')
            ->join('sebaran', 'periode.id_periode', '=', 'sebaran.id_periode')
            ->where('tahun', date('Y'))->get();
        $array = [];
        foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                     'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $key => $bulan) {
            $result = $data->where('bulan', $key + 1)->sum('nilai') / 20;
            $array[$key] = number_format($result, 2);
        }
        $convert = array_map('strval', $array);
        $statistik = implode(',', $convert);

        return view('guest.statistik', compact('statistik'));
    }
}
