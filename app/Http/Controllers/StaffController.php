<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        $staffs = Staff::all(); 
        return view('staffs.index' , ['staffs' => $staffs]);
       }
    
       public function create(){
        $departments = Department::all(); 
        return view('staffs.create', ['departments' => $departments]);
       }
    
       public function store(Request $request){
        $department = Staff::create($request -> all());
        if($department){
            return redirect()->route('staffIndex');
        }
      }}
