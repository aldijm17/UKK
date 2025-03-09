@extends('layouts.app')
@section('main-content')
<div class="card shadow-lg col-6">
    <div class="card-body">
        <form action="{{ route('bicycles.store')}}" method="POST">
            @csrf 
            @method('POST')
            <label for="">Merk Sepeda</label>
            <input type="text" name="merk" class="form-control mb-3">
            <label for="">Tipe Sepeda</label>
            <input type="text" name="tipe" class="form-control mb-3">
            <label for="">Warna Sepeda</label>
            <input type="text" name="warna" class="form-control mb-3"> 
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="" class="form-control mb-3"></textarea>
            <label for="">Harga Sewa</label>
            <input type="number" name="harga_sewa" class="form-control mb-3">
            <button class="btn btn-primary">Simpan Data</button>
        </form>
    </div>
</div>
<div class="card mt-5 shadow">
    <h2 class="m-3">Data Sepeda</h2>
    <div class="card-body">
        <table class="table table-bordered border-dark">
            <thead class="bg-primary text-light">
                <tr class="text-center">
                    <th>No</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Warna</th>
                    <th>Deskripsi</th>
                    <th>Harga Sewa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bicycles as $index => $item)
                 <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{$item->merk}}</td>
                    <td>{{$item->tipe}}</td>
                    <td>{{$item->warna}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>Rp {{$item->harga_sewa}}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('bicycles.edit', $item->id_bicycle)}}" class="btn btn-warning me-3">Edit</a>
                        <form action="{{ route('bicycles.destroy', $item->id_bicycle)}}" method="POST">
                            @csrf 
                            @method("DELETE")
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                 </tr>
                @empty
                 <tr class="text-center">
                    <td colspan="6"><b><i>Data Kosong</i></b></td>
                 </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection