<?php

namespace App\Http\Controllers\Goal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goal;
use App\User;
use Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = Goal::all();
        return view('goal.goal')->with('goals', $goals);
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
            'goal_type' => 'required',
            'the_value' => 'required',
        ));

        //Store in database
        $goal = new Goal;
        $user = Auth::User();
        $uid = $user->user_id;
        $goal->user_id = $uid;
        $goal->nutrition_type = $request->preference;
        $goal->goal_type = $request->goal_type;
        $goal->value = $request->the_value;
        $goal->save();

        //Session::flash('success', 'Daily value has been succesfully set.');

        //Redirect to another page
       return redirect('goal')->with('goal', $goal);
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
