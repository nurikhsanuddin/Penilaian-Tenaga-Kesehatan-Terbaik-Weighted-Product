@extends('layouts.main')

@section('title', 'Daftar Penilaian')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
  <h1 class="h3 mb-0 text-gray-800">Penilaian <br></h1>
  <p>Halaman Penilaian</p>
  <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<hr>

<div class="row my-4">
  @can('create', \App\Models\Criteria::class)
  <div class="col-xl-4 col-md-6">
    <a href="{{ route('assessments.create') }}">
      <button type="button" class="btn btn-primary">
        <i class="fa-solid fa-pencil"></i>
        <span class="ps-2 fw-bolder">Tambah Penilaian</span>
      </button>
    </a>
  </div>
  @endcan
  <div class="col-xl-4 col-md-6">
    <a href="{{ route('assessments.bestEmployee', ['month' => request()->input('month'), 'year' => request()->input('year')]) }}">
      <button type="button" class="btn btn-success">
        <span class="ps-2 fw-bolder">Lihat Nakes Terbaik</span>
      </button>
    </a>
  </div>
</div>

<form action="{{ route('assessments.index') }}" method="GET">
  <div class="row">
    <div class="col-lg-4">
      <select class="form-select" name="month">
        @foreach (range(1, 12) as $month)
        <option value="{{ $month }}" @if ($month==request('month', date('n'))) selected @endif>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-lg-4">
      <div class="input-group">
        <select class="form-select" name="year">
          @foreach (range(date('Y'), 2020) as $year)
          <option value="{{ $year }}" @if ($year==request('year', date('Y'))) selected @endif>{{ $year }}</option>
          @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Cari</button>
      </div>
    </div>
  </div>
</form>

<div class="row">
  <div class="tabel-adm col-xl-12 col-md-12 mx-auto">
    <h4 class="pt-4 pb-3">Daftar Penilaian</h4>

    @if (session('success'))
    <div class="modal fade success" id="modal-success" tabindex="-1" aria-labelledby="modal-successLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-successLabel">Informasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

    @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
    @endif

    <div class="table-responsive w-auto my-5">
      <table id="assessmentsTable" class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama nakes</th>
            <th scope="col">Nilai</th>
            @can('update', \App\Models\Assessment::class)
            <th scope="col">Action</th>
            @endcan
          </tr>
        </thead>
        <tbody class="align-middle">
          @foreach($groupedAssessments as $uuid => $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              @php
              $assessment = $data->first();
              @endphp
              {{ $assessment->employee->name }}
            </td>
            <td>
              <ul>
                @foreach ($data as $assessment)
                <li>{{ $assessment->criteria->name }} = {{ $assessment->value }}</li>
                @endforeach
              </ul>
            </td>
            @can('update', $assessment)
            <td class="d-flex">
              <a href="{{ route('assessments.edit', $uuid) }}"><button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button></a>
              <form action="{{ route('assessments.destroy', $uuid) }}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return false" class="delete-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-trash-can"></i></button>
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
    // Initialize DataTables with scrolling
    $('#assessmentsTable').DataTable({
      scrollY: '150vh',
      scrollCollapse: true,
      paging: false
    });

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