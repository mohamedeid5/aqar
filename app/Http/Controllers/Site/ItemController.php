<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
use Storage;
class ItemController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except'=>['show','search','create']]);
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('user_id',auth()->user()->id)->get();
        return view('site.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('site.item.create',compact('cats'));
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
            'category_id' => 'required'
        ]);
        if(request()->hasFile('photo')) {

            $data['photo'] = request()->file('photo')->store('items');
         }

        $data['user_id'] = auth()->user()->id;
        //$data['slug']    = str_replace(' ','-',$data['name']);
        $data['slug']    = str_slug($data['name'], '-');
        Item::create($data);
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = Item::where('slug',$slug)->first();
        $cats = Category::all();
        return view('site.item.show',compact('item','cats'));
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
        return view('site.item.edit',compact('item'));
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


        $data['user_id'] = auth()->user()->id;
        $data['slug']    = str_replace(' ','-',$data['name']);
        Item::find($id)->update($data);
        
        return back();
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
        Item::find($id)->delete();

        return back();
    }

    public function search() {
        $this->validate(request(),[
            'name'     => 'required',
            'city'     => 'required',
            'location' => 'required'
        ]);
        $items = Item::where([
            ['name','like','%'.request('name').'%'],
            ['city','like','%'.request('city').'%'],
            ['location','like','%'.request('location').'%'],
        ])->get();

        return view('site.search',compact('items'));
    }

    
}
