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
                        <th scope="col" class="text-info text-uppercase">Daily Total</th>
                        <th scope="col" class="text-info text-uppercase">Daily Goal</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($goals) > 0)
                        @foreach ($goals as $data)
                            <tr>
                            <th scope="row">{{ $data->nutrition_type}}</th>
                            <td><progress value="{{ $data->value}}" max="{{ $data->value}}"></progress>&emsp;&emsp;{{ (($data->value)/($data->value) * 100)}}%</td>
                            <td>{{ $data->value}}g</td>
                            <td>{{ $data->value}}g</td>
                            </tr>
                        @endforeach
                        @else
                        <div class="col-md-4"><h1 class="text-danger">No data found</h1></div>
                        @endif
                    </tbody>
                </table>
            </div><br><br>
        </div>   
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="text-left text-success">Weekly Goal</h3>
            <hr style="width: 40%;">
            <div id="curve_chart" style="width: 700px; height: 400px"></div>
        </div>
    </div><br><br><br>
</div>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
      ]);

      var options = {
        title: 'Weekly Goal',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
  </script>
@endsection
