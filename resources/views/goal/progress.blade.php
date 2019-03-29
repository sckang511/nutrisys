@extends('layouts.app')

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
                            <td><progress value="{{ $data->daily_value}}" max="{{ $data->recomended_value}}"></progress>&emsp;&emsp;{{ (($data->daily_value)/($data->recomended_value) * 100)}}%</td>
                            <td>{{ $data->daily_value}}g</td>
                            <td>{{ $data->recomended_value}}g</td>
                            </tr>
                        @endforeach
                        @else
                        <div class="col-md-4"><h1 class="text-danger">No data found</h1></div>
                        @endif
                    </tbody>
                </table><br><br>
                <div class="container">
    
                <div class="row">
                </div>
                </div><br><br><br>
            </div>   
        </div>
    </div>
</div>
@endsection
