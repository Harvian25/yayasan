<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'amount' => 'required:numeric',
            'image' => 'required',
        ]);

        if($request->hasFile('image')){
            if ($request->oldImage){
                unlink($request->oldImage);
            }
            $validate['image'] = $request->file('image');
            $ext = $validate['image']->getClientOriginalExtension();
            $filename= "item-" . time() . "." .$ext;
            request()->image->move(public_path('storage/'), $filename);
            $validate['image'] = $filename;
        }

        Item::create($validate);
   
        return redirect('items/')->with('success', 'Barang yang dibutuhkan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    public function showItem($category_id){
        $items = Item::where('category_id', $category_id)->get();
        $category = Category::where('id', $category_id)->first();
        $user = Auth::user();
        $unreadNotifications = $user->unreadNotifications;
        return view('donations.needed_item', compact('items', 'unreadNotifications', 'category'));
    }

    public function showCategory(){
        $categories = Category::all();
        $user = Auth::user();
        $unreadNotifications = $user->unreadNotifications;
        return view('donations.index', compact('categories', 'unreadNotifications'));
    }

    public function showAllItems(Item $item)
    {
        $user = Auth::user();
        $unreadNotifications = $user->unreadNotifications;

        if (request('category')) {
            $category = Category::firstWhere('category_name', request('category'));
            $title = ' in ' . $category->category_name;
        }

        $items = Item::latest()->filter(request(['search', 'category']))->paginate(10)->withQueryString();
        
        return view('donations.all_needed_items', compact('items', 'unreadNotifications'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('admin.items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'amount' => 'required:numeric',
           
        ]);

        if($request->hasFile('image')){
            if ($request->oldImage){
                unlink($request->oldImage);
            }
            $validate['image'] = $request->file('image');
            $ext = $validate['image']->getClientOriginalExtension();
            $filename= "item-" . time() . "." .$ext;
            request()->image->move(public_path('storage/'), $filename);
            $validate['image'] = $filename;
        }

        Item::where('id', $item->id)->update($validate);
   
        return redirect('items/')->with('success', 'Barang yang dibutuhkan berhasil dieedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $image_path ='storage/'.$item->image;
        if (File::exists(public_path( $image_path ))){
            unlink($image_path);
         }
        $item->delete();
        return redirect()->back()->with('success', 'Barang berhasil dihapus');
    }
}
