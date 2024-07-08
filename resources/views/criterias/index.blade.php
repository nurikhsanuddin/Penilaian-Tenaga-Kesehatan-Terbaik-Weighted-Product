@extends('layouts.main')

@section('title', 'Daftar Kriteria')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Kriteria <br></h1>
        <p>Halaman Penambahan Kriteria</p>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <hr>
    <div class="row">
        <div class="add-admin col-xl-4 col-md-6">
            @can('create', \App\Models\Criteria::class)
                <a href="{{ route('criterias.create') }}" wire:navigate>
                    <button type="button" class="btn btn-primary my-4">
                        <i class="fa-solid fa-pencil"></i>
                        <span class="ps-2 fw-bolder"> Tambah Kriteria</span>
                    </button>
                </a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="tabel-adm col-md-12 mx-auto">
            <h4 class="pt-4 pb-3">Daftar Kriteria</h4>
            @if (session('success'))
                <div class="modal fade success" id="modal-success" tabindex="-1" aria-labelledby="modal-successLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-successLabel">Informasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ session('success') }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="table-responsive w-100">
                <table class="table table-bordered">
                    <thead>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Bobot</th>
                        @can('update', \App\Models\Criteria::class)
                            <th scope="col">Action</th>
                        @endcan
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($criterias as $criteria)
                            <tr>
                                <td>C{{ $criteria->id }}</td>
                                <td>{{ $criteria->name }}</td>
                                <td>{{ $criteria->category }}</td>
                                <td>{{ $criteria->weight }}</td>
                                @can('update', $criteria)
                                    <td class="d-flex">
                                        <a href="{{ route('criterias.edit', $criteria->id) }}"><button type="button"
                                                class="edit-btn rounded-3 ms-2 my-1"><i
                                                    class="fa-solid fa-pen-to-square"></i></button></a>
                                        <form action="{{ route('criterias.destroy', $criteria->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return false" class="delete-btn rounded-3 ms-2 my-1"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            if ($('.success').length) {
                $('#modal-success').modal('show');
            }

            $('.delete-btn').click(function() {
                swal({
                        text: "Apakah anda ingin menghapus data?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            this.parentElement.submit();
                            swal("Data berhasil dihapus!", {
                                icon: "success",
                            });
                        } else {
                            swal("Data tidak dihapus!");
                        }
                    });
            });
        });
    </script>
@endsection
