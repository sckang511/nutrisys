@extends('layouts.app')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="text-left">
                <div class="page-header">
                <h1>DAILY GOAL</h1>
                </div><br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" class="text-info text-uppercase">Nutrition Facts</th>
                        <th scope="col" class="text-info text-uppercase">Current Progress</th>
                        <th scope="col" class="text-info text-uppercase">Daily Serving</th>
                        <th scope="col" class="text-info text-uppercase">Daily Goal</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($goals) > 0)
                        @foreach ($goals as $data)
                            <tr>
                            <th scope="row">{{ $data->nutrition_type}}</th>
                            <td><progress value="{{ $data->value}}" max="3000"></progress>&emsp;&emsp;{{ number_format(((($data->value)/3000) * 100), 0, '.','')}}%</td>
                            <td>{{ $data->value}}g</td>
                            <td>3000g</td>
                            </tr>
                        @endforeach
                        @else
                        <div class="col-md-4"><h1 class="text-danger">No data found</h1></div>
                        @endif
                    </tbody>
                </table><br>
            </div>   
        </div>
    </div>
    <div class="row ">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-left text-success">Weekly Goal Progress</h2>
            <hr style="width: 40%;">
            <div  class="jumbotron" id="curve_chart" style="width: 700px; height: 400px"></div>
        </div>
    </div><br>
</div>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Days', 'Daily', 'Total'],
        ['Monday',  1000,      400],
        ['Tuesday',  1170,      3000],
        ['Wednsday',  660,       1500],
        ['Thursday',  1030,      200],
        ['Friday',  130,      700]
      ]);

      var options = {
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
  </script>
@endsection
