<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Map;
use App\Models\Post;
use App\Models\Paparan;
use App\Models\Sidebar;
use App\Models\Video;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->get()->take(10);
       return $posts;
    }

     public function file($id)
    {
        $poster = Post::find($id);
        $file = storage_path('app/' . $poster->image);
        return response()
            ->file($file, [
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0'
            ]);
    }
    public function search(Request $request)
    {
        // return $request->all();
        // menangkap data pencarian
        $cari = $request->cari;
        $arr_kalimat = explode(" ", $cari);
        $jumlah = count($arr_kalimat);
        // var_dump($array);

        for ($i = 1; $i <= $jumlah; $i++) {
            ${'s' . $i} = $arr_kalimat[$i - 1];
        }

        //Berita
        if ($jumlah == 1) {
            $beritas = Post::where('content', 'like', "%" . $s1 . "%")
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
                  $materi = Paparan::where('nama_paparan', 'like', "%" . $s1 . "%")
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        } else if ($jumlah == 2) {
            $beritas = Post::where('content', 'like', "%" . $s1 . "%")
                ->where('content', 'like', "%" . $s2 . "%")
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
                $materi = Paparan::where('nama_paparan', 'like', "%" . $s1 . "%")
                ->where('nama_paparan', 'like', "%" . $s2 . "%")
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        } else if ($jumlah == 3) {
            $beritas = Post::where('content', 'like', "%" . $s1 . "%")
                ->where('content', 'like', "%" . $s2 . "%")
                ->where('content', 'like', "%" . $s3 . "%")
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
                 $materi = Paparan::where('nama_paparan', 'like', "%" . $s1 . "%")
                ->where('nama_paparan', 'like', "%" . $s2 . "%")
                ->where('nama_paparan', 'like', "%" . $s3 . "%")
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        } else {
            $beritas = Post::where('content', 'like', "%" . $s1 . "%")
                ->where('content', 'like', "%" . $s2 . "%")
                ->where('content', 'like', "%" . $s3 . "%")
                ->where('content', 'like', "%" . $s4 . "%")
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
                 $materi = Paparan::where('nama_paparan', 'like', "%" . $s1 . "%")
                ->where('nama_paparan', 'like', "%" . $s2 . "%")
                ->where('nama_paparan', 'like', "%" . $s3 . "%")
                ->where('nama_paparan', 'like', "%" . $s4 . "%")
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        }
        
        
        
        //Hasil
        $data = [];
        $result = [];
        foreach ($beritas as $berita) {
            $data = [
                'judul' => $berita->title,
                'berita' => $berita->content,
                'slug' => $berita->id,
                'tautan' =>'https://sibesti.situbondokab.go.id/berita/'.$berita->id
            ];
            array_push($result, $data);
        }
        foreach ($materi as $paparan) {
            $data = [
                'judul' => '(PDF) '.$paparan->nama_paparan,
                'berita' => 'Download materi paparan SIBESTI diunggah pada '.$paparan->tgl.'. - '.$paparan->nama_paparan.'Dapatkan materi paparan lebih banyak pada laman https://sibesti.situbondokab.go.id',
                'slug' => $paparan->id,
                'tautan' => 'https://sibesti.situbondokab.go.id/paparan/file/'.$paparan->id
            ];
            array_push($result, $data);
        }

        return response()->json($result);
    }
}
