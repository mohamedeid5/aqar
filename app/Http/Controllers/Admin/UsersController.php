<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Storage;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'email'    => 'required|unique:users|email',
            'password' => 'required',
            'photo'    => 'image|mimes:jpg,jpeg,png'
        ]);

        $data['password'] = bcrypt(request('password'));

         if(request()->hasFile('photo')) {

            $data['photo'] = request()->file('photo')->store('users');
         }

        User::create($data);

        return redirect('admin/users');
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
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
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
         $data = $this->validate(request(),[
            'name'     => 'required|min:3',
            'email'    => 'required|unique:users,email,'.$id,
            'password' => 'sometimes|min:8',
            'photo'    => 'image|mimes:jpg,jpeg,png',
        ]);

        if(!empty(request('password'))) {
            $data['password'] = bcrypt(request('password'));
         } else {
            $data['password'] = request('old_password');
         }
         return $data;
          if(request()->hasFile('photo')) {
            !empty(User::find($id)->photo) ? Storage::delete(User::find($id)->photo) : '';

            $data['photo'] = request()->file('photo')->store('users');
          }


         User::find($id)->update($data);

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
        User::find($id)->delete();

        return redirect('admins');
        */
    }

    public function delete_all() {
        // multi delete admin
       if(is_array(request('id'))) {
            User::destroy(request('id'));
       } else {
            //single delete
            User::find(request('id'))->delete();
       }
       
       return back();
    }

}
