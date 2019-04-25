@extends('layouts.app')

@section('content')
<div class="container shadow-sm p-3 mb-5 bg-white rounded" style="background-color: white">
    <div class="row">
        <div class="col-md-10">
            <div class="text-left" style="margin-top: 20px;">
                <div class="page-header text-info">
                    <h1>FOOD LOG</h1>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="food-log-table" id="log-content">
                                    <ul class="food-log-table-ul">
                                        <li class="food-log-table-header">
                                            <span>{{ date('l') . " " . date("Y/m/d") }}</span>
                                        </li>
                                        <li class="food-log-table-dropdown" id="breakfast">
                                                <span>Breakfast</span>
                                                <div class="food-log-table-dropdown-submenu" id="breakfast-sub">
                                                <ul>
                                                    @if (!empty($results['Breakfast']))
                                                        @foreach ($results['Breakfast'] as $breakfast)
                                                            <pre>
                                                                <img src={{$breakfast['item_image']}} width="150" height="150" style="float:left;">
                                                                <span style="float:left;">Item name: {{$breakfast['item_name']}}</span>
                                                                <span style="float:left;">Serving qty: {{$breakfast['serving_qty']}}</span>
                                                                <span style="float:left;">Serving unit: {{$breakfast['serving_unit']}}</span>
                                                                <span style="float:left;">Calories: {{$breakfast['calorie']}}</span>
                                                                <span style="float:left;">Carbohydrates: {{$breakfast['carbohydrate']}}</span>
                                                                <span style="float:left;">Protein: {{$breakfast['protein']}}</span>
                                                                <?php $info = json_encode($breakfast); ?>
                                                                <button type="button" class="btn btn-info" style="float:left;" onclick='viewDetails(<?php echo $info; ?>)'>View Details</button>
                                                            </pre>
                                                            
                                                        @endforeach
                                                    @endif
            
                                                </ul>
                                                </div>
                                        </li>     
                                        
                                        <li class="food-log-table-dropdown" id="lunch">
                                                <span>Lunch</span>
                                                <div class="food-log-table-dropdown-submenu" id="lunch-sub">
                                                <ul>
                                                    @if (!empty($results['Lunch']))
                                                        @foreach ($results['Lunch'] as $lunch)
                                                            <pre>
                                                                <img src={{$lunch['item_image']}} width="150" height="150" style="float:left;">
                                                                <span style="float:left;">Item name: {{$lunch['item_name']}}</span>
                                                                <span style="float:left;">Serving qty: {{$lunch['serving_qty']}}</span>
                                                                <span style="float:left;">Serving unit: {{$lunch['serving_unit']}}</span>
                                                                <span style="float:left;">Calories: {{$lunch['calorie']}}</span>
                                                                <span style="float:left;">Carbohydrates: {{$lunch['carbohydrate']}}</span>
                                                                <span style="float:left;">Protein: {{$lunch['protein']}}</span>
                                                                <?php $info = json_encode($lunch); ?>
                                                                <button type="button" class="btn btn-info" style="float:left;" onclick='viewDetails(<?php echo $info; ?>)'>View Details</button>
                                                           
                                                            </pre>
                                                            
                                                        @endforeach
                                                    @endif
                                                </ul>
                                                </div>
                                        </li>           
            
                                        <li class="food-log-table-dropdown" id="dinner">
                                                <span>Dinner</span>
                                                <div class="food-log-table-dropdown-submenu" id="dinner-sub">
                                                <ul>
                                                    @if (!empty($results['Dinner']))
                                                        @foreach ($results['Dinner'] as $dinner)
                                                            <pre>
                                                                <img src={{$dinner['item_image']}} width="150" height="150" style="float:left;">
                                                                <span style="float:left;">Item name: {{$dinner['item_name']}}</span>
                                                                <span style="float:left;">Serving qty: {{$dinner['serving_qty']}}</span>
                                                                <span style="float:left;">Serving unit: {{$dinner['serving_unit']}}</span>
                                                                <span style="float:left;">Calories: {{$dinner['calorie']}}</span>
                                                                <span style="float:left;">Carbohydrates: {{$dinner['carbohydrate']}}</span>
                                                                <span style="float:left;">Protein: {{$dinner['protein']}}</span>
                                                                <?php $info = json_encode($dinner); ?>
                                                                <button type="button" class="btn btn-info" style="float:left;" onclick='viewDetails(<?php echo $info; ?>)'>View Details</button>
                                                           
                                                            </pre>
                                                            
                                                        @endforeach
                                                    @endif
            
                                                </ul>
                                                </div>
                                        </li>   
                                        
                                        <li class="food-log-table-dropdown" id="other">
                                                <span>Other</span>
                                                <div class="food-log-table-dropdown-submenu" id="other-sub">
                                                <ul>
                                                    @if (!empty($results['Other']))
                                                        @foreach ($results['Other'] as $other)
                                                            <pre>
                                                                <img src={{$other['item_image']}} width="150" height="150" style="float:left;">
                                                                <span style="float:left;">Item name: {{$other['item_name']}}</span>
                                                                <span style="float:left;">Serving qty: {{$other['serving_qty']}}</span>
                                                                <span style="float:left;">Serving unit: {{$other['serving_unit']}}</span>
                                                                <span style="float:left;">Calories: {{$other['calorie']}}</span>
                                                                <span style="float:left;">Carbohydrates: {{$other['carbohydrate']}}</span>
                                                                <span style="float:left;">Protein: {{$other['protein']}}</span>
                                                                <?php $info = json_encode($other); ?>
                                                                <button type="button" class="btn btn-info" style="float:left;" onclick='viewDetails(<?php echo $info; ?>)'>View Details</button>
                                                           
                                                            </pre>
                                                            
                                                        @endforeach
                                                    @endif
                                                </ul>
                                                </div>
                                        </li>  
            
                                        <li class="food-log-table-dropdown" id="snack">
                                                <span>Snack</span>
                                                <div class="food-log-table-dropdown-submenu" id="snack-sub">
                                                <ul>
                                                    @if (!empty($results['Snack']))
                                                        @foreach ($results['Snack'] as $snack)
                                                            <pre>
                                                                <img src={{$snack['item_image']}} width="150" height="150" style="float:left;">
                                                                <span style="float:left;">Item name: {{$snack['item_name']}}</span>
                                                                <span style="float:left;">Serving qty: {{$snack['serving_qty']}}</span>
                                                                <span style="float:left;">Serving unit: {{$snack['serving_unit']}}</span>
                                                                <span style="float:left;">Calories: {{$snack['calorie']}}</span>
                                                                <span style="float:left;">Carbohydrates: {{$snack['carbohydrate']}}</span>
                                                                <span style="float:left;">Protein: {{$snack['protein']}}</span>
                                                                <?php $info = json_encode($snack); ?>
                                                                <button type="button" class="btn btn-info" style="float:left;" onclick='viewDetails(<?php echo $info; ?>)'>View Details</button>
                                                           
                                                            </pre>
                                                            
                                                        @endforeach
                                                    @endif
                                                </ul>
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
            
                                    $("document").ready(function() {
                                        //$("#breakfast").click();
                                        //$("#lunch").click();
                                        //$("#dinner").click();
                                        //$("#other").click();
                                        //$("#snack").click();
                                    });
            
                                    function viewDetails(info) {
                                        var div = document.getElementById('log-content');
                                        var content = "<pre>" + JSON.stringify(info, null, 2);
                                        content += "<br><button class='btn btn-info' onclick='reload()'>Back</button></pre>";
                                        div.innerHTML = content;
                                    }
            
                                    function reload() {
                                        location.reload();
                                    }
            
                                </script>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <h5>@include('message/message')</h5>
                            </div>
                        </div>
                </div><br><br>
            </div>
        </div>
    </div>
</div>
@endsection
