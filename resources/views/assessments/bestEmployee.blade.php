@extends('layouts.main')

@section('title', 'Daftar Nakes Terbaik')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Nakes Terbaik <br></h1>
        <p>Halaman Penilaian</p>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <hr>

    <div class="row my-4">
        <div class="col-xl-4 col-md-6">
            <a href="{{ route('assessments.index') }}">
                <button type="button" class="btn back-btn me-3">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="tabel-adm col-xl-6 col-md-8 mx-auto">
            <h4 class="pt-4 pb-3">Hasil Perhitungan Nakes Terbaik</h4>

            <div class="table-responsive w-auto mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Nakes</th>
                            <th>Perhitungan Si</th>
                            <th>Perhitungan Vi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($resultsSi) && !empty($resultsVi))
                            @php
                                $maxVi = max(array_column($resultsVi, 'vi'));

                                $sortedResultsSi = collect($resultsSi)->sortByDesc(function ($resultSi) use (
                                    $resultsVi,
                                ) {
                                    $resultVi = collect($resultsVi)
                                        ->where('user_uuid', $resultSi['user_uuid'])
                                        ->first();
                                    return $resultVi['vi'];
                                });

                                $totalSi = $sortedResultsSi->sum('si');
                                $totalVi = collect($resultsVi)->sum('vi');
                            @endphp

                            @foreach ($sortedResultsSi as $resultSi)
                                @php
                                    $resultVi = collect($resultsVi)
                                        ->where('user_uuid', $resultSi['user_uuid'])
                                        ->first();
                                    $isMaxVi = $resultVi['vi'] == $maxVi;
                                @endphp

                                <tr class="{{ $isMaxVi ? 'table-primary' : '' }}">
                                    <td>{{ $resultVi['name'] }}</td>
                                    <td>{{ $resultSi['si'] }}</td>
                                    <td>{{ $resultVi['vi'] }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Total</td>
                                <td>{{ $totalSi }}</td>
                                <td>{{ $totalVi }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="3">Tidak ada data yang tersedia</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div id="container-chart-si" class="mb-4"></div>
        </div>
        <div class="col-md-6">
            <div id="container-chart-vi" class="mb-4"></div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        document.addEventListener('livewire:navigated', function() {
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
                    color: resultVi && resultVi.vi === maxVi ? '#ffcccb' :
                        null // Warna untuk nilai maksimum
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
@endsection
