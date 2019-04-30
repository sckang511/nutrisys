<?php
namespace App\Http\Controllers\Food;
use App\Http\Controllers\Controller;
use App\Nutrition;
use Auth;
use Illuminate\Http\Request;
class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        return view('food.recipe')->with('user', $user);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, array(
        'serving_qty' => 'numeric', 'serving_unit' => 'string',
        'calorie' => 'numeric', 'total_fat' => 'numeric', 'saturated_fat' => 'numeric', 
        'cholesterol' => 'numeric', 'sodium' => 'numeric',
        'carbohydrate' => 'numeric', 'dietary_fiber' => 'numeric', 'sugar' => 'numeric', 
        'protein' => 'numeric', 'potassium' => 'numeric',
        ));
        $newRecipe = new Nutrition;
        $newRecipe->item_id = Auth::user()->username;
        $newRecipe->item_name = $request->item_name;
        $newRecipe->serving_unit = $request->serving_unit;
        $newRecipe->serving_qty = $request->serving_qty;
        $newRecipe->calorie = $request->calorie;
        $newRecipe->total_fat = $request->total_fat;
        $newRecipe->saturated_fat = $request->saturated_fat;
        $newRecipe->cholesterol = $request->cholesterol;
        $newRecipe->sodium = $request->sodium;
        $newRecipe->carbohydrate = $request->carbohydrate;
        $newRecipe->dietary_fiber = $request->dietary_fiber;
        $newRecipe->sugar = $request->sugar;
        $newRecipe->protein = $request->protein;
        $newRecipe->potassium = $request->potassium;
        $newRecipe->save();
        
        return view('food.recipe')->with('success', 'A new recipe was added.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}