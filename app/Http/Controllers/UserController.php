<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $users = User::sortable()->with('referedBy')->where('role_id',2)->paginate(10);
        return view('admin.users_listing',['users'=>$users]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
     
            $user = new User();
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone_no = $request->phone_no;
          
            $user->company = $request->company;
          
            $user->role_id = 2;
            
            $user->save();
            return redirect()->back()->with(['status'=>'success','message'=>'Your account has been created successfully']);
       
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        if (Session::get('role_id') == 1) {
            $user_id = $req->user_id;
        }else{
            $user_id = Session::get('user_id');
        }
        $user = User::find($user_id);
        return view('user.user-profile',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'name' => 'required|max:255',
            'phone_no' => 'required|min:5|max:15',
            'user_id' => 'required|int'

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with(['status'=>'danger','message'=>$validator->errors()->first()]);
        }
        try{
            if (Session::get('role_id') == 1) {
                $user_id = $request->user_id;
            }else{
                $user_id = Session::get('user_id');
            }
            $user = User::find($user_id);
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->phone_no = $request->phone_no;
            $user->save();
            return back()->with(['status'=>'success','message'=>'Profile Info updated successfully']);
        }catch(Exception $e){
            return back()->withInput()->with(['status'=>'danger','message'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        if (Session::get('role_id') == 1) {
            $user_id = $req->user_id;
        }else{
            $user_id = Session::get('user_id');
        }
        $user = User::find($user_id);
        $user->delete();

        return back()->with(['status'=>'success','message'=>'User Deleted successfully']); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsersAjax(Request $req)
    {

        if ($req->level == 1) {
            $user = User::find($req->user_id);
            $name = $user->name;
            $levelsHeadingArray = array('name1'=>$name);
        }elseif ($req->level == 2) {
            $user = User::with('referedBy')->find($req->user_id);
            $name = $user->name;
            $levelsHeadingArray = array('name1'=>$user->referedBy->name,'name2'=>$name);
        }
        elseif ($req->level == 3) {
            $user = User::with('referedBy')->find($req->user_id);
            $name = $user->name;
            $parent = User::with('referedBy')->find($user->referedBy->id);
            $levelsHeadingArray = array('name1'=>$parent->referedBy->name, 'name2'=>$user->referedBy->name,'name3'=>$name);

        }
        $users = User::sortable()->with('referedBy')->where('reference_id',$req->user_id)->paginate(10);
        return view('admin.ajax.users_list_ajax',['users'=>$users,'level'=>$req->level,'levelsHeadingArray'=>$levelsHeadingArray,'referedBy'=>$req->user_id]);
    }

    /**
     * Displaying the listing of users called by ajax for pagination... For admin
     *
     * @return \Illuminate\Http\Response
     */
    public function getPaginatedUsersAjax(Request $req)
    {
        $referedBy = $req->referedBy;
        $users = User::sortable()->with('referedBy')
        ->when($referedBy, function($qu) use($referedBy){
            $qu->where('reference_id',$referedBy);
        })
        ->where('role_id',2)
        ->paginate(10);
        $level = $req->level;
        return view('admin.ajax.paginated_users_ajax',['users'=>$users,'level'=>$level]);
    }

    //--------------------------Functions for user------------------------------------

    /**
     * Display a listing of the resource for the user
     *
     * @return \Illuminate\Http\Response
     */
    public function viewTeam()
    {
        $user_id = Session::get('user_id');
        $users = User::sortable()->with('referedBy')->where('reference_id',$user_id)->paginate(10);
        return view('user.users_listing',['users'=>$users]);
    }

    /**
     * Displaying the listing of users called by ajax for pagination... For user
     *
     * @return \Illuminate\Http\Response
     */
    public function getPaginatedTeamAjax(Request $req)
    {
        // if (User::isAuthenticatedRequest($req->user_id, $req->level) == 0) {
        //     return 'Unauthenticated Request';
        // }
        $referedBy = $req->referedBy;
        $users = User::sortable()->with('referedBy')
        ->where('reference_id',$referedBy)
        ->paginate(10);
        $level = $req->level;
        return view('user.ajax.paginated_users_ajax',['users'=>$users,'level'=>$level]);
    }


        /**
     * Display a listing of the resource for the wizard .
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeamForWizard(Request $req)
    {
        // if (User::isAuthenticatedRequest($req->user_id, $req->level) == 0) {
        //     return 'Unauthenticated Request';
        // }
        if ($req->level == 2) {
            $user = User::find($req->user_id);
            $name = $user->name;
            $levelsHeadingArray = array('name1'=>$name);
        }elseif ($req->level == 3) {
            $user = User::with('referedBy')->find($req->user_id);
            $name = $user->name;
            $levelsHeadingArray = array('name1'=>$user->referedBy->name,'name2'=>$name);
        }
        $users = User::sortable()->with('referedBy')->where('reference_id',$req->user_id)->paginate(10);
        return view('user.ajax.team_for_Wizard',['users'=>$users,'level'=>$req->level,'levelsHeadingArray'=>$levelsHeadingArray,'referedBy'=>$req->user_id]);
    }
}
