<?php

namespace App\Http\Controllers;

use App\Models\Porducts;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PorductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
      
      $pro =  porducts::all();
      return view('products.showProduct', [
          'products' =>  $pro,
          'title' => 'products'
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.product');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $Porducts = new Porducts;
        $Porducts->ProductTitle =$request->Input('ProductTitle');
        $Porducts->Descripion =$request->Input('Descripion');
        if($request->hasFile('photos'))
        {
            $file = $request->file('photos');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file-> move('uploaded_file/Porducts',$filename);
            $Porducts->photos = $filename;
        } 
         
        $Porducts->save();
        return redirect()->route('product.create')->with('status', 'Products added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Porducts  $porducts
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $proTable =  porducts::all();
        return view('Products.DisplayTableProduct', compact('proTable'));

    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Porducts  $porducts
     * @return \Illuminate\Http\Response
     */
    public function edit(Porducts $porducts)
    {
        return view('Products.EditProduct', compact('porducts'));
        //
    }
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Porducts  $porducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $Porducts = Porducts::findOrFail($id);
        $Porducts->ProductTitle =$request->Input('ProductTitle');
        $Porducts->Descripion =$request->Input('Descripion');
        if($request->hasFile('photos'))
        { 
            $file = $request->file('photos');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file-> move('uploaded_file/Porducts',$filename);
            $Porducts->photos = $filename;
        } 
         
        $Porducts->save();
        return redirect()->route('product.show')->with('status', 'Products data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Porducts  $porducts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Porducts = Porducts::findOrFail($id);
        $Porducts->delete();
       
        return redirect()->route('product.show')->with('messagesRestore','Products data deleted successfully');
 
    }
}
