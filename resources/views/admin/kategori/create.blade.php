@extends('admin.layout')
@section('content')
    <form action="{{route('kategori.store')}}" method="post">
    {{csrf_field()}}
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Tambah Kategori</h2>
                    </div>
                </div>
                @include('admin.partials.flash')
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis</label>
                        <select class="form-control" name="jenis">
                            <option>Pilih Jenis</option>
                            <option value="Makanan & Minuman">Makanan & Minuman</option>
                            <option value="Benda">Benda</option>
                        </select>
                    </div>
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                        <a href="{{route('kategori.index')}}" class="btn btn-secondary btn-default">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection