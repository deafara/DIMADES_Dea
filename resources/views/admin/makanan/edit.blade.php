@extends('admin.layout')

@section('content')
<form action="{{route('food.update',Crypt::encrypt($data->id))}}" method="POST">
    @csrf
    {{ method_field('PUT') }}
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class=" card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit Produk</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name='name' class="form-control" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mitra</label>
                            <select class="form-control" name="mitra_id">
                                @foreach($mitra as $dt)
                                <option value="{{$dt->id}}" {{$dt->id == $data->mitra_id ? 'selected' : ''}}>{{$dt->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kategori</label>
                            <select class="form-control" name="category_id">
                                @foreach($category as $dt)
                                <option value="{{$dt->id}}" {{$dt->id == $data->category_id ? 'selected' : ''}}>{{$dt->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Harga</label>
                            <input type="text" name='price' class="form-control" value="{{$data->price}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Stok</label>
                            <input type="number" name='stock' class="form-control" value="{{$data->stock}}">
                        </div>
                        <input type="hidden" name="type" value="1">
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                            <a href="{{route('food.index')}}" class="btn btn-secondary btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection