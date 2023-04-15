<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeFormRequest;
use App\Models\Employeedetail;
use App\Models\Companydetail;

class Employee extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee=Employeedetail::paginate(10);
       
        return view('employee.create',compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeFormRequest $request)
    {
        try{
            $data=$request->validated();
            $ci=$data['company'];
            $companyId=Companydetail::find($ci);
            if($companyId!=''){
                $employee = Employeedetail::create($data);
                return redirect('add_employee')->with('message', 'Employee details added successfully');
            }else{
                return redirect('add_employee')->with('errormsg', 'Invalid Company Id');
            }
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employeedetail::find($id);
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeFormRequest $request, $id)
    {
        try{
            $data=$request->validated();
            $ci=$data['company'];
            $companyId=Companydetail::find($ci);
            if($companyId!=''){
                $employee = Employeedetail::where('id',$id)->update([
                    'first_name'=>$data['first_name'],
                    'last_name'=>$data['last_name'],
                    'company'=>$data['company'],
                    'email'=>$data['email'],
                    'phone'=>$data['phone']
                ]);
                return redirect('add_employee')->with('message', 'Employee details updated successfully');
            }else{
                return redirect('add_employee')->with('errormsg', 'Invalid Company Id');
            }
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Employeedetail::find($id)->delete();
            return redirect('add_employee')->with('message', 'Employee details deleted successfully');
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
}
