<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\patient;
use App\disease;
use App\doctor;
use DB;
use Illuminate\Database\Eloquent\Builder;
use  Illuminate\Support\Collection;

class PatientController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		
		$patients=patient::with('disease.doctors')->get();
		
		return view('listpatient')->with('patients',$patients);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$diseases=disease::all();
		return view('createPatient',compact('diseases'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		//

		$id=$req->input('disease_id');
		$disease=disease::find($id);
		$patient = new patient;
		$patient->name=$req->input('name');
		$patient->age=$req->input('age');
		$patient->disease()->associate($disease);
		$patient->save();
		return redirect()->action('PatientController@index');
	
		
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
		echo'thanh cong';
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
		$patient=patient::find($id);
		$diseases=disease::all();
		return view('editPatient',compact('patient','diseases'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $req,$id)
	{
		//
		$patient=patient::find($id);
		$patient->name=$req->input('name');
		$patient->age=$req->input('age');
		$disease_id=$req->input('disease_id');
		$disease=disease::find($disease_id);
		$patient->disease()->associate($disease);
		$patient->save();
		return redirect()->action('PatientController@index');
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
		patient::destroy($id);
		
	}
	public function getMyDoctor(){
		$patient=patient::find(3);
		$disease_id=$patient->disease->id;
		$disease=disease::find($disease_id);
		foreach ($disease->doctors as $doctor) {
			# code...
			echo $doctor->name;
		}
	}
}
