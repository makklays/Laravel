<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function showEmployees(Request $request)
    {
        //$employees = DB::select('SELECT * FROM employees ');
        $employees = DB::table('employees')->paginate(10);

        if (isset($employees) && !empty($employees)) {
            foreach ($employees as $k => &$emp) {
                // add Name of company
                if (isset($emp->company_id) && !empty($emp->company_id)) {
                    $company = DB::selectOne('SELECT * FROM companies WHERE id=? ', [$emp->company_id]);
                    $emp->company = $company->name;
                } else {
                    $emp->company = '';
                }
            }
        }

        return view('employees.show', [
            'employees' => $employees,
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