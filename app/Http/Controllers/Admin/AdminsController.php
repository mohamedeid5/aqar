<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $admins = Admin::all();
        return view('admin.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(),[
            'name'     => 'required|min:3',
            'email'    => 'required|unique:admins|email',
            'password' => 'required'
        ]);

        $data['password'] = bcrypt(request('password'));

        Admin::create($data);

        return redirect('admin/admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //return request();
         $data = $this->validate(request(),[
            'name'     => 'required|min:3',
            'email'    => 'required|unique:admins,email,'.$id,
            'password' => 'sometimes|nullable|min:8'
        ]);

         if(!empty(request('password'))) {
            $data['password'] = bcrypt(request('password'));
         } else {
            $data['password'] = request('old_password');
         }

         Admin::find($id)->update($data);

         return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          /*
        Admin::find($id)->delete();

        return redirect('admins');
        */
    }

    public function delete_all() {
        // multi delete admin
       if(is_array(request('id'))) {
            Admin::destroy(request('id'));
       } else {
            //single delete
            Admin::find(request('id'))->delete();
       }
       
       return back();
    }
}
