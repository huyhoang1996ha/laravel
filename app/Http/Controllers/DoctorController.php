<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\doctor;
use App\disease;
use DB;

class DoctorController extends Controller
{
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$doctors=doctor::with('diseases.patients')->get();
		return view('list',compact('doctors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$diseases=disease::all();
		
		return view('createDoctor',compact('diseases'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		$doctor=new doctor;
		$doctor->name=$req->input('name');
		$doctor->save();
		$disease_id=$req->input('disease_id');
		$doctor->diseases()->attach($disease_id);
		return redirect()->action('DoctorController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
//		DB::table('doctors')->where('id','=',$id)->delete();
		$doctorfound=doctor::find($id);
		if(!empty($doctorfound)){
			$doctorfound->load(['diseases'=>function($query){
				$query->select('name');
			}]);
		}
		else{
			echo "ko tim thay";
		}
		return $doctorfound;
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$diseases=disease::all();
		$doctor=doctor::find($id);
		return view('editForm',compact('doctor','diseases'));
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $req)
	{
		//
		$disease_id=[];
		$disease_id=$req->input('disease_id');
		// foreach ($disease_id as $key) {
		// 	# code...
		// 	echo $key;
		// }
		$doctor=doctor::find($id);
		$doctor->name=$req->input('name');
		$doctor->diseases()->detach();
		$doctor->diseases()->attach($disease_id);
		$doctor->save();
		return redirect()->action('DoctorController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$doctor=doctor::find($id);
		$doctor->diseases()->detach();
		doctor::destroy($id1);
	}
}
