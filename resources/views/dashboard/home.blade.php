@extends('layouts.app')
@section('content')
<div class="container shadow-sm p-3 mb-5 bg-white rounded" style="background-color: white">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="text-left">
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif 
                <div class="page-header text-info">
                    <h1>Welcome to NutriSys!</h1>
                    <h5>We deliver a proven program and you'll learn how to eat healthier to help keep yourself healthy.</h5>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            {{--  @if(count($recommend) > 0)
                                <h4 class="text-left text-success">Recommended daily intake of {{ $recommend[1]->nutrition_type }}: {{ $recommend[2]->value - $recommend[2]->protein }}{{ $recommend[3]->serving_unit }}.</h4>
                            @endif<br>  --}}
                            <div class="col-sm-7">
                                <div class="col">
                                    <div class="float-left"> 
                                        <img src="images/background/fruit_round.jpg" class="rounded-circle float-left shadow p-3 mb-5" alt="fruit" height="200" width="200">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 float-right border-left" style="padding: 0 0 50px 10px;">
                                <h4>Tips for Using Nutrisys Effectively</h4>
                                <ol>
                                    <li><a href="{{route('profile')}}">Fill out your profile!</a></li>
                                    <li><a href="{{route('search')}}">Keep an accurate record of what you eat!</a> </li>
                                    <li><a href="{{route('recipe')}}">Create your own recipe!</a></li>
                                    <li><a href="{{route('goal')}}">Set goals for yourself!</a></li>
                                    <li><a href="{{route('progress')}}">See the progress!</a></li>
                                    <li>Repeat!</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row border-top">
                            <div class="col-ms-10" style="padding: 0 0 50px 0;">
                                <form action="{{route('log')}}">
                                    <h1>What did I eat today? </h1> <button type="submit" class="btn btn-success btn-lg" onclick="">View Meals</button>
                                </form>
                            </div>
                        </div><br><br>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h5>@include('message/message')</h5>
        </div>
    </div><br>
</div>
@endsection

