<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class KategoriController implements ControllerInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::orderBy('name', 'ASC')->paginate(10);
        $this->data['data'] = $data;
        return view('admin.kategori.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (Kategori::create($request->all())) {
                Session::flash('success',"Berhasil Simpan");
            }else{
                Session::flash('error',"Gagal Simpan");
            }
            return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
            Session::flash('error',"Periksa kembali isian");
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
        $data = Kategori::findOrFail(Crypt::decrypt($id));
        $this->data['data'] = $data;
        return view('admin.kategori.edit', $this->data);
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
        try {
            $data = Kategori::findOrFail(Crypt::decrypt($id));
            $data->update($request->all());
            Session::flash('success',"Berhasil Update");
            return redirect()->route('kategori.index');
            if ($data->update($request->all())) {
                Session::flash('success',"Berhasil Edit");
            }else{
                Session::flash('error',"Gagal Edit");
            }
            return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
            Session::flash('error',"Periksa kembali isian");
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
        $data = Kategori::findOrFail(Crypt::decrypt($id));
        if ($data->delete()) {
            Session::flash('success',"Berhasil Hapus");
        }else{
            Session::flash('error',"Gagal Hapus");
        }
        return redirect()->route('kategori.index');
    }
}