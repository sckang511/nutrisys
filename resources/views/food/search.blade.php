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
                        div.innerHTML = div.innerHTML + "<button type='button' class='btn btn-light' style='margin-left: 10px;margin-top: 10px' onClick='viewBrandedDetails()'>View Branded Details</button>";
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


function getBrandedDetails() {
   //textinput.value = '';
    //alert("Branded");
}


function viewNutritionDetails(nutritionInfo) {
    var resultsdiv = document.getElementById("search_results");
   textinput.value = '';
   // echo "Common";
   //alert("Common Details - Food Name:" + foodName);
   //alert("Common Details");
   alert("View Nutrition Details" + nutritionInfo);
   var div = document.createElement('pre');
    div.className = "pre-food";
    //div.innerHTML = "<h1>It worked</h1>";
    resultsdiv.innerHTML = '';
    
    div.innerHTML = "image: <img src='" + nutritionInfo[0]["photo"]["thumb"] + "' width='100' height='100'>" +
                    "\nfood name: " + nutritionInfo[0]["food_name"] + 
                    "\nserving unit: " + nutritionInfo[0]["serving_unit"] +
                    "\nserving qty: " + nutritionInfo[0]["serving_qty"] +
                    "\ncalories: " + nutritionInfo[0]["nf_calories"] +
                    "\ntotal fat: " + nutritionInfo[0]["nf_total_fat"] +
                    "\nsaturated fat: " + nutritionInfo[0]["nf_saturated_fat"] +
                    "\ncholesterol: " + nutritionInfo[0]["nf_cholesterol"] +
                    "\nsodium: " + nutritionInfo[0]["nf_sodium"] +
                    "\ntotal carbohydrates: " + nutritionInfo[0]["nf_total_carbohydrate"] +
                    "\ndietary fiber: " + nutritionInfo[0]["nf_dietary_fiber"] +
                    "\nsugars: " + nutritionInfo[0]["nf_sugars"] +
                    "\nprotein: " + nutritionInfo[0]["nf_protein"] +
                    "\npotassium: " + nutritionInfo[0]["nf_potassium"] +
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