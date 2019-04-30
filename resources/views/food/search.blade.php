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
                    <h1>SEARCH FOOD</h1>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <form class="form-inline md-form form-sm active-cyan active-cyan-2 mt-2">
                                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search Your Food By Name" aria-label="Search" id="food_search">&emsp;
                                <i class="fas fa-search text-black" aria-hidden="true" style="font-size: 30px"></i>
                            </form>
                            <div style="margin-top: 30px; width: 720px;">
                                    <!-- Results --> 
                                    <form class='form-group' action = '{{ route('storeFood') }}' method = 'POST'> {{ csrf_field() }}
                                        <pre id="search_results" style="display: none; width: 93%; margin-left: 5px;">
                                        </pre>
                                </form>              
                                
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h5>@include('message/message')</h5>
        </div>
    </div><br>
</div>

<script>
    var request = "https://trackapi.nutritionix.com/v2/search/instant?query=";
    var textinput = document.getElementById('food_search');
    textinput.addEventListener('keyup', function() {
        var value = textinput.value;
        if (value == "") {
            document.getElementById("search_results").innerHTML = "";
            document.getElementById("search_results").style.display = "none";
            return;
        };
        $.ajax({
            url: request + value,
            type: 'GET',
            dataType: 'json',
            headers: {
                "x-app-id": "bbed59ef",
                "x-app-key": "c5e390e2bb4e9012ac02c93ffed211d9",
            },
            /*headers: {
                "x-app-id": "bbed59ef",
                "x-app-key": "c5e390e2bb4e9012ac02c93ffed211d9",
            },
            headers: {
                "x-app-id": "bbed59ef",
                "x-app-key": "c5e390e2bb4e9012ac02c93ffed211d9",
            },
            headers: {
                "x-app-id": "bbed59ef",
                "x-app-key": "c5e390e2bb4e9012ac02c93ffed211d9",
            },*/
            success: function (data) {
                var resultsdiv = document.getElementById("search_results");
                resultsdiv.style.display = "block";
                resultsdiv.innerHTML = "";
                var commonArray = data["common"];
                var brandedArray = data["branded"];
                if (commonArray != null) {
                    for (i = 0; i < commonArray.length; i++) {
                        console.log(commonArray[i]);
                        var div = makeCards(commonArray[i], "common");
                        resultsdiv.appendChild(div);                        
                    }
                }
                if (brandedArray != null) {
                    for (i = 0; i < brandedArray.length; i++) {
                        console.log(brandedArray[i]);
                        var div = makeCards(brandedArray[i], "branded");
                        resultsdiv.appendChild(div);                        
                    }
                }
 
                response = JSON.stringify(data, null, "  ");
                //document.getElementById("search_results").innerHTML = response;
                //console.log(data);
            },
            error: function (data) {
                $('#search_results').html(data);
            }
        });
    })
function makeCards(object, resultType) {
    var div = document.createElement('pre');
    div.className = "pre-food";
    div.innerHTML = "<img src='" + object["photo"]["thumb"] + "' width='100' height='100'><br>" +
                    "\nFood Name: &emsp;&emsp;&emsp;&emsp;" + object["food_name"] + 
                    "\nFood Locale: &emsp;&emsp;" + object["locale"] + 
                    "\nServing Unit: &emsp;" + object["serving_unit"] + 
                    "\nServing Qty: &emsp;&emsp;" + object["serving_qty"]+ 
                    "\nServing Weight: " + object["serving_weight_grams"] +"<br><br>";
                    if(resultType == "common"){
                        div.innerHTML = div.innerHTML + "<button type='button' class='btn btn-light' style='margin-left: 10px;margin-top: 10px' onClick='getCommonDetails(\"" + object["food_name"] + "\")'>View Common Details</button>";
                    } else {
                        div.innerHTML = div.innerHTML + "<button type='button' class='btn btn-black' style='margin-left: 10px;margin-top: 10px' onClick='getBrandedDetails(\"" + object["nix_item_id"] + "\")'>View Branded Details</button>";
                    }
                    
    return div;
}
function getCommonDetails(foodName){
// make the new api call
var commonRequest = "https://trackapi.nutritionix.com/v2/natural/nutrients/";
// retrieve results and send to viewNutritionDetails for display
$.ajax({
            url: commonRequest,
            type: 'POST',
            dataType: 'json',
            headers: {
                "x-app-id": "bbed59ef",
                "x-app-key": "c5e390e2bb4e9012ac02c93ffed211d9",
                "x-remote-user-id": "0",
            },
            data: {
                "query": foodName,
            },
            /*
            data: JSON.stringify({ "query": foodName }),
            headers: {
                "x-app-id": "bbed59ef",
                "x-app-key": "c5e390e2bb4e9012ac02c93ffed211d9",
            },
            headers: {
                "x-app-id": "bbed59ef",
                "x-app-key": "c5e390e2bb4e9012ac02c93ffed211d9",
            },
            headers: {
                "x-app-id": "bbed59ef",
                "x-app-key": "c5e390e2bb4e9012ac02c93ffed211d9",
            },*/
            success: function (data) {
                //alert(data);
                var resultsdiv = document.getElementById("search_results");
                resultsdiv.style.display = "block";
                resultsdiv.innerHTML = "";
                var nutritionArray = data["foods"];
                if (nutritionArray != null) {
                    //for (i = 0; i < nutritionArray.length; i++) {
                        console.log(nutritionArray);
                        var div = viewNutritionDetails(nutritionArray);
                      //  resultsdiv.appendChild(div);                        
                  //  }
                }
 
                response = JSON.stringify(data, null, "  ");
                //document.getElementById("search_results").innerHTML = response;
                //console.log(data);
            },
            error: function (data) {
                alert(JSON.stringify(data));
                $('#search_results').html(data);
            }
        });
    }
function getBrandedDetails(itemID) {
    //textinput.value = '';
    //alert("Branded");
    // make the new api call
var brandedRequest = "https://trackapi.nutritionix.com/v2/search/item?nix_item_id=";
// retrieve results and send to viewNutritionDetails for display
$.ajax({
            url: brandedRequest + itemID,
            type: 'GET',
            dataType: 'json',
            headers: {
                "x-app-id": "bbed59ef",
                "x-app-key": "c5e390e2bb4e9012ac02c93ffed211d9",
                "x-remote-user-id": "0",
            },
            success: function (data) {
                //alert(data);
                var resultsdiv = document.getElementById("search_results");
                resultsdiv.style.display = "block";
                resultsdiv.innerHTML = "";
                var nutritionArray = data["foods"];
                if (nutritionArray != null) {
                    //for (i = 0; i < nutritionArray.length; i++) {
                        console.log(nutritionArray);
                        var div = viewNutritionDetails(nutritionArray);
                      //  resultsdiv.appendChild(div);                        
                  //  }
                }
 
                response = JSON.stringify(data, null, "  ");
                //document.getElementById("search_results").innerHTML = response;
                //console.log(data);
            },
            error: function (data) {
                alert(JSON.stringify(data));
                $('#search_results').html(data);
            }
        });
}
function viewNutritionDetails(nutritionInfo) {
    var resultsdiv = document.getElementById("search_results");
    textinput.value = '';
    // echo "Common";
    //alert("Common Details - Food Name:" + foodName);
    //alert("Common Details");
    //alert("View Nutrition Details" + nutritionInfo);
   var div = document.createElement('pre');
    div.className = "pre-food";
    //div.innerHTML = "<h1>It worked</h1>";
    resultsdiv.innerHTML = '';
        var fiber = ((nutritionInfo[0]["nf_dietary_fiber"] != null) ? nutritionInfo[0]["nf_dietary_fiber"] : '0');
        var potassium = ((nutritionInfo[0]["nf_potassium"] != null) ? nutritionInfo[0]["nf_potassium"] : '0');
        var sugars = ((nutritionInfo[0]["nf_sugars"] != null) ? nutritionInfo[0]["nf_sugars"] : '0');
        var itemID = ((nutritionInfo[0]["nix_item_id"] != null) ? nutritionInfo[0]["nix_item_id"] : '');
        div.innerHTML = "<div>" +
                   //"\n<form class='form-group' action = '{{ route('storeFood') }}' method = 'POST'> {{ csrf_field() }}" +
                        "\n<table class='table table-striped table-hover'>" +
                            "\n<thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'><img src='" + nutritionInfo[0]["photo"]["thumb"] + "' width='100' height='100'></th>" +
                                    "\n<td></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Food Name:</th>" +
                                    "\n<td><input class='form-control' name='food_name' type='text' value='" + nutritionInfo[0]["food_name"] + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Serving Unit:</th>" +
                                    "\n<td><input class='form-control' name='serving_unit' type='text' value='" + nutritionInfo[0]["serving_unit"] + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Serving Qty:</th>" +
                                    "\n<td><input class='form-control' name='serving_qty' type='text'></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Calories:</th>" +
                                    "\n<td><input class='form-control' name='calories' type='text' value='" + nutritionInfo[0]["nf_calories"] + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Total Fat (g): </th>" +
                                    "\n<td><input class='form-control' name='total_fat' type='number' value='" + nutritionInfo[0]["nf_total_fat"] + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Saturated Fat (g):</th>" +
                                    "\n<td><input class='form-control' name='saturated_fat' type='number' value='" + nutritionInfo[0]["nf_saturated_fat"] + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Cholesterol (mg):</th>" +
                                    "\n<td><input class='form-control' name='cholesterol' type='number' value='" + nutritionInfo[0]["nf_cholesterol"] + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Sodium (mg):</th>" +
                                    "\n<td><input class='form-control' name='sodium' type='number' value='" + nutritionInfo[0]["nf_sodium"] + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Total Carbohydrate (g):</th>" +
                                    "\n<td><input class='form-control' name='total_carbohydrate' type='number' value='" + nutritionInfo[0]["nf_total_carbohydrate"] + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Dietary Fiber (g):</th>" +
                                    "\n<td><input class='form-control' name='dietary_fiber' type='number' value='" + fiber + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Sugars (g):</th>" +
                                    "\n<td><input class='form-control' name='sugars' type='number' value='" + sugars + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Protein (g):</th>" +
                                    "\n<td><input class='form-control' name='protein' type='number' value='" + nutritionInfo[0]["nf_protein"] + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Potassium (mg):</th>" +
                                    "\n<td><input class='form-control' name='potassium' type='number' value='" + potassium + "' readonly></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n <thead>" +
                                "\n<tr>" +
                                    "\n<th class='font-weight-normal text-dark' scope='col'>Meal:</th>" +
                                    "\n<td><select class='form-control input-lg' name='consumable_type'>" +
                                    "\n<option value=''>Select Type</option>" +  
                                    "\n<option value='Breakfast'>Breakfast</option>" +
                                    "\n<option value='Lunch'>Lunch</option>" +
                                    "\n<option value='Dinner'>Dinner</option>" +
                                    "\n<option value='Snack'>Snack</option>" +
                                    "\n<option value='Other'>Other</option>" +
                                    "\n</select></td>" +
                                "\n</tr>" +
                            "\n</thead>" +
                            "\n</tbody>" +
                            "\n</table>" +
                            "\n<input class='form-control' name='item_id' type='hidden' value='" + itemID + "'>" +
                            "\n<input class='form-control' name='image_url' type='hidden' value='" + nutritionInfo[0]["photo"]["thumb"] + "'><br>" +                     
                             "\n<button type='submit' class='btn btn-success btn-lg'><i class='fa fa-cutlery' aria-hidden='true'></i>&emsp;Add Food</button>" +
                        //"\n</form>"+
                        "\n</div>";
            resultsdiv.appendChild(div);
        }
    </script>

@endsection