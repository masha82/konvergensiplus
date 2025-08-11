<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opd;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:berita')->except(['anyData', 'file']);
    }

    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opds = Opd::all();
        return view('admin.posts.create', compact('opds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['opd_id' => Auth::user()->opd_id]);
        $data = $request->all();
        $filename = uniqid() . '-' . uniqid() . '.' . $request->image->
            getClientOriginalExtension();
        $path = $request->image->storeAs('images', $filename);
        $data['image'] = $path;
        Post::create($data);
        return redirect()->route('posts.index');
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


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::findOrFail($id);
        $opds = Opd::all();
        return view('admin.posts.edit', compact('opds', 'data'));
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
        $request->merge(['opd_id' => Auth::user()->opd_id]);
        $data = $request->all();
        $post = Post::findOrFail($id);
        $post->update($data);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        $file = storage_path('app/' . $data->image);
        unlink($file);
        $data::destroy($id);
    }

    public function anyData()
    {
        return DataTables::of(Post::where('opd_id', Auth::user()->opd_id))
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . route('posts.edit', $data->id) . '"><i class="fa fa-edit text-primary"></i></a>';
                $del = '<a href="#" data-id="' . $data->id . '" class="hapus-data"> <i class="fa fa-trash text-danger"></i></a>';
                return $edit . '&nbsp' . $del;
            })
            ->addColumn('content', function ($data) {
                return $data->content;
            })
            ->make(true);
    }
}
