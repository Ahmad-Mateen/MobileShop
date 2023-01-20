<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {


        // $data = Product::with('categeories','brands')->get();
        // dd($data);

        if ($request->ajax()) {
            $data = Product::with('categories', 'brands');
            // dd($data->get());

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route("admin.product.edit", $row->id) . '" class="edit btn btn-secondary btn-sm">Edit</a>
                            <a href="' . route("admin.product.delete", $row->id) . '" class="delete btn btn-danger btn-sm">Delete</a>
                        ';

                    return $btn;
                })
                ->editColumn('brand_id', function ($row) {
                    return $row->brands->title;
                })
                ->editColumn('category_id', function ($row) {
                    return $row->categories->title;
                })
                ->editColumn('image_url', function ($row) {
                    $img_path = $row->image_url;
                    $img_path = str_replace('"', '', $img_path);
                    $img_path = asset('storage\uploads\\') . $img_path;
                    $image = "<img src='$img_path' height='80' width='80' />";

                    return $image;
                })
                ->rawColumns(['action', 'image_url', 'brand_id', 'categories_id'])
                ->make(true);
        }

        return view('Admin-Panel.product.list');
    }

    public function create()
    {
        $brands = Brand::get();
        $categeories = Category::get();
        return view('Admin-Panel.product.create', compact('brands', 'categeories'));
    }
    public function save(Request $request)
    {

        $this->validate($request, [

            'image_url' => 'required|mimes:png,jpge,jpg',

        ]);

        $fileName = time() . "products_images."   . $request->file('image_url')->getClientOriginalExtension();

        $request->file('image_url')->storeAs('public/uploads', $fileName);


        $banner = new Product();
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->discount = $request->discount;
        $banner->colors = $request->colors;
        $banner->condition = $request->condition;
        $banner->quantity = $request->quantity;
        $banner->image_url = $fileName;
        $banner->brand_id  = $request->brand_id;
        $banner->category_id  = $request->categeory_id;
        $banner->price = $request->price;
        $banner->save();

        return redirect()->route('admin.product.index');
    }

    public function edit($id)
    {
        $products = Product::where('id', $id)->with('brands', 'categories')->get();
        $pro = Product::get();


        return view('Admin-Panel.product.edit', compact('products','pro'));
    }
    public function update(Request $request, $id)
    {

        if ($request->filename == null) {
            
            $banner = Product::where('id', $id)->first();
            $banner->title = $request->title;
            $banner->description = $request->description;
            $banner->discount = $request->discount;
            $banner->colors = $request->colors;
            $banner->condition = $request->condition;
            $banner->quantity = $request->quantity;
            $banner->image_url = $request->old_url;
            $banner->brand_id  = $request->brand_id;
            $banner->category_id  = $request->categeory_id;
            $banner->price = $request->price;
            $banner->save();
            return redirect()->route('admin.product.index');
        } else {

            $fileName = time() . "banner_image."   . $request->file('image_url')->getClientOriginalExtension();
            $request->file('image_url')->storeAs('public/uploads', $fileName);

            $banner = Product::where('id', $id)->first();
            $banner->title = $request->title;
            $banner->description = $request->description;
            $banner->discount = $request->discount;
            $banner->colors = $request->colors;
            $banner->condition = $request->condition;
            $banner->quantity = $request->quantity;
            $banner->image_url = $fileName;
            $banner->brand_id  = $request->brand_id;
            $banner->category_id  = $request->categeory_id;
            $banner->price = $request->price;
            $banner->save();

            $banner->save();
            return redirect()->route('admin.product.index');
        }
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('message', 'Record has been deleted');
    }
}
