<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);

        if($request->hasFile('image')){
            if ($request->oldImage){
                unlink($request->oldImage);
            }
            $validate['image'] = $request->file('image');
            $ext = $validate['image']->getClientOriginalExtension();
            $filename= "news-" . time() . "." .$ext;
            request()->image->move(public_path('storage/'), $filename);
            $validate['image'] = $filename;
        }

        News::create($validate);
        return redirect('news/')->with('success', 'berita  berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required',
            // 'image' => 'required',
        ]);

        
        if($request->hasFile('image')){
            if ($request->oldImage){
                unlink($request->oldImage);
            }
            $validate['image'] = $request->file('image');
            $ext = $validate['image']->getClientOriginalExtension();
            $filename= "news-" . time() . "." .$ext;
            request()->image->move(public_path('storage/'), $filename);
            $validate['image'] = $filename;

        }

        News::where('id', $news->id)->update($validate);
        return redirect('news/')->with('success', 'berita  berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $image_path ='storage/'.$news->image;
        if (File::exists(public_path( $image_path ))){
            unlink($image_path);
         }
        $news->delete();
        return redirect('news/')->with('success', 'Berita berhasil dihapus');
    }
}
