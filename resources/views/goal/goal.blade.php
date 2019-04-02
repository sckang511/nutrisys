@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="text-left" style="margin-top: 20px;">
                <div class="page-header">
                <h1>DAILY GOAL</h1>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h4 class="display-4">Set Daily Goals</h4><br>
                            <div class="lead">
                                <form class="form-group" action = "{{ route('store') }}" method = "POST">
                                    {{ csrf_field() }}
                                    <div class="row form-group">
                                        <label class="control-label">Select Preference</label><br>
                                        <select class="form-control input-lg" name="preference">
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
                                        <label class="control-label">Select Goal:</label><br>
                                        <select class="form-control input-lg" name="goal_type">
                                            <option value="Daily">Daily</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Qurterly">Qurterly</option>
                                        </select>
                                    </div>
                                    <div class="row form-group">
                                        <label class="control-label">Prefered Value:</label><br>
                                        <input class="form-control input-lg" type="number" name="the_value" required>
                                    </div>
                                    <div class="row form-group"><br>                       
                                        <button type="submit" class="btn btn-success btn-lg" style="padding: 7px 10px;"><i class="fa fa-floppy-o"></i>&emsp;Set Goal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                @include('message/message')
                            </div>
                        </div>
                    </div>
                </div><br><br>
            </div>
        </div>
    </div>
</div>
@endsection
