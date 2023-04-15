<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyFormRequest;
use App\Models\Companydetail;
use Illuminate\Support\Facades\File;

class Company extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company=Companydetail::paginate(10);
       
        return view('company.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(CompanyFormRequest $request)
    {
        try{
        $data=$request->validated();
        $company=new Companydetail;
        $company->name=$data['name'];
        $company->email=$data['email'];
        $company->website=$data['website'];
        if($request->hasfile('logo')){
            $file=$request->file('logo');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->storeAs('public/',$filename);
            $company->logo=$filename;
        }
        $company->save();
        return redirect('add_company')->with('message', 'Company details added successfully');
        
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $company = Companydetail::find($id);
            return view('company.edit',compact('company'));
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyFormRequest $request, $id)
    {
        try{
            $data=$request->validated();
            $company = Companydetail::find($id);
            $company->name=$data['name'];
            $company->email=$data['email'];
            $company->website=$data['website'];
            if($request->hasfile('logo')){
                $oldfile = 'storage/'.$company->logo;
                if(File::exists($oldfile)){
                    File::delete($oldfile);
                }
                $file=$request->file('logo');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->storeAs('public/',$filename);
                $company->logo=$filename;
            }
            $company->update();
            return redirect('add_company')->with('message', 'Company details updated successfully');
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
            $company=Companydetail::find($id);
            $oldfile = 'storage/'.$company->logo;
            $company->delete();
            if(File::exists($oldfile)){
                File::delete($oldfile);
            }
            return redirect('add_company')->with('message', 'Company details deleted successfully');
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }catch(\Illuminate\Database\QueryException $ex) {
            if($ex->getCode() === '23000') {
               return redirect('add_company')->with('errormessage', 'Cannot be deleted, because there is a data');
            } 
         }
    }
}
