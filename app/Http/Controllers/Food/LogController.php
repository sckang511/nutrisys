<?php
namespace App\Http\Controllers\Food;
use Illuminate\Support\Facades\Auth;
use App\Consumable_Item;
use App\Nutrition;
use App\Consumable_Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get the current user id
        $current_user = Auth::user()->id;
        // get todays date
        date_default_timezone_set('America/Chicago');
        $today = date('Y-m-d');
        $timestamp = strtotime($today);
        $day = date('l', $timestamp);
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));
        // get all the collections where the date is today
        $builder = Consumable_Collection::whereDate('date', '>=', $today)->where('date', '<=', $tomorrow)->get()->toarray();
        $breakfasts = array();
        $lunches = array();
        $dinners = array();
        $others = array();
        $snacks = array();
        //test
        //printf("<pre>                                                ");
        //print_r($builder);
        //printf("</pre>");
        // from above collections sort by collection type: breakfast ...etc
        foreach($builder as $collection) {
            if ($collection['consumable_type'] == 'Breakfast') array_push($breakfasts, $collection);
            if ($collection['consumable_type'] == 'Lunch') array_push($lunches, $collection);
            if ($collection['consumable_type'] == 'Dinner') array_push($dinners, $collection);
            if ($collection['consumable_type'] == 'Other') array_push($others, $collection);
            if ($collection['consumable_type'] == 'Snack') array_push($snacks, $collection);
        }
        // for every collection I have, I need to search for items that match the coll id
        $breakfast_items = array();
        $lunch_items = array();
        $dinner_items = array();
        $other_items = array();
        $snack_items = array();
    
        foreach($breakfasts as $breakfast) {
            $id = $breakfast['consumable_collection_id'];
            $builder = Consumable_Item::where('consumable_collection_id', '=', $id)->get()->toarray();
            foreach($builder as $item) {
                array_push($breakfast_items, $item);
            }
        } 
        foreach($lunches as $lunch) {
            $id = $lunch['consumable_collection_id'];
            $builder = Consumable_Item::where('consumable_collection_id', '=', $id)->get()->toarray();
            foreach($builder as $item) {
                array_push($lunch_items, $item);
            }
        } 
        foreach($dinners as $dinner) {
            $id = $dinner['consumable_collection_id'];
            $builder = Consumable_Item::where('consumable_collection_id', '=', $id)->get()->toarray();
            foreach($builder as $item) {
                array_push($dinner_items, $item);
            }
        } 
        foreach($others as $other) {
            $id = $other['consumable_collection_id'];
            $builder = Consumable_Item::where('consumable_collection_id', '=', $id)->get()->toarray();
            foreach($builder as $item) {
                array_push($other_items, $item);
            }
        } 
        foreach($snacks as $snack) {
            $id = $snack['consumable_collection_id'];
            $builder = Consumable_Item::where('consumable_collection_id', '=', $id)->get()->toarray();
            foreach($builder as $item) {
                array_push($snack_items, $item);
            }
        } 
        $breakfast_objects = array();
        $lunch_objects =array();
        $dinner_objects = array();
        $other_objects = array();
        $snack_objects = array();
        for($i = 0; $i < sizeof($breakfast_items); $i++) {
            $id = $breakfast_items[$i]['nutrition_id'];
            $builder = Nutrition::where('nutrition_id', '=', $id)->get()->toarray();
            $info = $builder[0];
            $breakfast_objects += array(
                $breakfast_items[$i]['consumable_item_id'] => $info,
            );
        }
        for($i = 0; $i < sizeof($lunch_items); $i++) {
            $id = $lunch_items[$i]['nutrition_id'];
            $builder = Nutrition::where('nutrition_id', '=', $id)->get()->toarray();
            $info = $builder[0];
            $lunch_objects += array(
                $lunch_items[$i]['consumable_item_id'] => $info,
            );
        }
        for($i = 0; $i < sizeof($dinner_items); $i++) {
            $id = $dinner_items[$i]['nutrition_id'];
            $builder = Nutrition::where('nutrition_id', '=', $id)->get()->toarray();
            $info = $builder[0];
            $dinner_objects += array(
                $dinner_items[$i]['consumable_item_id'] => $info,
            );
        }
        for($i = 0; $i < sizeof($other_items); $i++) {
            $id = $other_items[$i]['nutrition_id'];
            $builder = Nutrition::where('nutrition_id', '=', $id)->get()->toarray();
            $info = $builder[0];
            $other_objects += array(
                $other_items[$i]['consumable_item_id'] => $info,
            );
        }
        for($i = 0; $i < sizeof($snack_items); $i++) {
            $id = $snack_items[$i]['nutrition_id'];
            $builder = Nutrition::where('nutrition_id', '=', $id)->get()->toarray();
            $info = $builder[0];
            $snack_objects += array(
                $snack_items[$i]['consumable_item_id'] => $info,
            );
        }
        $results = array(
            "Breakfast" => $breakfast_objects,
            "Lunch" => $lunch_objects,
            "Dinner" => $dinner_objects,
            "Other" => $other_objects,
            "Snack" => $snack_objects,
            "Date" => $day . " " . $today,
        );
        
        $user = Auth::User();
        return view('food.log')->with('results', $results)->with('user', $user);
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
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        // get the current user id
        $current_user = Auth::user()->id;
        // get todays date
        date_default_timezone_set('America/Chicago');
        $today = date($date);
        $timestamp = strtotime($today);
        $day = date('l', $timestamp);
        $tomorrow = date('Y-m-d', strtotime($date .' +1 day'));
        // get all the collections where the date is today
        $builder = Consumable_Collection::whereDate('date', '>=', $today)->where('date', '<=', $tomorrow)->get()->toarray();
        $breakfasts = array();
        $lunches = array();
        $dinners = array();
        $others = array();
        $snacks = array();
        //test
        //printf("<pre>                                                ");
        //print_r($builder);
        //printf("</pre>");
        // from above collections sort by collection type: breakfast ...etc
        foreach($builder as $collection) {
            if ($collection['consumable_type'] == 'Breakfast') array_push($breakfasts, $collection);
            if ($collection['consumable_type'] == 'Lunch') array_push($lunches, $collection);
            if ($collection['consumable_type'] == 'Dinner') array_push($dinners, $collection);
            if ($collection['consumable_type'] == 'Other') array_push($others, $collection);
            if ($collection['consumable_type'] == 'Snack') array_push($snacks, $collection);
        }
        // for every collection I have, I need to search for items that match the coll id
        $breakfast_items = array();
        $lunch_items = array();
        $dinner_items = array();
        $other_items = array();
        $snack_items = array();
    
        foreach($breakfasts as $breakfast) {
            $id = $breakfast['consumable_collection_id'];
            $builder = Consumable_Item::where('consumable_collection_id', '=', $id)->get()->toarray();
            foreach($builder as $item) {
                array_push($breakfast_items, $item);
            }
        } 
        foreach($lunches as $lunch) {
            $id = $lunch['consumable_collection_id'];
            $builder = Consumable_Item::where('consumable_collection_id', '=', $id)->get()->toarray();
            foreach($builder as $item) {
                array_push($lunch_items, $item);
            }
        } 
        foreach($dinners as $dinner) {
            $id = $dinner['consumable_collection_id'];
            $builder = Consumable_Item::where('consumable_collection_id', '=', $id)->get()->toarray();
            foreach($builder as $item) {
                array_push($dinner_items, $item);
            }
        } 
        foreach($others as $other) {
            $id = $other['consumable_collection_id'];
            $builder = Consumable_Item::where('consumable_collection_id', '=', $id)->get()->toarray();
            foreach($builder as $item) {
                array_push($other_items, $item);
            }
        } 
        foreach($snacks as $snack) {
            $id = $snack['consumable_collection_id'];
            $builder = Consumable_Item::where('consumable_collection_id', '=', $id)->get()->toarray();
            foreach($builder as $item) {
                array_push($snack_items, $item);
            }
        } 
        $breakfast_objects = array();
        $lunch_objects =array();
        $dinner_objects = array();
        $other_objects = array();
        $snack_objects = array();
        for($i = 0; $i < sizeof($breakfast_items); $i++) {
            $id = $breakfast_items[$i]['nutrition_id'];
            $builder = Nutrition::where('nutrition_id', '=', $id)->get()->toarray();
            $info = $builder[0];
            $breakfast_objects += array(
                $breakfast_items[$i]['consumable_item_id'] => $info,
            );
        }
        for($i = 0; $i < sizeof($lunch_items); $i++) {
            $id = $lunch_items[$i]['nutrition_id'];
            $builder = Nutrition::where('nutrition_id', '=', $id)->get()->toarray();
            $info = $builder[0];
            $lunch_objects += array(
                $lunch_items[$i]['consumable_item_id'] => $info,
            );
        }
        for($i = 0; $i < sizeof($dinner_items); $i++) {
            $id = $dinner_items[$i]['nutrition_id'];
            $builder = Nutrition::where('nutrition_id', '=', $id)->get()->toarray();
            $info = $builder[0];
            $dinner_objects += array(
                $dinner_items[$i]['consumable_item_id'] => $info,
            );
        }
        for($i = 0; $i < sizeof($other_items); $i++) {
            $id = $other_items[$i]['nutrition_id'];
            $builder = Nutrition::where('nutrition_id', '=', $id)->get()->toarray();
            $info = $builder[0];
            $other_objects += array(
                $other_items[$i]['consumable_item_id'] => $info,
            );
        }
        for($i = 0; $i < sizeof($snack_items); $i++) {
            $id = $snack_items[$i]['nutrition_id'];
            $builder = Nutrition::where('nutrition_id', '=', $id)->get()->toarray();
            $info = $builder[0];
            $snack_objects += array(
                $snack_items[$i]['consumable_item_id'] => $info,
            );
        }
        $results = array(
            "Breakfast" => $breakfast_objects,
            "Lunch" => $lunch_objects,
            "Dinner" => $dinner_objects,
            "Other" => $other_objects,
            "Snack" => $snack_objects,
            "Date" => $day . " " . $date,
            "Tomorrow" => $tomorrow,
        );
        return view('food.log')->with('results', $results);
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
    public function delete($id)
    {
        Consumable_Item::where('item_id', '==', $id)->delete();
    }
}