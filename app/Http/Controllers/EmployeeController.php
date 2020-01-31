<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = 12;
        $employees = Employee::query();
        $paginator = $employees->paginate($pageSize);
        $paginationLinks = $paginator->links();
        $hasMoreResults = $paginator->hasMorePages();
        $resources = EmployeeResource::collection($paginator)->resolve();
        $pagination = [
            'results' => $resources,
            'count' => count($resources),
            'per_page' => $pageSize,
            'has_more' => $hasMoreResults,
            'html_links' => $paginationLinks,
        ];
        return view('employees.index')->with([
            'pagination' => $pagination,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = (new EmployeeResource(new Employee(session()->getOldInput())))->resolve();
    
        return view('employees.form')->with([
            'employee' => $employee,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employee = (new EmployeeResource($employee))->resolve();

        return view('employees.form')->with([
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->back()->with([
            'success' => __('El empleado <strong>:name</strong> se ha eliminado.', [ 'name' => $employee->name ])
        ]);
    }

    /**
     * Enable the specified resource from storage.
     *
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function enable(Employee $employee)
    {
        $employee->enabled = true;
        $employee->save();

        return redirect()->back()->with([
            'success' => __('El empleado <strong>:name</strong> se ha habilitado.', [ 'name' => $employee->name ])
        ]);
    }

    /**
     * Disable the specified resource from storage.
     *
     * @param  int  $employee
     * @return \Illuminate\Http\Response
     */
    public function disable(Employee $employee)
    {
        $employee->enabled = false;
        $employee->save();

        return redirect()->back()->with([
            'success' => __('El empleado <strong>:name</strong> se ha inhabilitado.', [ 'name' => $employee->name ])
        ]);
    }
}
