<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {         
        $user = User::find(auth()->user()->id);
        return view('site.profile.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('site.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find(auth()->user()->id);
        return view('site.profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = $this->validate(request(),[
            'name'     => 'required|min:3',
            'email'    => 'required|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|min:8',
            'photo'    => 'image|mimes:jpg,jpeg,png',
        ]);

          if(!empty(request('password'))) {
            $data['password'] = bcrypt(request('password'));
         } else {
            $data['password'] = request('old_password');
         }
         

          if(request()->hasFile('photo')) {
            !empty(User::find($id)->photo) ? Storage::delete(User::find($id)->photo) : '';

            $data['photo'] = request()->file('photo')->store('users');
          }


         User::find($id)->update($data);

         return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
