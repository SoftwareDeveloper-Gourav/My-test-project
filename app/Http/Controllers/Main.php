<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\MainModel;

class Main extends Controller
{
     public function Registration(Request $data){
      
        $insert=new MainModel;
        $insert->name=$data['name'];
        $insert->number=$data['number'];
        $insert->city=$data['city'];
        $insert->dob=$data['dob'];
        $insert->gender=$data['gender'];
        $insert->password=md5($data['password']);
        // $insert->photo=$data['photo'];
        $photo=$data->photo;
        $photo_name=$photo->getClientOriginalName();
        $data->file('photo')->storeAs('uploads',$photo_name);
        $insert->photo=$photo_name;
        $insert->save();
        return redirect('/user');
     
     }

     public function show(){
        $data=MainModel::paginate('4');
        $com_data=compact('data');
        return view('user')->with($com_data);
     }

     public function trash($id){
         $data=MainModel::find($id)->delete();
         return redirect()->back();


     }

     public function trash_data(){
        $data=MainModel::onlyTrashed()->paginate(4);
        $com_data=compact('data');
        return view('trash_data')->with($com_data);

     }

     public function delete($id){
        $data=MainModel::withTrashed()->find($id)->forceDelete();
        return redirect()->back();
     }

     public function restore($id){
        $data=MainModel::onlyTrashed()->find($id)->restore();
        return redirect()->back();
     }


     public function edit($id){
        $data=MainModel::find($id);
        if(is_null($data)){
            // Not Found
        }else{
            // found
        $com_data=compact('data');

        }
        return view('edit_user')->with($com_data);
     }

     public function index(){
        // $url=url('user_registration');
        // $title="Registration Form";
        // $com_data=compact('url','title');
        return view('registration');
     }

     public function update($id, Request $data){
        $result=MainModel::find($id);
        $result->name=$data['name'];
        $result->number=$data['number'];
        $result->dob=$data['dob'];
        $result->city=$data['city'];
        $result->gender=$data['gender'];
        $result->save();
        return redirect('user');


     }
}
