<?php

namespace App\Http\Controllers\Goal;

use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goal;
use App\User;
use Auth;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('goal.goal');
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
            'preference' => 'required',
            'type' => 'required',
            'value' => 'required',
        ));

        //Store in database
        $goal = new Goal;
        $user = Auth::User();
        $uid = $user->user_id;
        $goal->user_id = $uid;
        $goal->nutrition_type = $request->preference;
        $goal->goal_type = $request->type;
        $goal->value = $request->value;
        $goal->save();

        //Redirect to another page
       return redirect('goal')->with('goal', $goal)->with('success', 'Daily value has been succesfully set.');
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
