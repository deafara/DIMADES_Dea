@extends('admin.layout')
@section('content')
    <form action="{{route('food.store')}}" method="post">
    {{csrf_field()}}
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Tambah Produk</h2>
                    </div>
                </div>
                @include('admin.partials.flash')
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mitra</label>
                        <select class="form-control" name="mitra_id">
                            @foreach ($mitra as $data)
                                <option value="{{$data->id}}" {{old('mitra_id') == $data->id ? 'selected' : ''}}>{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select class="form-control" name="category_id">
                            @foreach ($category as $data)
                                <option value="{{$data->id}}" {{old('category_id') == $data->id ? 'selected' : ''}}>{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Harga</label>
                        <input type="text" name="price" class="form-control" value="{{old('price')}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Stok</label>
                        <input type="text" name="stock" class="form-control" value="{{old('stock')}}">
                    </div>
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                        <a href="{{ route('food.index') }}" class="btn btn-secondary btn-default">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection