<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
use DB;
use Storage;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('status')){
            $items = Item::where('status',0)->with('cats')->get();
        } else {
            $items = Item::where('status',1)->with('cats')->get();
        }
        return view('admin.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.items.create',compact('cats'));
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
            'name'        => 'required',
            'description' => 'required',
            'city'        => 'required',
            'location'    => 'required',
            'price'       => 'required',
            'category_id' => 'sometimes|nullable',
            'space'       => 'required',
            'rooms'       => 'required',
            'pathroom'    => 'required',
            'flat'        => 'required',
            'takseet'     => 'required',
            'tashteeb'    => 'required',
            'tajeer'      => 'required',
            'photo'       => 'image|mimes:jpg,jpeg,png',
        ]);
        if(request()->hasFile('photo')) {

            $data['photo'] = request()->file('photo')->store('items');
         }

        $data['user_id'] = adminauth()->id;
        $data['slug']    = str_replace(' ','-',$data['name']);
        Item::create($data);
        return redirect('admin/items');
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
        $item = Item::find($id);
        return view('admin.items.edit',compact('item'));
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
            'name'        => 'required',
            'description' => 'required',
            'city'        => 'required',
            'location'    => 'required',
            'price'       => 'required',
            'category_id' => 'sometimes|nullable',
            'space'       => 'required',
            'rooms'       => 'required',
            'pathroom'    => 'required',
            'flat'        => 'required',
            'takseet'     => 'required',
            'tashteeb'    => 'required',
            'tajeer'      => 'required',
            'photo'       => 'image|mimes:jpg,jpeg,png',
        ]);

         if(request()->hasFile('photo')) {
            !empty(Item::find($id)->photo) ? Storage::delete(Item::find($id)->photo) : '';

            $data['photo'] = request()->file('photo')->store('items');
         }

        $data['user_id'] = adminauth()->id;
        $data['slug']    = str_replace(' ','-',$data['name']);
        Item::find($id)->update($data);
        
        return redirect()->route('items.index');
    }

    public function approve($id) {
        Item::find($id)->update(['status'=>1]);
        return redirect()->route('items.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Item::find($id)->delete();
    }

    public function delete_all() {
         // multi delete items
       if(is_array(request('id'))) {
            Item::destroy(request('id'));
       } else {
            //single items
            Item::find(request('id'))->delete();
       }
       
       return redirect('admin/items');
    }
}
