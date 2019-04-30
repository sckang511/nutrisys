<?php
namespace App\Http\Controllers\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goal;
use App\User;
use Auth;
use DB;
use App\Nutrition;
use App\Consumable_Collection;
use App\Consumable_Item;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        return view('food.search')->with('user', $user);
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
        //Validate the data
        $this->validate($request, array(
            'serving_qty' => 'required',
            'consumable_type' => 'required',
        ));

        //Store in database
        $goal = new Goal();
        $consumable_coll = new Consumable_Collection();
        $consumable_item = new Consumable_Item();        
        $nutrition = new Nutrition();

        $nutrition->item_id = 0;
        $nutrition->item_name = $request->food_name;
        $nutrition->item_image = $request->image_url;
        $nutrition->serving_qty = $request->serving_qty;
        $nutrition->serving_unit = $request->serving_unit;
        $nutrition->calorie = $request->calories;
        $nutrition->total_fat = $request->total_fat;
        $nutrition->saturated_fat = $request->saturated_fat;
        $nutrition->cholesterol = $request->cholesterol;
        $nutrition->sodium = $request->sodium;
        $nutrition->carbohydrate = $request->total_carbohydrate;
        $nutrition->dietary_fiber = $request->dietary_fiber;
        $nutrition->sugar = $request->sugars;
        $nutrition->protein = $request->protein;
        $nutrition->potassium = $request->potassium;
        //$goal->user_id = Auth::User()->user_id;
        $consumable_coll->user_id = Auth::User()->user_id;
        $consumable_coll->consumable_type = $request->consumable_type;
        

        $nutrition->save();
        //$goal->save();
        $consumable_coll->save();

        $consumable_item->nutrition_id = $nutrition->nutrition_id;
        $consumable_item->consumable_collection_id = $consumable_coll->consumable_collection_id;
        $consumable_item->save();

        //$consumable_collection_id = DB::select('SELECT consumable_collection_id FROM Consumable_Collections ORDER BY consumable_collection_id DESC LIMIT 1');
        //$nutrition_id = DB::select('SELECT nutrition_id FROM Nutritions ORDER BY nutrition_id DESC LIMIT 1');

       return view('food.search')->with('success', 'Food added succesfully.');
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
