<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Specialty;
use App\Http\Controllers\Controller;


class SpecialtyController extends Controller
{

	public function __construct(){
	
		$this->middleware('auth');
	
	}

    public function index(){
    	$specialties = Specialty::all();
    	return view('specialties.index', compact('specialties'));
    }

    public function create(){
    	
    	return view('specialties.create');
    
    }

    private function performeValidation(Request $request){
        $rules = [
            'name' => 'required|min:3'
        ];
        $menssage = [
            'name.required' => "Es necesario ingresar nombre.",
            'name.min' => "Como mínimo el nombre debe de tener 3 caracteres.",
        ];

        $this->validate($request,$rules,$menssage);
    }

    public function store(Request $request){

    	//dd($request->all());
        $this->performeValidation($request);
    	$specialty = new Specialty();
    	$specialty->name=$request->input('name');
    	$specialty->description=$request->input('description');
    	$specialty->save();
        $notification="La especialidad se a registrado correctamente.";
    	return redirect('specialties')->with(compact("notification"));
    }



    public function edit(Specialty $specialty){

    	return view('specialties.edit', compact('specialty'));

    }

    public function update(Request $request, Specialty $specialty){

    	//dd($request->all());
    	$this->performeValidation($request);
    	$specialty->name=$request->input('name');
    	$specialty->description=$request->input('description');
    	$specialty->save(); //UPDATE
        $notification="La especialidad se a actualizado correctamente.";
    	return redirect('specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty){
        $deleteName= $specialty->name;
        $specialty-> delete();
        $notification="La especialidad ".$deleteName." se a eliminado correctamente.";
        return redirect('specialties')->with(compact('notification'));

    }

}
 