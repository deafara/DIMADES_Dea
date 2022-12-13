<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Mitra;

class ItemProductController extends ProductController implements ControllerInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('type', '2')->orderBy('name', 'ASC')->paginate(10);
        $this->data['products'] = $products;
        return view('admin.item.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Kategori::orderBy('name', 'ASC')->get();
        $mitra = Mitra::orderBy('name', 'ASC')->get();
        $this->data['category' ] = $category;
        $this->data['mitra'] = $mitra;
        return view('admin.item.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $params['type'] = '2';
        try{
            if (Product::create($params)) {
                Session::flash('success','Product has been saved');
            } else {
                Session::flash('error','Product cloud not be saved');
            }
            return redirect()->route('item.index');
        } catch (\Throwable $th) {
            Session::flash('error', "Periksa kembali isian");
            return redirect()->back();
        }
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
        $product = Product::findOrFail(Crypt::decrypt($id));
        $category = Kategori::orderBy('name', 'ASC')->get();
        $mitra = Mitra::orderBy('name', 'ASC')->get();
        $this->data['category'] = $category;
        $this->data['mitra'] = $mitra;
        $this->data['data'] = $product;
        return view('admin.item.edit', $this->data);
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
        
        $params = $request->all();
        $params['type'] = '2';
        try{
            $product = Product::findOrFail(Crypt::decrypt($id));
            if ($product->update($params)) {
                Session::flash('success','Product has been saved');
            } else {
                Session::flash('error','Product cloud not be saved');
            }
            return redirect()->route('item.index');
        } catch (\Throwable $th) {
            Session::flash('error', "Periksa kembali isian");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail(Crypt::decrypt($id));
        if ($product->delete()) {
            Session::flash('success', 'Product has been deleted');
        }
        return redirect()->route('item.index');
    }
}