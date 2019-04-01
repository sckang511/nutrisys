<?php

namespace App\Http\Controllers\Food;

use Illuminate\Support\Facades\Auth;
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
        $today = date('Y-m-d');

        // get all the collections where the date is today
        $collections = Consumable_Collection::where('date', $today)->get();

        //test
        echo "<pre>                                   $collections is the collections </pre>";

        // from above collections sort by collection type: breakfast ...etc

        // for every collection I have, I need to search for items that match the coll id

        // for every item, I need to get nutrition info to display

        // 


        $nutrition = Nutrition::all();
        return view('food.log')->with('nutrition', $nutrition);
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
