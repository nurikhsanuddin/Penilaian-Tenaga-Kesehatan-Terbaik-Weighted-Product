@extends('layouts.main')

@section('title', 'Dashboard')
@section('content')
<style>
  .card-info {
    background-color: #0093E9;
    background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);

  }
</style>
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <p>Halaman Dashboard</p>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Jumlah Nakes Card -->
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card card-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                Jumlah Nakes</div>
              <div class="h4 mb-0 font-weight-bold text-light fw-bold">{{$employees}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-light"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jumlah Kriteria Card -->
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card card-info  shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                Jumlah Kriteria</div>
              <div class="h4 mb-0 font-weight-bold text-light fw-bold">{{$criterias_total}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-list fa-2x text-light"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Chart Si dan Vi -->
    @if ($status == 'ada')
    <div class="row mt-4">
      <div class="col-md-12 text-center">

        <h3 class="mt-3 mb-3">Karyawan Terbaik Bulan Ini</h3>
      </div>
      <hr>
      <div class="col-md-6">
        <div id="container-chart-si" class="mb-4"></div>
      </div>
      <div class="col-md-6">
        <div id="container-chart-vi" class="mb-4"></div>
      </div>
    </div>
    @endif
  </div>
  @if ($status == 'kosong')
  <div class="row mx-2">
    <div class="badge bg-danger">
      <span>Tidak ada karyawan terbaik bulan ini</span>
    </div>
  </div>

  @endif
</div>
@endsection
@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>

@if ($status == 'ada')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const resultsSi = @json($resultsSi);
    const resultsVi = @json($resultsVi);
    const maxVi = @json($maxVi); // Mengambil nilai maxVi dari PHP

    // Pastikan resultsSi dan resultsVi adalah array
    if (!Array.isArray(resultsSi) || !Array.isArray(resultsVi)) {
      console.error('resultsSi atau resultsVi bukan array');
      return;
    }

    // Mengambil nama dan nilai Si
    const categories = resultsSi.map(result => {
      const resultVi = resultsVi.find(vi => vi.user_uuid === result.user_uuid);
      return resultVi ? resultVi.name : 'Unknown';
    });
    const dataSi = resultsSi.map(result => result.si);

    // Mengambil nilai Vi
    const dataVi = resultsSi.map(result => {
      const resultVi = resultsVi.find(vi => vi.user_uuid === result.user_uuid);
      return {
        y: resultVi ? resultVi.vi : 0,
        color: resultVi && resultVi.vi === maxVi ? '#4e3f92' : null // Warna untuk nilai maksimum
      };
    });

    // Chart untuk Si
    Highcharts.chart('container-chart-si', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Perhitungan Si'
      },
      xAxis: {
        categories: categories,
        title: {
          text: 'Nama nakes'
        }
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Nilai'
        }
      },
      series: [{
        name: 'Si',
        data: dataSi
      }]
    });

    // Chart untuk Vi
    Highcharts.chart('container-chart-vi', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Perhitungan Vi'
      },
      xAxis: {
        categories: categories,
        title: {
          text: 'Nama nakes'
        }
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Nilai'
        }
      },
      series: [{
        name: 'Vi',
        data: dataVi
      }]
    });
  });
</script>
@endif
@endsection