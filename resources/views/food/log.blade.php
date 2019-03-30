@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Log</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="food-log-table">
                        <ul class="food-log-table-ul">
                            <li class="food-log-table-header">
                                <span>{{ date('l') . " " . date("Y/m/d") }}</span>
                            </li>

                            <li class="food-log-table-dropdown" id="breakfast">
                                    <span>Breakfast</span>
                                    <div class="food-log-table-dropdown-submenu" id="breakfast-sub">
                                    <ul>
                                        <li>
                                        <a href="#">breakfast1</a>
                                        </li>
                                        <li>
                                        <a href="#">breakfast2</a>
                                        </li>                
                                    </ul>
                                    </div>
                            </li>     
                            
                            <li class="food-log-table-dropdown" id="lunch">
                                    <span>Lunch</span>
                                    <div class="food-log-table-dropdown-submenu" id="lunch-sub">
                                    <ul>
                                        <li>
                                        <a href="#">lunch1</a>
                                        </li>
                                        <li>
                                        <a href="#">lunch2</a>
                                        </li>                
                                    </ul>
                                    </div>
                            </li>           

                            <li class="food-log-table-dropdown" id="dinner">
                                    <span>Dinner</span>
                                    <div class="food-log-table-dropdown-submenu" id="dinner-sub">
                                    <ul>
                                        <li>
                                        <a href="#">dinner1</a>
                                        </li>
                                        <li>
                                        <a href="#">dinner2</a>
                                        </li>                
                                    </ul>
                                    </div>
                            </li>   
                            
                            <li class="food-log-table-dropdown" id="other">
                                    <span>Other</span>
                                    <div class="food-log-table-dropdown-submenu" id="other-sub">
                                    <ul>
                                        <li>
                                        <a href="#">other1</a>
                                        </li>
                                        <li>
                                        <a href="#">other2</a>
                                        </li>                
                                    </ul>
                                    </div>
                            </li>  

                            <li class="food-log-table-dropdown" id="snack">
                                    <span>Snack</span>
                                    <div class="food-log-table-dropdown-submenu" id="snack-sub">
                                        <pre><img src="{{($nutrition != null) ? ($nutrition[0]->image) : ('#')}}"/>
                                        </pre>
                                    
                                    </div>
                            </li>  
                        </ul>
                    </div>


                    <script>                          
                
                        $("#breakfast").click(function() {
                            $("#breakfast-sub").slideToggle();            
                        });
                        $("#lunch").click(function() {
                            $("#lunch-sub").slideToggle();            
                        });
                        $("#dinner").click(function() {
                            $("#dinner-sub").slideToggle();            
                        });
                        $("#other").click(function() {
                            $("#other-sub").slideToggle();            
                        });
                        $("#snack").click(function() {
                            $("#snack-sub").slideToggle();            
                        });

                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
