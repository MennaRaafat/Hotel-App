<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index(){
        $departments = Department::all(); 
        return view('departments.index' , ['departments' => $departments]);
       }
    
       public function create(){
        return view('departments.create');
       }
    
       public function store(Request $request){
        $department = Department::create($request -> all());
        if($department){
            return redirect()->route('departmentIndex');
        }
      }



}
