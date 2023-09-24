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
        // $department = Staff::create($request -> all());

        $staff = new Staff;
        $imagePath = $request->file('photo') -> store('public/staffs');
        $staff -> name = $request->name;
        $staff -> bio = $request->bio;
        $staff->photo = $imagePath;
        $staff -> salary_type = $request->salary_type;
        $staff -> salary_amount = $request->salary_amount;
        $staff -> department_id = $request->department_id;
        if($staff ->save()){
            return redirect()->route('staffIndex');
        }

      }

      public function show($id){
        $staff_info = Staff::find($id);
        return view('staffs.show' , ['staff_info' => $staff_info]);
       }

    }
