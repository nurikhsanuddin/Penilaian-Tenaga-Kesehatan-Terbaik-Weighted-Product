@extends('layouts.main')

@section('title', 'Daftar nakes')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-0 text-gray-800">NAKES <br> <span style="font-size: 18px !important;">Tenaga Kesehatan</span></h1>
        <p>Halaman Penambahan Tenaga Kesehatan</p>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <hr>
    <div class="row">
        <div class="add-admin col-xl-4 col-md-6">
            @can('create', \App\Models\Criteria::class)
                <a href="{{ route('employees.create') }}">
                    <button type="button" class="btn btn-primary my-4">
                        <i class="fa-solid fa-pencil"></i>
                        <span class="ps-2 fw-bolder"> Tambah nakes</span>
                    </button>
                </a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="tabel-adm col-xl-12 col-md-12 mx-auto">
            <h4 class="pt-4 pb-3">Daftar nakes</h4>
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

            <div class="table-responsive w-auto">
                <table id="employeesTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nomer Telepon</th>
                            <th scope="col">Alamat</th>
                            @can('update', \App\Models\User::class)
                                <th scope="col">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone_number }}</td>
                                <td>{{ $employee->address }}</td>
                                @can('update', $employee)
                                    <td class="d-flex">
                                        <a href="{{ route('employees.edit', $employee->uuid) }}"><button type="button"
                                                class="edit-btn rounded-3 ms-2 my-1"><i
                                                    class="fa-solid fa-pen-to-square"></i></button></a>
                                        <form action="{{ route('employees.destroy', $employee->uuid) }}" method="POST">
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
            // Initialize DataTables
            $('#employeesTable').DataTable({
                scrollY: '100vh',
                scrollCollapse: true,
                paging: false
            });


            if ($('.success').length) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Perubahan Tersimpan",
                    showConfirmButton: false,
                    timer: 1500
                });
            }

            // Delete button click event
            $('.delete-btn').click(function(event) {
                event.preventDefault(); // Prevent the default form submission

                const form = $(this).closest('form'); // Find the closest form to submit

                Swal.fire({
                    text: "Apakah anda ingin menghapus data?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    dangerMode: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form
                        Swal.fire({
                            title: "Good job!",
                            text: "Data Berhasil Di Hapus",
                            icon: "info"
                        });
                    }
                });
            });
        });
    </script>

@endsection
