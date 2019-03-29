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
                        <form class="form-horizontal" action = "{{ route('store') }}" method = "POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="control-label">Select Daily Preference</label>
                                <div class="col-md-4">
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
                                <div class="col-md-3">
                                <input class="form-control input-lg" type="number" name="the_value" required>
                                <input class="form-control input-lg" type="hidden" name="recommended" value="600" required>
                                </div>
                            </div>
                            <div class="form-group row"><br>
                                <div class="col-md-offset-4 col-md-4">                        
                                <button type="submit" class="btn btn-success btn-lg mb-2" style="padding: 7px 10px;"><i class="fa fa-floppy-o"></i>&emsp;Set Goal</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3 class="text-success">Daily Recom. Value:</h3>
                        @if(count($goals) > 0)
                            @foreach ($goals as $data)
                            <ul class="list-group border-warning border-top">
                                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                                    {{ $data->nutrition_type}}&emsp;<span class="badge badge-pill">&emsp;{{ $data->recomended_value}}g</span>
                                </li>
                            </ul>
                            @endforeach
                        @else
                            <div class="col-md-12"><h4 class="text-danger"><i class="fa fa-file-text"></i>&emsp;No data found</h4></div>
                        @endif
                    </div>
                    </div>
                </div><br><br>
            </div>
        </div>
    </div>
</div>
@endsection
