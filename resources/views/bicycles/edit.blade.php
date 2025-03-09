@extends('layouts.app')
@section('main-content')
<div class="card">
    <div class="card-body">
    <form action="{{ route('bicycles.update', $bicycles->id_bicycle)}}" method="POST">
            @csrf 
            @method('PUT')
            <label for="">Merk Sepeda</label>
            <input type="text" name="merk" class="form-control mb-3" value="{{old('merk', $bicycles->merk)}}" >
            <label for="">Tipe Sepeda</label>
            <input type="text" name="tipe" class="form-control mb-3" value="{{old('tipe', $bicycles->tipe)}}">
            <label for="">Warna Sepeda</label>
            <input type="text" name="warna" class="form-control mb-3" value="{{old('warna', $bicycles->warna)}}"> 
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="" class="form-control mb-3">{{old('deskripsi', $bicycles->deskripsi)}}</textarea>
            <label for="">Harga Sewa</label>
            <input type="number" name="harga_sewa" class="form-control mb-3" value="{{old('harga_sewa', $bicycles->harga_sewa)}}">
            <button class="btn btn-success">Simpan Data</button>
        </form>
    </div>
</div>
@endsection