@extends('layouts.app')
@section('main-content')
<div class="container">
    <h1 class="text-center mb-3">Customers</h1>
    <div class="row">
        <div class="col-md-6 " height="200">

            <div class="card" >
                <div class="card-body pb-5">
                    <form action="{{ route('customers.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('POST')
                        <input type="text" placeholder="Nama" name="nama" class="form-control mb-2">
                        <input type="file" placeholder="Your Profile" name="profil_img" class="form-control mb-2">
                        <textarea name="alamat" id="" placeholder="Alamat" class="form-control mb-2"></textarea>
                        <input type="text" placeholder="No Telpon" name="no_telpon" class="form-control mb-2">
                        <input type="email" placeholder="Email" name="email" class="form-control mb-3">
                        <button class="btn border-primary mt-2 col-12 bicycle-add-button"><i class="bi bi-floppy"></i> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="card mt-3 ">
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Email</th>
                            <th>Tanggal Dibuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $index => $item)
                        <tr>
                            <td>{{ $index + 1}}</td>
                            <td>{{ $item->nama}}</td>
                            <td><img src="{{asset($item->profil_img)}}" alt=""  height="100px" widht="100px"></td>
                            <td>{{ $item->alamat}}</td>
                            <td>{{ $item->no_telpon}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->created_at}}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('customers.edit', $item->id_customer)}}" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="{{ route('customers.destroy', $item->id_customer) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger ms-2"><i class="bi bi-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan = 7 class="text-center"> Data tidak ada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection