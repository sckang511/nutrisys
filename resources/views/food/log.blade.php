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

                            <li class="food-log-table-dropdown">
                                    <span>Breakfast</span>
                                    <div class="food-log-table-dropdown-submenu">
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
                            
                            <li class="food-log-table-dropdown">
                                    <span>Lunch</span>
                                    <div class="food-log-table-dropdown-submenu">
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

                            <li class="food-log-table-dropdown">
                                    <span>Dinner</span>
                                    <div class="food-log-table-dropdown-submenu">
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
                            
                            <li class="food-log-table-dropdown">
                                    <span>Other</span>
                                    <div class="food-log-table-dropdown-submenu">
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

                            <li class="food-log-table-dropdown">
                                    <span>Snack</span>
                                    <div class="food-log-table-dropdown-submenu">
                                    <ul>
                                        <li>
                                        <a href="#">snack1</a>
                                        </li>
                                        <li>
                                        <a href="#">snack2</a>
                                        </li>                
                                    </ul>
                                    </div>
                            </li>  
                        </ul>
                    </div>


                    <script>
                    
                    

                        $(".food-log-table-dropdown").click(function() {
                            $(".food-log-table-dropdown-submenu").slideToggle();            
                        })




                    </script>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
