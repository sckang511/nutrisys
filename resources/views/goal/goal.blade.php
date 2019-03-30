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
                        <div class="col-md-8">
                            <h4 class="display-4">Set Daily Goals</h4><br>
                            <div class="lead">
                                <form action = "{{ route('store') }}" method = "POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="control-label">Daily Preference</label>
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
                                            <div class="form-group">
                                                <label class="control-label">Goal Type:</label>
                                                <select class="form-control input-lg" name="goal_type">
                                                    <option value="Carbohydrate">Daily</option>
                                                    <option value="Calories">Weekly</option>
                                                    <option value="Protein">Quarterly</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Goal Value:</label>
                                                <input class="form-control input-lg" type="number" name="the_value" required>
                                            </div>
                                            <div class="form-group">                        
                                                <button type="submit" class="btn btn-success btn-lg mb-2" style="padding: 7px 10px;"><i class="fa fa-floppy-o"></i>&emsp;Set Goal</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><br>
                    </div>
                </div><br><br>
            </div>
        </div>
    </div>
</div>
@endsection
