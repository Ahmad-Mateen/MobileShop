<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
      
        if ($request->ajax()) {
            $data = User::get();
         
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route("admin.user.edit", $row->id) . '" class="edit btn btn-secondary btn-sm">Edit</a>
                            <a href="' . route("admin.user.delete", $row->id) . '" class="delete btn btn-danger btn-sm">Delete</a>
                        ';

                    return $btn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin-Panel.User.list');
    }

    public function create()
    {
        
       
        return view('Admin-Panel.User.create');
    }
    public function save(Request $request)
    {


        $this->validate($request, [

         'title'=>'required',
         'email'=>'required',
         'phone'=>'required',
         'address'=>'required',
         'postalcode'=>'required',

        ]);
        $user=new User();
        $user->title=$request->title;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->postalcode=$request->postalcode;
        $user->password=$request->password;
        $user->save();
        return redirect()->route('admin.user.index')->with('message','Record has been added');
      
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->get();
       
    


        return view('Admin-Panel.User.edit', compact('users'));
    }
    public function update(Request $request, $id)
    {

        $user = User::where('id', $id)->first();
        $user->title=$request->title;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->postalcode=$request->postalcode;
        $user->password=$request->old_password;
        $user->save();
        return redirect()->route('admin.user.index')->with('message','Record has been updated');

        
    }
    public function delete($id)
    {   
  
        $user = User::find($id);

        $user->delete();
        return back()->with('message', 'Record has been deleted');
    }
}
