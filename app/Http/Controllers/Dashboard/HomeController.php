<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Consumable_Collection;
use App\Consumable_Item;
use App\Nutrition;
use App\Goal;
use App\User;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function  getRecommendation()
    {
        $recommend = Goal::leftJoin('consumable_collections', 'consumable_collections.user_id', '=', 'goals.user_id')
            ->leftJoin('consumable_items', 'consumable_items.consumable_collection_id', '=','consumable_collections.consumable_collection_id')
            ->leftJoin('nutritions', 'nutritions.nutrition_id', '=','consumable_items.nutrition_id')
            ->select('goals.user_id', 'goals.nutrition_type', 'goals.value', 'nutritions.protein', 'nutritions.serving_unit', 'goals.created_at')
            ->where('goals.user_id', Auth::User()->user_id)
            ->where('goals.nutrition_type', '=', 'Protein')
            ->get();
            
        return view('dashboard.home')->with('recommend', $recommend);
    }
}
