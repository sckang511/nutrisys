@extends('layouts.app')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@section('content')
<div class="container shadow-sm p-3 mb-5 bg-white rounded" style="background-color: white">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="text-left">
                <div class="page-header text-info">
                    <h1>DAILY / WEEKLY GOAL</h1>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="display-4">Set Nutrition Goal</h5><br>
                            <div class="lead">
                                <form class="form-group" action = "{{ route('store') }}" method = "POST">
                                    {{ csrf_field() }}
                                    <div class="row form-group">
                                        <label class="control-label"><h4>Select Preference:</h4></label>&emsp;
                                        <select class="form-control input-lg col-6" name="preference">
                                            <option value="Carbohydrate">Carbohydrate</option>
                                            <option value="Calories">Calories</option>
                                            <option value="Protein">Protein</option>
                                            <option value="Vitamin A">Vitamin A</option>
                                            <option value="Vitamin C">Vitamin C</option>
                                            <option value="Calcium">Calcium</option>
                                            <option value="Sodium">Sodium</option>
                                            <option value="Iron">Iron</option>
                                        </select>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label"><h4>Goal Type:</h4></label>&emsp;&emsp;&emsp;&emsp;
                                        <select class="form-control input-lg col-6" name="type">
                                            <option value="Daily">Daily</option>
                                            <option value="Weekly">Weekly</option>
                                        </select>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label"><h4>Prefered Value:</h4></label>&emsp;&emsp;
                                        <input class="form-control input-lg col-6" type="number" name="value">
                                    </div>
                                    <div class="row form-group"><br>                       
                                        <button type="submit" class="btn btn-success btn-lg" style="padding: 7px 10px;"><i class="fa fa-floppy-o"></i>&emsp;Set Goal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-7">
                        <h5>@include('message/message')</h5>
                    </div>
                </div><br>
            </div>   
        </div>
    </div>
</div>
@endsection
