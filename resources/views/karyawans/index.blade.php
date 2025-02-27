@extends('layouts.app')
@section('karyawans')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow rounded-lg">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Karyawan</h5>
                    <a href="{{ route('karyawans.create') }}" class="btn btn-light btn-sm shadow-sm">
                        <i class="fas fa-plus"></i> Tambah Karyawan
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered text-center">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($karyawans as $index => $karyawan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $karyawan->nip }}</td>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $karyawan->alamat }}</td>
                                    <td>{{ $karyawan->jenis_kelamin }}</td>
                                    <td>{{ $karyawan->jabatan }}</td>
                                    <td>
                                        <a href="{{ route('karyawans.show', $karyawan->id) }}" class="btn btn-sm btn-dark">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="d-inline" onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-danger">Data karyawan belum tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $karyawans->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteData(id) {
            return Swal.fire({
                title: 'Yakin?',
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.isConfirmed){
                    route('karyawans.destroy', id);
                }
            });
        }
        //message with sweetalert
        // @if(session('success'))
        //     Swal.fire({
        //         icon: "success",
        //         title: "BERHASIL",
        //         text: "{{ session('success') }}",
        //         showConfirmButton: false,
        //         timer: 2000
        //     });
        // @elseif(session('error'))
        //     Swal.fire({
        //         icon: "error",
        //         title: "GAGAL!",
        //         text: "{{ session('error') }}",
        //         showConfirmButton: false,
        //         timer: 2000
        //     });
        // @endif

    </script>

@endsection