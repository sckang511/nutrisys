<?php

namespace App\Http\Controllers\Goal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Consumable_Collection;
use Carbon\Carbon;
use App\Consumable_Item;
use App\Nutrition;
use App\Goal;
use App\User;
use Auth;
use DB;
use DateTime;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function getChartData()
    {
        //
    } 
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchData()
    {
        //Fetch data from database
        // get todays date
        date_default_timezone_set('America/Chicago');
        $today = date('Y-m-d');
        $lastWeek =  date('Y-m-d', strtotime('-1 week'));
        $nutrition_type = 'Protein';

        // get all the collections where the date is today
        $query = DB::table('goals')
            ->join('consumable_collections', 'consumable_collections.user_id', '=', 'goals.user_id')
            ->join('consumable_items', 'consumable_items.consumable_collection_id', '=', 'consumable_collections.consumable_collection_id')
            ->join('nutritions', 'nutritions.nutrition_id', '=', 'consumable_items.nutrition_id')
            ->whereDate('consumable_collections.date', '=', $today)
            ->where('consumable_collections.user_id', '=', Auth::User()->user_id)
            ->where('goals.nutrition_type', '=', $nutrition_type)
            ->where('goals.goal_type', '=', 'Daily')
            ->select('goals.goal_id', 'goals.user_id', 'goals.nutrition_type', 'goals.value', 'nutritions.protein', 'nutritions.serving_unit')->distinct()
            ->paginate(5);

        $recommend = DB::table('goals')
            ->join('consumable_collections', 'consumable_collections.user_id', '=', 'goals.user_id')
            ->whereDate('consumable_collections.date', '=', $today)
            ->join('consumable_items', 'consumable_items.consumable_collection_id', '=', 'consumable_collections.consumable_collection_id')
            ->join('nutritions', 'nutritions.nutrition_id', '=', 'consumable_items.nutrition_id')
            ->where('consumable_collections.user_id', '=', Auth::User()->user_id)
            ->where('goals.nutrition_type', '=', $nutrition_type)
            ->where('goals.goal_type', '=', 'Daily')
            ->select('goals.goal_id', 'goals.user_id', 'goals.goal_type', 'goals.nutrition_type', 'goals.value', 'nutritions.protein', 'nutritions.serving_unit')->distinct()
            ->get();

        $fromDate = new Carbon('last week'); 
        $toDate = new Carbon('now');

        $chart = DB::table('goals')
                ->join('consumable_collections', 'consumable_collections.user_id', '=', 'goals.user_id')
                ->join('consumable_items', 'consumable_items.consumable_collection_id', '=', 'consumable_collections.consumable_collection_id')
                ->join('nutritions', 'nutritions.nutrition_id', '=', 'consumable_items.nutrition_id')
                ->whereBetween('consumable_collections.date', array($fromDate->toDateTimeString(), $toDate->toDateTimeString()))
                ->where('consumable_collections.user_id', '=', Auth::User()->user_id)
                ->where('goals.user_id', '=', 'consumable_collections.user_id')
                ->where('consumable_collections.consumable_collection_id', '=', 'consumable_items.consumable_collection_id')
                ->where('consumable_items.nutrition_id', '=', 'nutritions.nutrition_id')
                ->where('goals.nutrition_type', '=', $nutrition_type)->distinct()
                ->where('goals.goal_type', '=', 'Weekly')
                ->select('goals.nutrition_type', 'goals.value', 'nutritions.protein', 'goals.created_at')
                ->get();

        //dd($chart);
        return view('goal.progress')->with('query', $query)->with('recommend', $recommend)->with('chart', $chart);

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
        $goals = Goal::find($id);
        $goals->value = $request->input('');
        $goals->save();
        
        //view('goal.progress')->with('success', 'Record succesfully updated.')
        return $goals;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //$findUser = Goal::find($id);
        //$user = Auth::User()->user_id;
        echo'I am here';
        $goals_id = Goal::find($id)->delete();

        //view('goal.progress')->with('success', 'Record succesfully deleted.')
        return $goals_id;
    }
}
