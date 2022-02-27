<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlashSale;
use Carbon\Carbon;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = FlashSale::orderBy('id','DESC')->get();
        // dd($sales); 
        return view('admin.flash-sale.list', [
            'sales' => $sales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flash-sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token','_method');

        $data['start_from'] = date('Y-m-d H:i:s',strtotime($data['publish_date']." 10:00:00"));
        $data['expire_on'] = date('Y-m-d H:i:s', strtotime($data['start_from'] . ' +1 day'));
        // $data['expire_on'] = Carbon::parse($data['publish_date'])->add(1,'day')->format('Y-m-d 10:00:00'); 

        // dd($data['expire_on']);

        // $data['start_from'] = Carbon::parse($data['publish_date'])->format('Y-m-d 10:00:00');
        // $data['expire_on'] = Carbon::parse($data['publish_date'])->add(1,'day')->format('Y-m-d 10:00:00');
       
        if ($request->hasFile('cover') ) {
            $file=$request->cover;
            $file_name = time().$file->getClientOriginalName();
            $file->move(public_path(). '/thumbnail', $file_name);   
            $data['cover'] = 'thumbnail/'.$file_name;
        }

        FlashSale::create($data);

        return redirect()->route('flash-sale.index')->with('message', 'Create successful');


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
        $sale = FlashSale::find($id);

        // dd($sale->id);

        return view('admin.flash-sale.edit',[
            'sale' => $sale
        ]);
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
        $sale = FlashSale::find($id);
        
        $data = $request->except('_token','_method');
        
        $data['slug'] = str_replace(' ', '-', $request->input('title'));

        if ($request->hasFile('cover')) {
            $file=$request->cover;
            $file->move(public_path(). '/thumbnail/', time().$file->getClientOriginalName());   
            $data['cover'] = 'thumbnail/'.time().$file->getClientOriginalName();
        }

        $sale = FlashSale::where('id',$id)->update($data);

        return redirect()->route('flash-sale.index')->with('message', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $sale = FlashSale::find($id);
       $sale->delete();
       return redirect()->route('flash-sale.index')->with('message', 'Delete successful');

   }
}
