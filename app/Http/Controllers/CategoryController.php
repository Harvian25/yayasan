<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validate = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'category_image' => 'required',
        ]);

        if($request->hasFile('category_image')){
            if ($request->oldImage){
                unlink($request->oldImage);
            }
            $validate['category_image'] = $request->file('category_image');
            $ext = $validate['category_image']->getClientOriginalExtension();
            $filename= "category-" . time() . "." .$ext;
            request()->category_image->move(public_path('storage/'), $filename);
            $validate['category_image'] = $filename;

        }

        Category::create($validate);
        return redirect('category/')->with('success', 'Kategori barang berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validate = $request->validate([
            'category_name' => 'required',
            'category_image' => 'required',
            'category_description' => 'required',
        ]);

        
        if($request->hasFile('category_image')){
            if ($request->oldImage){
                unlink($request->oldImage);
            }
            $validate['category_image'] = $request->file('category_image');
            $ext = $validate['category_image']->getClientOriginalExtension();
            $filename= "category-" . time() . "." .$ext;
            request()->category_image->move(public_path('storage/'), $filename);
            $validate['category_image'] = $filename;

        }

        Category::where('id', $category->id)->update($validate);
        return redirect('category/')->with('success', 'Kategori barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $image_path ='storage/'.$category->category_image;
        if (File::exists(public_path( $image_path ))){
            unlink($image_path);
         }
        $category->delete();
        return redirect('category/')->with('success', 'Kategori barang berhasil dihapus');
    }
}
