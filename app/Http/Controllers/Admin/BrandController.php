<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Brand::query();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route("admin.brand.edit", $row->id) . '" class="edit btn btn-secondary btn-sm">Edit</a>
                            <a href="' . route("admin.brand.delete", $row->id) . '" class="delete btn btn-danger btn-sm">Delete</a>
                        ';
                    return $btn;
                })

                ->rawColumns(['action',])
                ->make(true);
        }

        return view('Admin-Panel.brand.list');
    }

    public function create()
    {
        return view('Admin-Panel.brand.create');
    }
    public function save(Request $request)
    {

        $this->validate($request, [

            'title' => 'required',
            'status' => 'required',
        ]);

        $catageory = new Brand();
        $catageory->title = $request->title;
        $catageory->status = $request->status;
        $catageory->save();
        return redirect()->route('admin.brand.index');
    }

    public function edit($id)
    {
        
        $brands = Brand::where('id', $id)->get();
        
        return view('Admin-Panel.brand.edit', compact('brands'));
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'title' => 'required',
          
        ]);


        $brands = Brand::where('id', $id)->first();
        $brands->title = $request->title;
        $brands->save();
        return redirect()->route('admin.brand.index');
    }


    public function delete($id)
    {
        $catageory = Brand::find($id);
        $catageory->delete();
        return back()->with('message', 'Record has been deleted');
    }
}
