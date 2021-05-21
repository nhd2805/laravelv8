<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index(){
    	echo "Hello myself";
    }
    public function languages($name){
    	echo "Program Languages"." ".$name;
    }
    public function GetURL1(request $request){
    	if($request->isMethod('Post'))
    		echo "Method Get";
    	else
    		echo "No Method Get";
    }
    public function GetURL2(request $request){
    	if($request->is('*admin*'))
    		echo "Yes";
    	else
    		echo "No";
    }
    public function Post(){
    	return view('post_form');
    }
    public function Post_form(Request $request){
    	$name =$request->name;
    	echo $name;
    	echo "------->".$request->token;
    }
    public function Upload_file(Request $request){
    	if($request->hasFile('filename')){
    		$file=$request->file('filename');
    	    $name=$file->getClientOriginalName('filename');
    	    $file->move('public/img',$name);
    	    echo "Success";
    	}
    	else
    		echo "File not found";
    }
    public function getName($name_contr){
    	return view('view_parameter', ['name_view'=>$name_contr]);
    }
}
