@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{asset('canvas/demos/forum/forum.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('canvas/demos/forum/css/fonts.css')}}" type="text/css"/>

@endpush
@section('content')
    <div class="content-wrap">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-xl-12 col-lg-12">
                    <h4 class="display-3 fw-bolder">Statistik Prevalensi Stunting</h6>
                </div>
            </div>
          <div class="row">
                <div class="col-md-6">
                    <canvas id="prevalensi"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="timbang"></canvas>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script>
           $(document).ready(function () {
               const ctx = document.getElementById('prevalensi');
            new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'line',
                data: {
                    labels: ['2018', '2019', '2021', '2022', '2023','2024'],
                    datasets: [{
                        label: 'Prevalensi Stunting Kabupaten Situbondo Tahun 2018 - 2024',
                        data: [30.66, 26.74, 23.7, 30.09, 4.1, 10.6],
                        borderWidth: 1,
                        borderColor: 'rgba(201,50,133,0.86)',
                        backgroundColor: '#25eae7',
                    }],
                },

                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            min: 0,
                            max: 35,
                        }
                    }
                }
            });
            const tmb = document.getElementById('timbang');
            new Chart(tmb, {
                plugins: [ChartDataLabels],
                type: 'line',
                data: {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: [{
                        label: 'Prevalensi Stunting berdasarkan Aksi Serentak Tahun 2024',
                        data: ['6.4','6.1','6.4','6.7','6','5.9','5.4','5.1','5.3','5.65','5.38','5.1'],
                        borderWidth: 1,
                        borderColor: 'rgb(224, 17, 95)',
                        backgroundColor: '#50C878',
                    }],
                },

                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            min: 0,
                            max:10,
                          
                        }
                    }
                }
            });
        });
    </script>
@endpush