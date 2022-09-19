@extends('layouts.template')
@section('sidemenu')
@include('layouts.sidemenu')
@endsection
@section('content')


<link rel="stylesheet" href="{{asset('css/ionicons.css')}}">
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="text-center">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg ">Berkas Masuk dengan Jenis Pelayanan</span>
                            </p>
                        </div>

                        <div class="position-relative mb-4">
                            <canvas id="pelayananChart" height="100"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            
                        </div>

                    </div>
                </div>



            </div>

            <!-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-body"> -->

<div class="col-lg-3 col-6">
    <div class="small-box bg-info">
        <div class="inner">
            <h3>{{App\Models\User::count()}}</h3>
            <p>Total User</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
    </div>
    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{App\Models\WajibPajak::count()}}</h3>
            <p>Total Document</p>
        </div>
        <div class="icon">
            <i class="ion ion-ios-list"></i>
        </div>
    </div>
</div>

                    <!-- </div>
                </div>

            </div> -->
        </div>

    </div>

</div>

</div>
<script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    var ctx = document.getElementById("pelayananChart").getContext('2d');
    var pelayananChart = new Chart(ctx, {
        type: 'horizontalBar',
        
        data: {
            labels: ['Objek Pajak Baru', 'Mutasi Habis','Mutasi Sebagian','Pembetulan'],
            datasets: [{
                label: '',
                data: [{{$objekPajakBaru}}, {{$mutasiHabis}}, {{$mutasiSebagian}}, {{$pembetulan}}],
                fill: false,
                backgroundColor: [
                    'gray',
                    'red',
                    'yellow',
                    'green',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontFamily: "Verdana",
                    }
                }],
                yAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero: true,
                        fontFamily: "Verdana",
                    }
                }]
            }
        }
        
    });
</script>
@endsection