<?php
namespace App\Http\Controllers\Profile;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use DB;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth::User();
        return view('profile.profile', array('user' => Auth::user()));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /*  public function getProfile()
    {
        $profile_pic = Auth::User();
        return view('profile.getprofile', $profile_pic);
    } */


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
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'gender' => 'required|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'birthdate' => 'required|date',
            'phone' => 'required|string|max:255',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $user = Auth::User();
        $user->username = $request->username;
        $user->height = $request->height;
        $user->weight = $request->weight;
        $user->phone = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $avatarName = $user->id.'_avatar'.time().'.'.request()->profile_picture->getClientOriginalExtension();
        $request->profile_picture->storeAs('avatars',$avatarName);
        $user->profile_picture = $avatarName;
        $user->save();
        
        return view('profile.profile')->with('user',$user)->with('success', 'Profile updated.');
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
        // Handle the user upload of avatar
/*     	if($request->hasFile('profile_picture')){
    		$avatar = $request->file('profile_picture');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(200, 200)->save( public_path('storage/app/public/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profile', array('user' => Auth::user()) ); */

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