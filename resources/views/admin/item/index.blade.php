@extends('admin.layout')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Data Item</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Mitra</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @forelse($products as $row)
                                    <tr>
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->category->name}}</td>
                                        <td>{{$row->mitra->name}}</td>
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->stock}}</td>
                                        <td class="text-center">
                                            <form action="{{route('item.destroy', Crypt::encrypt($row->id))}}"
                                                method="POST">
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{route('item.edit', Crypt::encrypt($row->id))}}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No record found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('item.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection