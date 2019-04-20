@extends('layouts.app')

@section('content')
<div class="container shadow-sm p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-md-10">
            <div class="text-left" style="margin-top: 20px;">
                <div class="page-header text-info">
                    <h1>Welcome to NutriSys!</h1>
                    <h5>We deliver a proven program and you'll learn how to eat healthier to help keep yourself healthy.</h5>
                </div><br>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        {{-- @if(count($recommend) > 0)
                            <h4 class="text-left text-success">Recommended daily intake of {{ $recommend[1]->nutrition_type }}: {{ $recommend[2]->value - $recommend[2]->protein }}{{ $recommend[3]->serving_unit }}.</h4>
                        @endif<br> --}}
                        <div class="col">
                            <div class="float-left"> 
                                <img src="images/background/fruit_round.jpg" class="rounded-circle float-left shadow p-3 mb-5" alt="fruit" height="200" width="200">
                            </div>
                            <div class="float-right border-left" style="padding-left: 10px;">
                                <h4>Tips for Everyday Health</h4>
                                <ul>
                                    <li>Nutritionally Balanced</li>
                                    <li>Nutritionally Balanced<</li>
                                    <li>Nutritionally Balanced<</li>
                                    <li>Nutritionally Balanced<</li>
                                    <li>Nutritionally Balanced<</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 float-right" style="padding: 0 0 50px 25px;">
                            <div class="calendar">
                                <div class="calendar__picture">
                                    <h2>18, Sunday</h2><h3>November</h3>
                                </div>
                                <div class="calendar__date">
                                    <div class="calendar__day">M</div>
                                    <div class="calendar__day">T</div>
                                    <div class="calendar__day">W</div>
                                    <div class="calendar__day">T</div>
                                    <div class="calendar__day">F</div>
                                    <div class="calendar__day">S</div>
                                    <div class="calendar__day">S</div>
                                    <div class="calendar__number"></div>
                                    <div class="calendar__number"></div>
                                    <div class="calendar__number"></div>
                                    <div class="calendar__number">1</div>
                                    <div class="calendar__number">2</div>
                                    <div class="calendar__number">3</div>
                                    <div class="calendar__number">4</div>
                                    <div class="calendar__number">5</div>
                                    <div class="calendar__number">6</div>
                                    <div class="calendar__number">7</div>
                                    <div class="calendar__number">8</div>
                                    <div class="calendar__number">9</div>
                                    <div class="calendar__number">10</div>
                                    <div class="calendar__number">11</div>
                                    <div class="calendar__number">12</div>
                                    <div class="calendar__number">13</div>
                                    <div class="calendar__number">14</div>
                                    <div class="calendar__number">15</div>
                                    <div class="calendar__number">16</div>
                                    <div class="calendar__number">17</div>
                                    <div class="calendar__number calendar__number--current">18</div>
                                    <div class="calendar__number">19</div>
                                    <div class="calendar__number">20</div>
                                    <div class="calendar__number">21</div>
                                    <div class="calendar__number">22</div>
                                    <div class="calendar__number">23</div>
                                    <div class="calendar__number">24</div>
                                    <div class="calendar__number">25</div>
                                    <div class="calendar__number">26</div>
                                    <div class="calendar__number">27</div>
                                    <div class="calendar__number">28</div>
                                    <div class="calendar__number">29</div>
                                    <div class="calendar__number">30</div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
