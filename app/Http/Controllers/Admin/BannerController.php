<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use DataTables;



class BannerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::query();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route("admin.banner.edit", $row->id) . '" class="edit btn btn-secondary btn-sm">Edit</a>
                            <a href="' . route("admin.banner.delete", $row->id) . '" class="delete btn btn-danger btn-sm">Delete</a>
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

        return view('Admin-Panel.banner.list');
    }

    public function create()
    {
        return view('Admin-Panel.banner.create');
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

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->image_url = $fileName;
        $banner->save();

        return redirect()->route('admin.banner.index');
    }

    public function edit($id)
    {
        $banners = Banner::where('id', $id)->get();

        return view('Admin-Panel.banner.edit', compact('banners'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',
            // 'filename' => 'required|mimes:png,jpge,jpg',

        ]);
        if ($request->filename == null) {
            $banner = Banner::where('id', $id)->first();
            $banner->title = $request->title;
            $banner->description = $request->description;
            
            $banner->save();


            return redirect()->route('admin.banner.index');
        } else {
            $fileName = time() . "banner_image."   . $request->file('filename')->getClientOriginalExtension();
            $request->file('filename')->storeAs('public/uploads', $fileName);

            $banner = Banner::where('id', $id)->first();
            $banner->title = $request->title;
            $banner->description = $request->description;
            $banner->image_url = $fileName;

            $banner->save();
            return redirect()->route('admin.banner.index');
        }
    }
    public function delete($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return back()->with('message', 'Record has been deleted');
    }
}
