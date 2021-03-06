<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Requests\StoreEmployee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::cursor();
        return view(
            'employees.index',
            ['employees' => $employees]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        $data = $request->only(['EmployeeFullName', 'EmployeeNumber']);
        Employee::create($data);
        $request->session()->flash('status', 'Employee SuccessFully Registerd !!');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, $id)
    {
        $employee = Employee::find($id);
        $employee->EmployeeFullName = $request->input('EmployeeFullName');
        $employee->EmployeeNumber = $request->input('EmployeeNumber');

        $employee->save();
        $request->session()->flash('status', 'Employee SuccessFully Updated !!');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Employee::destroy($id);
        $request->session()->flash('status', 'Employee SuccessFully Deleted !!');
        return redirect()->route('employees.index');
    }
}
