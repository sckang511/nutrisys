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
      public function index()
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
        $user = Auth::User();
        // get todays date
        date_default_timezone_set('America/Chicago');
        $today = date('Y-m-d');
        $lastWeek =  date('Y-m-d', strtotime('-1 week'));
        $nutrition_type = 'Protein';
        $usid = Auth::User()->user_id;

        // get all the collections where the date is today
        $query = DB::select("SELECT goals.goal_id, goals.user_id, (SELECT SUM(DISTINCT protein) FROM NUTRITIONS) AS p, goals.nutrition_type, goals.value 
        FROM goals
        INNER JOIN consumable_collections ON goals.user_id = consumable_collections.user_id
        INNER JOIN consumable_items ON consumable_collections.consumable_collection_id = consumable_items.consumable_collection_id
        INNER JOIN (SELECT nutrition_id, protein FROM nutritions) nutritions ON consumable_items.nutrition_id = nutritions.nutrition_id GROUP BY goals.goal_id, goals.user_id, p, goals.nutrition_type, goals.value");
        //dd($query);

        //// This is hack for presentation
        

        
        //// This is hack for presentation



        $fromDate = new Carbon('last week'); 
        $toDate = new Carbon('now');
        
        $chart = DB::table('goals')
                ->join('consumable_collections', 'consumable_collections.user_id', '=', 'goals.user_id')
                ->join('consumable_items', 'consumable_items.consumable_collection_id', '=', 'consumable_collections.consumable_collection_id')
                ->join('nutritions', 'nutritions.nutrition_id', '=', 'consumable_items.nutrition_id')
                //->where('consumable_collections.date', '=', $today)
                ->whereBetween('consumable_collections.date', array($fromDate->toDateTimeString(), $toDate->toDateTimeString()))
                ->where('consumable_collections.user_id', '=', Auth::User()->user_id)
                ->where('goals.user_id', '=', 'consumable_collections.user_id')
                ->where('consumable_collections.consumable_collection_id', '=', 'consumable_items.consumable_collection_id')
                ->where('consumable_items.nutrition_id', '=', 'nutritions.nutrition_id')
                ->where('goals.nutrition_type', '=', $nutrition_type)
                ->where('goals.goal_type', '=', 'daily')
                ->select('goals.nutrition_type', 'goals.value', 'nutritions.protein', 'goals.created_at')
                ->get()->toArray();
                //dd($chart);
        return view('goal.progress')->with('query', $query)->with('chart', $chart)->with('user', $user);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataForDropdown()
    {
        // get todays date
        date_default_timezone_set('America/Chicago');
        $today = date('Y-m-d');

        $dropdown = DB::table('goals')
            ->select('goals.nutrition_type')
            ->where('goals.created_at', '=', $today)->get();

        dd($dropdown);
        return view('goal.progress')->with('dropdown', $dropdown);
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
        
        $goals_id = Goal::find($id)->delete();
        $user = Auth::User();

        $query = DB::select("SELECT goals.goal_id, goals.user_id, (SELECT SUM(DISTINCT protein) FROM NUTRITIONS) AS p, goals.nutrition_type, goals.value 
        FROM goals
        INNER JOIN consumable_collections ON goals.user_id = consumable_collections.user_id
        INNER JOIN consumable_items ON consumable_collections.consumable_collection_id = consumable_items.consumable_collection_id
        INNER JOIN (SELECT nutrition_id, protein FROM nutritions) nutritions ON consumable_items.nutrition_id = nutritions.nutrition_id GROUP BY goals.goal_id, goals.user_id, p, goals.nutrition_type, goals.value");
        
        return view('goal.progress')->with('success', 'Record succesfully deleted.')->with('query', $query)->with('user', $user);
    }
}
