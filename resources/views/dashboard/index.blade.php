@extends('dashboard.master')

@section('dashActive')
    active
@endsection
@section('content')

    <div class="row">
        <div class="card text-white bg-primary mb-3" style="min-width: 14rem;margin-right: 5rem">
            <div class="card-header">Registered Users</div>
            <div class="card-body">
                <h1 class="card-title">{{$users}}</h1>
            </div>
        </div>
        <div class="card text-white bg-dark mb-3" style="min-width: 14rem;margin-right: 5rem">
            <div class="card-header">Posts</div>
            <div class="card-body">
                <h1 class="card-title">{{$posts}}</h1>
            </div>
        </div>
        <div class="card text-white bg-success mb-3" style="min-width: 14rem;margin-right: 5rem">
            <div class="card-header">Answered consultations </div>
            <div class="card-body">
                <h1 class="card-title">{{$cons}}</h1>
            </div>
        </div>
        <div class="card text-white bg-danger mb-3" style="min-width: 14rem;margin-right: 5rem">
            <div class="card-header">Unanswered consultations</div>
            <div class="card-body">
                <h1 class="card-title">{{$ucons }}</h1>
            </div>
        </div>
    </div>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["User", "Posts", "Answered Qustions", "unanswerd qustions"],
                datasets: [{
                    data: [{{$users}}, {{$posts}}, {{$cons}}, {{$ucons}}],
                    lineTension: 0,
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script>
@endsection
<!-- Graphs -->
