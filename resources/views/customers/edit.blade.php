@extends('layouts.app')
@section('main-content')
        <div class="card">
            <div class="card-body">
            <form action="{{ route('customers.update', $customers->id_customer)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                <input type="text" placeholder="Nama" name="nama" class="form-control mb-2" value="{{ old('nama', $customers->nama)}}">
                <input type="file" placeholder="Your Profile" name="profil_img" class="form-control mb-2">
                <textarea name="alamat" id="" placeholder="Alamat" class="form-control mb-2"> {{old('alamat',$customers->alamat)}}</textarea>
                <input type="text" placeholder="No Telpon" name="no_telpon" class="form-control mb-2" value="{{ old('no_telpon', $customers->no_telpon)}}">
                <input type="email" placeholder="Email" name="email" class="form-control mb-3" value="{{ old('email', $customers->email)}}">
                <button class="btn btn-primary mb-2">Simpan Data</button>
            </form>
            </div>
        </div>
@endsection