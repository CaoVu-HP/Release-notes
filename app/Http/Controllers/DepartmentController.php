<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Version;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        if(count($request->all()) == 0) {
            $department = Department::all();

           return view('department.department', compact('department'));
        }else
        {
            $department=Department::where(['name'=> ['$regex' => "$request->name"]])->get();
            return view('department.department',compact('department'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'responsibility' => 'required',
        ]);
        $department = new Department();
        $department ->name  =$request['name'];
        $department ->responsibility  =$request['responsibility'];
        $department->save();
        return redirect('/departments')->with('message','Department has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     */
    public function show($id)
    {
        $department= Department::find($id);
        return view('department.departmentEdit',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'responsibility' => 'required',
        ]);
        $department=Department::find($request->id);
        $department ->name  =$request['name'];
        $department ->responsibility  =$request['responsibility'];
        $department->save();
        return redirect('/departments')->with('message','Department has been update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department

     */
    public function destroy($id)
    {
        Department::where('_id', $id)->first()->delete();
        return redirect('/departments')->with('message','Department has been Deleted successfully');
    }
    public function detail($id)
    {
        $department= Department::find($id);
        $employees=Version::whereIn('_id', $department->user_id)->get();
        return view('department.departmentDetail',compact('department','employees'));
    }
}
