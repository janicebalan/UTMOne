<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user|administrator');
    }
    
    public function index()
    {
        $users = DB::select('select * from users');
        $user_role = DB::select('select * from role_user');
        return view('edituser',['users'=>$users],['user_role'=>$user_role]);

        //return view('user.index');
    }
    public function destroy($id) {
        DB::delete('delete from users where id = ?',[$id]);

        echo '<script> alert("Are you sure you want to delete this record?"); </script>';
        echo '<script> alert("Record deleted successfully"); </script>';

        echo 'Record deleted successfully <br><a href = "/edituser">Click Here</a> to go back.';
     }
     public function show($id) {
        $users = DB::select('select * from users where id = ?',[$id]);
        return view('updateuser',['users'=>$users]);
    } 
     public function edit(Request $request,$id) {
        $name = $request->input('name');
        $email = $request->input('email');
        $username = $request->input('username');
        $userID = $request->input('userID');
        //$data=array('first_name'=>$first_name,"last_name"=>$last_name,"city_name"=>$city_name,"email"=>$email);
        //DB::table('student')->update($data);
        // DB::table('student')->whereIn('id', $id)->update($request->all());
        DB::update('update users set name = ?,email=?,username=?,userID=? where id = ?',[$name,$email,$username,$userID,$id]);
        
        echo 'Record updated successfully.<br><a href = "/edituser">Click Here</a> to go back.';
        }
}
