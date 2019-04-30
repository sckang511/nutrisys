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
                    <h1>FOOD LOG</h1>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-11">
                            <table>
                                <tr>
                                    <td style="padding-top: 15px;">
                                        <button type="submit" class="btn btn-success" id="go" style="margin-left: 10px;">Go</button>&emsp;
                                        <input type="date" class="datepicker" id="datepicker">&emsp;<i style="font-size: 30px" class="fa fa-calendar text-success" aria-hidden="true"></i>
                                    </td>
                                </tr>
                            </table><br>

                            <div class="food-log-table" id="log-content">
                                    <ul class="food-log-table-ul">
                                        <li class="food-log-table-header">
                                            <span id="date-log">{{ $results['Date'] }}</span>
                                        </li>
                                        <li class="food-log-table-dropdown" id="breakfast">
                                            <span>Breakfast</span> 
                                            <span class="badge badge-pill" style="float: right; padding: 5px 15px; font-size: 20px">{{sizeof($results['Breakfast'])}}</span>
                                            @if (!empty($results['Breakfast']))
                                                <div class="food-log-table-dropdown-submenu shadow-lg p-3 mb-5 bg-white rounded" id="breakfast-sub">
                                                    <ul>

                                                        @foreach ($results['Breakfast'] as $breakfast)
                                                            <pre style="overflow-x: hidden;">
                                                                <img src={{$breakfast['item_image']}} width="150" height="150" style="float:left; padding: 10px; box-shadow: 3px 3px 1px grey;">
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Food Name: {{$breakfast['item_name']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Serving qty: {{$breakfast['serving_qty']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Serving Unit: {{$breakfast['serving_unit']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Carbohydrates: {{$breakfast['carbohydrate']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Calories: {{$breakfast['calorie']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Protein: {{$breakfast['protein']}}</span>
                                                                <?php $info = json_encode($breakfast); ?>
                                                                <button type="button" class="btn btn-success" style="float:left;" onclick='viewDetails(<?php echo $info; ?>)'>View Details</button>
                                                            </pre>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            @endif
                                        </li>    
                                        <li class="food-log-table-dropdown" id="lunch">
                                            <span>Lunch</span>
                                            <span class="badge badge-pill" style="float: right; padding: 5px 15px; font-size: 20px">{{sizeof($results['Lunch'])}}</span>
                                            @if (!empty($results['Lunch']))
                                                <div class="food-log-table-dropdown-submenu shadow-lg p-3 mb-5 bg-white rounded" id="lunch-sub">
                                                    <ul>

                                                        @foreach ($results['Lunch'] as $lunch)
                                                            <pre style="overflow-x: hidden;">
                                                                <img src={{$lunch['item_image']}} width="150" height="150" style="float:left; padding: 10px; box-shadow: 3px 3px 1px grey;">
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Food Name: {{$lunch['item_name']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Serving Qty: {{$lunch['serving_qty']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Serving Unit: {{$lunch['serving_unit']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Carbohydrates: {{$lunch['carbohydrate']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Calories: {{$lunch['calorie']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Protein: {{$lunch['protein']}}</span>
                                                                <?php $info = json_encode($lunch); ?>
                                                                <button type="button" class="btn btn-success" style="float:left;" onclick='viewDetails(<?php echo $info; ?>)'>View Details</button>
                                                            </pre>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </li>
                                        <li class="food-log-table-dropdown" id="dinner">
                                            <span>Dinner   </span>
                                            <span class="badge badge-pill" style="float: right; padding: 5px 15px; font-size: 20px">{{sizeof($results['Dinner'])}}</span>
                                            @if (!empty($results['Dinner']))
                                                <div class="food-log-table-dropdown-submenu shadow-lg p-3 mb-5 bg-white rounded" id="dinner-sub">
                                                    <ul>

                                                        @foreach ($results['Dinner'] as $dinner)
                                                            <pre style="overflow-x: hidden;">
                                                                <img src={{$dinner['item_image']}} width="150" height="150" style="float:left; padding: 10px; box-shadow: 3px 3px 1px grey;">
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Item name: {{$dinner['item_name']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Serving Qty: {{$dinner['serving_qty']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Serving Unit: {{$dinner['serving_unit']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Carbohydrates: {{$dinner['carbohydrate']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Calories: {{$dinner['calorie']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Protein: {{$dinner['protein']}}</span>
                                                                <?php $info = json_encode($dinner); ?>
                                                                <button type="button" class="btn btn-success" style="float:left;" onclick='viewDetails(<?php echo $info; ?>)'>View Details</button>
                                                            </pre>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </li>
                                        <li class="food-log-table-dropdown" id="other">
                                             <span>Other</span>
                                            <span class="badge badge-pill" style="float: right; padding: 5px 15px; font-size: 20px">{{sizeof($results['Other'])}}</span>
                                            @if (!empty($results['Other']))
                                                <div class="food-log-table-dropdown-submenu shadow-lg p-3 mb-5 bg-white rounded" id="other-sub">
                                                    <ul>

                                                        @foreach ($results['Other'] as $other)
                                                            <pre style="overflow-x: hidden;">
                                                                <img src={{$other['item_image']}} width="150" height="150" style="float:left; padding: 10px; box-shadow: 3px 3px 1px grey;">
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Food Name:&emsp;&emsp;&emsp;&emsp; {{ strtoupper($other['item_name']) }}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Serving Qty:&emsp;&emsp; {{$other['serving_qty']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Serving Unit:&emsp; {{$other['serving_unit']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Carbohydrates: {{$other['carbohydrate']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Calories:&emsp;&emsp;&emsp;&emsp;&emsp; {{$other['calorie']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Protein:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; {{$other['protein']}}</span>
                                                                <?php $info = json_encode($other); ?>
                                                                <button type="button" class="btn btn-success" style="float:left;" onclick='viewDetails(<?php echo $info; ?>)'>View Details</button>
                                                            </pre>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </li>
                                        <li class="food-log-table-dropdown" id="snack">
                                            <span>Snack   </span>
                                            <span class="badge badge-pill" style="float: right; padding: 5px 15px; font-size: 20px">{{ sizeof($results['Snack']) }}</span>
                                            @if (!empty($results['Snack']))
                                                <div class="food-log-table-dropdown-submenu shadow-lg p-3 mb-5 bg-white rounded" id="snack-sub">
                                                    <ul>

                                                        @foreach ($results['Snack'] as $snack)
                                                            <pre style="overflow-x: hidden;">
                                                                <img src={{$snack['item_image']}} width="150" height="150" style="float:left; padding: 10px; box-shadow: 3px 3px 1px grey;">
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Item name: {{$snack['item_name']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Serving qty: {{$snack['serving_qty']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Serving unit: {{$snack['serving_unit']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Carbohydrates: {{$snack['carbohydrate']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Calories: {{$snack['calorie']}}</span>
                                                                <span style="float: left; padding-left: 20px; font-size: 12px;">Protein: {{$snack['protein']}}</span>
                                                                <?php $info = json_encode($snack); ?>
                                                                <button type="button" class="btn btn-success" style="float:left;" onclick='viewDetails(<?php echo $info; ?>)'>View Details</button>
                                                            </pre>
                                                        @endforeach 
                                                    </ul>
                                                </div>
                                            @endif
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
                                        $("#breakfast").click();
                                        $("#lunch").click();
                                        $("#dinner").click();
                                        $("#other").click();
                                        $("#snack").click();
                                    });

                                    $("document").ready(function($) {
                                            $('.datepicker').datepicker({
                                                dateFormat: "yy-mm-dd"
                                            });
                                    });

                                    $("#go").click(function() {
                                        var date = document.getElementById("datepicker").value;
                                        var newDate = new Date(date);
                                        var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
                                        if (date != "") {
                                            document.getElementById("date-log").innerHTML = days[newDate.getDay()] + " " + date;
                                            window.location.href = `{{URL::to('food/log/show/${date}')}}`;
                                        }
                                    });
                                    
                                    function viewDetails(info) {
                                        var div = document.getElementById('log-content');
                                       // var json = JSON.stringify(info, null, 2);
                                       // alert(json);
                                       // console.log(json);
                                        var content = "<div >"+
                                                            "\n<div class='row'>" +
                                                                "\n<h4>&emsp;NUTRITION FACTS</h4><br>"+
                                                            "\n</div>" +
                                                            "\n<div class='row border shadow p-3 mb-5 bg-white rounded' style='pading: 0 20px; margin : 0 200px 0 0;'>" +
                                                                "\nFood Name:&emsp;&emsp;&emsp;&emsp;" + info["item_name"] + "<br>"+
                                                                "\nServing Qty:&emsp;&emsp;&emsp;&emsp;" + info["serving_qty"] + "<br>"+
                                                                "\nServing Unit:&emsp;&emsp;&emsp;" + info["serving_unit"] + "<br>"+
                                                                "\nCarbohydrate:&emsp;&emsp;&emsp;" + info["carbohydrate"] + "<br>"+
                                                                "\nSaturated Fat:&emsp;&emsp;&emsp;" + info["saturated_fat"] + "<br>"+
                                                                "\nDietry Fiber:&emsp;&emsp;&emsp;&emsp;" + info["dietary_fiber"] + "<br>"+
                                                                "\nTotal Fat:&emsp;&emsp;&emsp;&emsp;&emsp;" + info["total_fat"] + "<br>"+
                                                                "\nCholestrol:&emsp;&emsp;&emsp;&emsp;&emsp;" + info["cholesterol"] + "<br>"+
                                                                "\nCalorie:&emsp;&emsp;&emsp;&emsp;&emsp;" + info["calorie"] + "<br>"+
                                                                "\nSodium:&emsp;&emsp;&emsp;&emsp;&emsp;" + info["sodium"] + "<br>"+
                                                                "\nProtein:&emsp;&emsp;&emsp;&emsp;&emsp;" + info["protein"] + "<br>"+
                                                                "\nSugar:&emsp;&emsp;&emsp;&emsp;&emsp;" + info["sugar"] + "<br>"+
                                                            "\n</div>" +
                                                        "\n</div>";

                                        content += "<br><button style='margin-right:10px; background-color: deepSkyBlue;' class='btn btn-info' onclick='reload()'>Back</button>";
                                        //content += `<button class='btn btn-info' style='background-color: red' onclick='deleteItem(${json})'>Delete</button></pre>`
                                        div.innerHTML = content;
                                    }

                                    function deleteItem(info) {
                                        var isConfirmed = confirm("Are you sure you would like to delete the food item " + info.item_name + "?");
                                        if (isConfirmed) {
                                            window.location.href = `{{URL::to('food/log/')}}`;
                                        }
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
    </div><br>
</div>
@endsection

