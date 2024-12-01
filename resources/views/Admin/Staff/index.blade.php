@extends('Admin.Dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Daftar Staff</h3>
                    <a href="{{route('staff.create')}}" class="btn btn-primary">Tambah Staff</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>ID Staff</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Jabatan </th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($staff as $member)
                                    <tr>
                                        <td>{{$member->id}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->id_staff}}</td>
                                        <td>{{$member->no_hp}}</td>
                                        <td>{{$member->email}}</td>
                                        <td>{{$member->jabatan}}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('staff.edit', $member->id) }}"
                                                   class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('staff.destroy', $member->id) }}"
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data peminjaman</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
