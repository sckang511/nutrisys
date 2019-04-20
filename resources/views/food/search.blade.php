@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-inline md-form form-sm active-cyan active-cyan-2 mt-2">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search" id="food_search">
                    </form>
                    <div style="margin-top: 30px;">
                        <pre id="search_results" style="display: none;">
                            <!-- Results -->                
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    div.innerHTML = "image: <img src='" + object["photo"]["thumb"] + "' width='100' height='100'>" +
                    "\nfood name: " + object["food_name"] + 
                    "\nfood locale: " + object["locale"] + 
                    "\nserving unit: " + object["serving_unit"] +
                    "\nserving qty: " + object["serving_qty"] +
                    "\n<button type='button' class='btn btn-info' style='margin-top: 10px;'>Add</button>";
                    if(resultType == "common"){
                        //div.innerHTML = div.innerHTML + "<button type='button' class='btn btn-light' style='margin-left: 10px;margin-top: 10px' onClick='viewCommonDetails(" + object["food_name"] + ")'>View Common Details</button>";
                       // div.innerHTML = div.innerHTML + "<button type='button' class='btn btn-light' style='margin-left: 10px;margin-top: 10px' onClick='viewCommonDetails(\"" + object["food_name"] + "\")'>View Common Details</button>";
                        div.innerHTML = div.innerHTML + "<button type='button' class='btn btn-light' style='margin-left: 10px;margin-top: 10px' onClick='getCommonDetails(\"" + object["food_name"] + "\")'>View Common Details</button>";


                    } else {
                        div.innerHTML = div.innerHTML + "<button type='button' class='btn btn-light' style='margin-left: 10px;margin-top: 10px' onClick='getBrandedDetails(\"" + object["nix_item_id"] + "\")'>View Branded Details</button>";
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
    div.innerHTML = "<img src='" + nutritionInfo[0]["photo"]["thumb"] + "' width='100' height='100'>" +
                    "\nFood Name: " + nutritionInfo[0]["food_name"] + 
                    "\nServing Unit: " + nutritionInfo[0]["serving_unit"] +
                    //"\nserving qty: " + nutritionInfo[0]["serving_qty"] +
                    "\nServing Quantity: <input type='text' id='serving_qty' maxlength='2' size='2'>" +
                    "\nCalories: " + nutritionInfo[0]["nf_calories"] +
                    "\nTotal Fat: " + nutritionInfo[0]["nf_total_fat"] + "g" +
                    "\nSaturated Fat: " + nutritionInfo[0]["nf_saturated_fat"] + "g" +
                    "\nCholesterol: " + nutritionInfo[0]["nf_cholesterol"] + "mg" +
                    "\nSodium: " + nutritionInfo[0]["nf_sodium"] + "mg" +
                    "\nTotal Carbohydrates: " + nutritionInfo[0]["nf_total_carbohydrate"] + "g" +
                    //"\nDietary Fiber: " + nutritionInfo[0]["nf_dietary_fiber"] + "g" +
                    "\nDietary Fiber: " + fiber + "g" +
                    "\nSugars: " + sugars + "g" +
                    "\nProtein: " + nutritionInfo[0]["nf_protein"] + "g" +
                    "\nPotassium: " + potassium + "mg" +
                    "\nMeal: <select id='consumable_type'>  <option value='Breakfast'>Breakfast</option>" +
                    "<option value='Lunch'>Lunch</option>" +
                    "<option value='Dinner'>Dinner</option>" +
                    "<option value='Snack'>Snack</option>" +
                    "<option value='Other'>Other</option>" +
                    "</select>" +
                    "\n<button type='button' class='btn btn-info' style='margin-top: 10px;'>Add</button>";
                    /*if(resultType == "common"){
                        //div.innerHTML = div.innerHTML + "<button type='button' class='btn btn-light' style='margin-left: 10px;margin-top: 10px' onClick='viewCommonDetails(" + object["food_name"] + ")'>View Common Details</button>";
                        div.innerHTML = div.innerHTML + "<button type='button' class='btn btn-light' style='margin-left: 10px;margin-top: 10px' onClick='viewCommonDetails(\"" + object["food_name"] + "\")'>View Common Details</button>";

                    } else {
                        div.innerHTML = div.innerHTML + "<button type='button' class='btn btn-light' style='margin-left: 10px;margin-top: 10px' onClick='viewBrandedDetails()'>View Branded Details</button>";
                    }*/
                   
   // return div;
   resultsdiv.appendChild(div);
}


</script>

@endsection