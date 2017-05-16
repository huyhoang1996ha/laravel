<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\disease;
use App\doctor;
use App\patient;
use App\doctors_disease;
use Illuminate\Http\Request;
use DB;
use App\Repositories\DiseaseRepository;
class DiseaseController extends Controller {


	protected $diseaseRepository;
	public function __construct(DiseaseRepository $diseaseRepository ){
		$this->diseaseRepository=$diseaseRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$diseases=$this->diseaseRepository->all();
		return view('listdisease',compact('diseases'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('createDisease');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		//
		$name=$req->input('name');
		$major=$req->input('major');
		//$disease=disease::create(['name'=>$name,'major'=>$major]);
		$this->diseaseRepository->create(array($name,$major));
		return redirect()->route('disease.index');
	}	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id,Request $req)
	{
		//
		$id2=$req->id;
		$disease=disease::find($id2);
		return $disease;
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
		$disease=disease::find($id);
		return view('editDisease',compact('disease'));
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
		$disease= disease::find($id);
		$disease->name=$req->input('name');
		$disease->major=$req->input('major');
		$disease->save();
		return redirect()->route('disease.index');
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
		$disease=disease::find($id);
		$disease->doctors()->detach();
		disease::destroy($id);
	}
	public function getOne(Request $req){
		$doctor=doctor::find($req);
		foreach ($doctor->diseases as $key) {
			return $key->name;
		}
		
	}

}
