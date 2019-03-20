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
                    <div style="margin-top: 20px;">
                        <pre id="search_results">
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
        $.ajax({
            url: request + value,
            type: 'GET',
            dataType: 'json',
            headers: {
                "x-app-id": "bbed59ef",
                "x-app-key": "c5e390e2bb4e9012ac02c93ffed211d9",
            },
            success: function (data) {
                
                response = JSON.stringify(data, null, "  ");
                document.getElementById("search_results").innerHTML = response;
                console.log(data);
            },
            error: function (data) {
                $('#search_results').html(data);
            }
        });
    })

</script>

@endsection
