<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * На примере Сотрудников - простой пример перализации CRUD (Create Read Update Delete)
 **/
class EmployeesController extends Controller
{
    public function showEmployees()
    {
        // Only loggined
        if (!Auth::check()) return redirect('/');

        //$employees = DB::select('SELECT * FROM employees ');
        //$employees = DB::table('employees')->paginate(10);
        $employees = Employee::paginate(2);

        if (isset($employees) && !empty($employees)) {
            foreach ($employees as $k => &$emp) {
                // add Name of company
                if (isset($emp->company_id) && !empty($emp->company_id)) {
                    //$company = DB::selectOne('SELECT * FROM companies WHERE id=? ', [$emp->company_id]);
                    $company = Company::where('id', $emp->company_id)->first();

                    //dd($company);

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

    public function addEmployee(Request $request) // add customRequest ;)
    {
        // Only loggined
        if (!Auth::check()) return redirect('/');

        // list of companies
        //$companies = DB::select('SELECT * FROM companies ');
        $companies = Company::get();

        // add a new employees
        if ($request->isMethod('post')) {

            /*$insert = DB::insert('INSERT INTO employees SET `lastname`=?, firstname=?, company_id=?, phone=?, email=?', [
                $request->lastname,
                $request->firstname,
                $request->company_id,
                (isset($request->phone) && !empty($request->phone) ? $request->phone : null),
                (isset($request->email) && !empty($request->email) ? $request->email : null),
            ]);*/

            $employee = new Employee();
            $employee->firstname = $request->firstname;
            $employee->lastname = $request->lastname;
            $employee->company_id = $request->company_id;
            $employee->phone = (isset($request->phone) && !empty($request->phone) ? $request->phone : null);
            $employee->email = (isset($request->email) && !empty($request->email) ? $request->email : null);
            $employee->save();

            return redirect('/employees')->with([
                'flash_message' => 'Your employee, '.$request->lastname.' '.$request->firstname.' has been add successfully!',
                'flash_type' => 'success'
            ]);
        }

        return view('employees.add', [
            'companies' => $companies
        ]);
    }

    public function edit(Request $request, $id) // add CustomRequest :)
    {
        // Only loggined
        if (!Auth::check()) return redirect('/');

        if (!isset($id) || !empty($id)) redirect('/employees');

        // update data of company
        if ($request->isMethod('post') && isset($request->lastname) && !empty($request->lastname)) {

            /*DB::update('UPDATE `employees` SET `lastname`=?, `firstname`=?, `company_id`=?, `phone`=?, `email`=? WHERE id=?', [
                $request->lastname,
                $request->firstname,
                $request->company_id,
                (isset($request->phone) && !empty($request->phone) ? $request->phone : null),
                (isset($request->email) && !empty($request->email) ? $request->email : null),
                $id
            ]);*/

            $employee = Employee::where('id', $id);
            $employee->firstname = $request->firstname;
            $employee->lastname = $request->lastname;
            $employee->company_id = $request->company_id;
            $employee->phone = (isset($request->phone) && !empty($request->phone) ? $request->phone : null);
            $employee->email = (isset($request->email) && !empty($request->email) ? $request->email : null);
            $employee->save();

            return redirect('employees')->with([
                'flash_message' => 'Your employee, '.$request->lastname.' '.$request->firstname.' has been update successfully!',
                'flash_type' => 'success'
            ]);
        }

        // get companies
        //$companies = DB::select('SELECT * FROM companies ');
        $companies = Company::get();

        // get employee
        //$employee = DB::selectOne('SELECT * FROM employees WHERE id=?', [$id]);
        $employee = Employee::where('id', $id)->first();

        return view('employees.edit', [
            'employee' => $employee,
            'companies' => $companies
        ]);
    }

    public function delete($id)
    {
        // Only loggined
        if (!Auth::check()) return redirect('/');

        if (!isset($id) || empty($id)) {
            return redirect('employees')->with([
                'flash_message' => 'Error! Don\'t have ID in url',
                'flash_type' => 'danger'
            ]);
        }

        // get employee
        //$employee = DB::selectOne('SELECT * FROM employees WHERE id = ?', [$id]);
        $employee = Employee::where('id', $id)->first();

        // delete employee
        if (isset($employee) && !empty($employee)) {
            // fullname employee
            $fullname = $employee->lastname.' '.$employee->firstname;

            // delete empoyee
            //DB::delete('DELETE FROM employees WHERE id = ?', [$id]);
            Employee::where('id', $id)->delete();

            return redirect('employees')->with([
                'flash_message' => 'Your employee, '.$fullname.' has been delete successfully!',
                'flash_type' => 'success'
            ]);

        } else {
            return redirect('employees')->with([
                'flash_message' => 'Error! Employee don\'t exists!',
                'flash_type' => 'danger'
            ]);
        }
    }
}
