@extends('layouts.app')

@section('content')
<div class="container shadow-sm p-3 mb-5 bg-white rounded" style="background-color: white">
    <div class="row">
        <div class="col-md-10">
            <div class="text-left" style="margin-top: 20px;">
                <div class="page-header text-info">
                    <h1>SEARCH FOOD</h1>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-11">
                            <form class="form-inline md-form form-sm active-cyan active-cyan-2 mt-2">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search Your Food By Name" aria-label="Search" id="food_search">
                            </form>
                            <div style="margin-top: 30px;">
                                <pre id="search_results" style="display: none;">
                                    <!-- Results -->                
                                </pre>
                            </div>
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
                            var div = makeCards(commonArray[i]);
                            resultsdiv.appendChild(div);                        
                        }
                    }
    
                    if (brandedArray != null) {
                        for (i = 0; i < brandedArray.length; i++) {
                            console.log(brandedArray[i]);
                            var div = makeCards(brandedArray[i]);
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
    
    function makeCards(object) {
    
        var div = document.createElement('pre');
        div.className = "pre-food";
        div.innerHTML = "image: <img src='" + object["photo"]["thumb"] + "' width='100' height='100'>" +
                        "\nfood name: " + object["food_name"] + 
                        "\nfood locale: " + object["locale"] + 
                        "\nserving unit: " + object["serving_unit"] +
                        "\nserving qty: " + object["serving_qty"] +
                        "\n<button type='button' class='btn btn-info' style='margin-top: 10px;'>Add</button>" +
                        "<button type='button' class='btn btn-light' style='margin-left: 10px;margin-top: 10px'>View Details</button>";
        return div;
    }
    
    </script>
</div>
@endsection
