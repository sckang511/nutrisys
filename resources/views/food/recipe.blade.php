@extends('layouts.app')

@section('content')
<div class="container shadow-sm p-3 mb-5 bg-white rounded">
    <div class="row">
        <div class="col-md-10">
            <div class="text-left" style="margin-top: 20px;">
                <div class="page-header text-info">
                    <h1>RECIPE</h1>
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h2>Something</h2>
                        </div>
                    @endif

                    <h3>Build your own nutrition recipe!</h3>

                    <form class="form-horizontal" action = "{{ route('recipe') }}" method = "POST">
                      {{ csrf_field() }}
                    <table class="table">
                      <thead>
                        <tr>
                            <th scope="col">Fields</th>
                            <th scope="col"><i class="fa fa-edit"></i>&emsp; Edit Value</th>
                          </tr>
                          </thead>
                          <tbody>
                              
                              <tr>
                              
                                <td>Item Name</td>
                                <td><input class="form-control input-lg" type="text" name="item_name" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Serving Quantity</td>
                                <td><input class="form-control input-lg" type="number" name="serving_qty" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Serving Unit</td>
                                <td><input class="form-control input-lg" type="text" name="serving_unit" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Calories</td>
                                <td><input class="form-control input-lg" type="number" name="calorie" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Total Fat</td>
                                <td><input class="form-control input-lg" type="number" name="total_fat" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Saturated Fat</td>
                                <td><input class="form-control input-lg" type="number" name="saturated_fat" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Cholesterol</td>
                                <td><input class="form-control input-lg" type="number" name="cholesterol" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Sodium</td>
                                <td><input class="form-control input-lg" type="number" name="sodium" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Carbohydrate</td>
                                <td><input class="form-control input-lg" type="number" name="carbohydrate" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Dietary Fiber</td>
                                <td><input class="form-control input-lg" type="number" name="dietary_fiber" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Protein</td>
                                <td><input class="form-control input-lg" type="number" name="protein" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Sugar</td>
                                <td><input class="form-control input-lg" type="number" name="sugar" ></td>
                                
                              </tr>
                              <tr>
                              
                                <td>Potassium</td>
                                <td><input class="form-control input-lg" type="number" name="potassium" ></td>
                                
                              </tr>

                              
                          </tbody>
                      </table>
                      <div class="form-group row"><br>
                        <div class="col-md-offset-4 col-md-4">                        
                          <button type="submit" class="btn btn-success btn-lg mb-2" style="padding: 7px 20px;"><i class="fa fa-floppy-o"></i>&emsp; Save Recipe</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
