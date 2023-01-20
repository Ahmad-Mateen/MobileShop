<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::query();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route("admin.category.edit", $row->id) . '" class="edit btn btn-secondary btn-sm">Edit</a>
                            <a href="' . route("admin.category.delete", $row->id) . '" class="delete btn btn-danger btn-sm">Delete</a>
                        ';
                    return $btn;
                })
                ->editColumn('image_url', function ($row) {
                    $img_path = $row->image_url;
                    $img_path = str_replace('"', '', $img_path);
                    $img_path = asset('storage\uploads\\') . $img_path;
                    $image = "<img src='$img_path' height='80' width='80' />";

                    return $image;
                })
                ->rawColumns(['action', 'image_url'])
                ->make(true);
        }

        return view('Admin-Panel.category.list');
    }

    public function create()
    {
        return view('Admin-Panel.category.create');
    }
    public function save(Request $request)
    {

        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',
            'filename' => 'required|mimes:png,jpge,jpg',

        ]);

        $fileName = time() . "banner_image."   . $request->file('filename')->getClientOriginalExtension();
        $request->file('filename')->storeAs('public/uploads', $fileName);

        $catageory = new Category();
        $catageory->title = $request->title;
        $catageory->description = $request->description;
        $catageory->image_url = $fileName;
        $catageory->save();

        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $catageories = Category::where('id', $id)->get();

        return view('Admin-Panel.category.edit', compact('catageories'));
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',
            // 'filename' => 'required|mimes:png,jpge,jpg',

        ]);


        if ($request->filename == null) {
            $catageory = Category::where('id', $id)->first();
            $catageory->title = $request->title;
            $catageory->description = $request->description;
            $catageory->image_url = $request->old_url;
            $catageory->save();
            return redirect()->route('admin.category.index');
        } else {
            $fileName = time() . "banner_image."   . $request->file('filename')->getClientOriginalExtension();
            $request->file('filename')->storeAs('public/uploads', $fileName);
            $catageory = Category::where('id', $id)->first();
            $catageory->title = $request->title;
            $catageory->description = $request->description;
            $catageory->image_url = $fileName;

            $catageory->save();
            return redirect()->route('admin.category.index');
        }
    }
    public function delete($id)
    {
        $catageory = Category::find($id);
        $catageory->delete();
        return back()->with('message', 'Record has been deleted');
    }
}
