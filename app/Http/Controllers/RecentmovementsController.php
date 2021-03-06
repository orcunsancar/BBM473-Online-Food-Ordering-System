<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use App\RecentMovements;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\User;
use Hash;
use Validator;
use Auth;


class RecentmovementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recentmovementses = Recentmovements::all();
        return view('recentmovements/index')->with( 'recentmovementses', $recentmovementses );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurant = Restaurant::pluck('name','id')->prepend('Please Select','');
        return view('recentmovements/new')->with('restaurant', $restaurant);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recentmovements = new Recentmovements();

        $recentmovements->place = Input::get('place');
        $recentmovements->restaurant_id = Input::get('restaurant_id');


        if($recentmovements->save())
        {
            Session::flash('message','Recentmovements was successfully created');
            Session::flash('m-class','alert-success');
            return redirect('recentmovements');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('recentmovements/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recentmovements = Recentmovements::find($id);
        return view('recentmovements/show')->with('recentmovements', $recentmovements);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recentmovements = Recentmovements::find($id);
        $restaurant = Restaurant::pluck('name','id');
        return view('recentmovements/edit')->with(['recentmovements' => $recentmovements,'restaurant' => $restaurant]);
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
        $recentmovements = Recentmovements::find($id);

        $recentmovements->place = Input::get('place');
        $recentmovements->restaurant_id = Input::get('restaurant_id');

        if($recentmovements->save())
        {
            Session::flash('message','Recentmovements was successfully updated');
            Session::flash('m-class','alert-success');
            return redirect('recentmovements');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('recentmovements/create');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recentmovements::find($id)->delete();

        Session::flash('message','Scoreboard was successfully deleted');
        Session::flash('m-class','alert-success');
        return redirect('recentmovements');
    }

    //UPDATE Password
    public function password(){
        return View('password');
    }

    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'Current password is required',
            'password.required' => 'New password is required',
            'password.confirmed' => 'Passwords do not match',
            'password.min' => 'Password is too short (minimum is 6 characters)',
            'password.max' => 'Password is too long (maximum is 18 characters)',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('password')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('/')->with('message', 'Password changed successfully')->with('m-class','alert-success');
            }
            else
            {
                return redirect('password')->with('message', 'Current password is invalid')->with('m-class','alert-danger');
            }
        }
    }
}
