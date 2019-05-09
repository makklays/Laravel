<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function showEmployees(Request $request)
    {
        $companies = DB::select('SELECT * FROM companies ');

        $employees = DB::select('SELECT * FROM employees ');

        return view('employees.show', [
            'employees' => $employees,
            'companies' => $companies
        ]);
    }

    public function addEmployee(Request $request)
    {
        // list of companies
        $companies = DB::select('SELECT * FROM companies ');

        // add a new employees
        if ($request->isMethod('post')) {
            $insert = DB::insert('INSERT INTO employees SET `lastname`=?, firstname=?, company_id=?, phone=?, email=?', [
                $request->lastname,
                $request->firstname,
                $request->company_id,
                (isset($request->email) && !empty($request->email) ? $request->email : null),
                (isset($request->phone) && !empty($request->phone) ? $request->phone : null),
            ]);

            return redirect('/employees');
        }

        return view('employees.add', [
            'companies' => $companies
        ]);
    }
}