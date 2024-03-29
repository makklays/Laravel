<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Mail\Transport\MailgunTransport;
use Illuminate\Support\Facades\Mail;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class CompaniesController extends Controller
{
    public function showCompanies(Request $request)
    {
        // Only loggined
        if (!Auth::check()) return redirect('/');

        // list of companies
        //$companies = DB::select('SELECT * FROM companies ');
        $companies = DB::table('companies')->paginate(10);

        if (isset($companies) && !empty($companies)) {
            foreach($companies as &$company) {
                $employees = DB::selectOne('SELECT count(id) as count FROM employees WHERE company_id=?', [$company->id]);
                //$employees = Employee::where('company_id', $company->id)->first();

                $company->count_employees = $employees->count;
            }
        }

        // dd( $companies );

        return view('companies.show', [
            'companies' => $companies,
        ]);
    }

    public function addCompany(Request $request) //
    {
        // Only loggined
        if (!Auth::check()) return redirect('/');

        // добавить customRequest вместо типа-интерфейса Request :) туда вынести валидацию с текстами ошибок сообщений
        /*$this->validate($request, [
            'name' => 'required|max:255',
        ]);*/

        // add a new company
        if ($request->isMethod('post') && isset($request->name) && !empty($request->name)) {

            $file = (isset($request->file()['logo']) && !empty($request->file()['logo']) ? $request->file()['logo'] : '');
            $filename = '';
            if (isset($file) && !empty($file)) {

                /*echo '<pre>';
                print_r($file);
                echo '</pre>';*/

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(storage_path('app/public'), $filename);
            }

            /*$insert = DB::insert('INSERT INTO companies SET `name`=?, email=?, logo=?, website=?', [
                $request->name,
                (isset($request->email) && !empty($request->email) ? $request->email : null),
                (isset($filename) && !empty($filename) ? $filename : null),
                (isset($request->website) && !empty($request->website) ? $request->website : null),
            ]);*/

            $compa = new Company();
            $compa->name = $request->name;
            $compa->email = $request->name;
            $compa->logo = $request->name;
            $compa->website = $request->name;
            $compa->save();

            if (isset($compa->id) && !empty($compa->id)) {
                //$company = DB::selectOne('SELECT * FROM companies WHERE id=?', [$insert['id']]);
                $company = Company::where('id', $compa->id)->first();

                // send email
                // тяжело протестировать локально - нужно выкласть на сервер
                /*Mail::send('emails.newcompany', array('company' => $company, 'pathToFile' => asset('storage/'.$company->logo.'')), function($message)
                {
                    $message->to('phpdevops@gmail.com', 'Джон Смит')->subject('Add a new company on site!');
                });*/
            }
            return redirect('companies')->with([
                'flash_message' => 'Your company, '.$request->name.' has been add successfully!',
                'flash_type' => 'success'
            ]);
        }

        return view('companies.add');
    }

    public function delete($id)
    {
        // Only loggined
        if (!Auth::check()) return redirect('/');

        if (isset($id) && !empty($id)) {

            // get company
            //$company = DB::selectOne('SELECT * FROM companies WHERE id = ?', [$id]);
            $company = Company::where('id', $id)->first();

            if (isset($company) && !empty($company)) {
                $fullname = $company->name;

                // delete company
                //DB::delete('DELETE FROM companies WHERE id = ?', [$id]);
                Company::where('id', $id)->delete();

                return redirect('companies')->with([
                    'flash_message' => 'Your company, '.$fullname.' has been delete successfully!',
                    'flash_type' => 'success'
                ]);

            } else {
                return redirect('companies')->with([
                    'flash_message' => 'Error! Company don\'t exists!',
                    'flash_type' => 'danger'
                ]);
            }
        }
    }

    public function edit(Request $request, $id) // использовать ф-ции store() и update() :)
    {
        // Only loggined
        if (!Auth::check()) return redirect('/');

        if (!isset($id) || !empty($id)) redirect('/companies');

        // simple upload image
        $file = (isset($request->file()['logo']) && !empty($request->file()['logo']) ? $request->file()['logo'] : '');
        $filename = '';
        if (isset($file) && !empty($file)) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(storage_path('app/public'), $filename);
        }

        // update data of company
        if ($request->isMethod('post') && isset($request->name) && !empty($request->name)) {

            if (isset($filename) && !empty($filename)) {
                /*DB::update('UPDATE `companies` SET `name`=?, `email`=?, `logo`=?, `website`=? WHERE id=?', [
                    $request->name,
                    (isset($request->email) && !empty($request->email) ? $request->email : null),
                    (isset($filename) && !empty($filename) ? $filename : null),
                    (isset($request->website) && !empty($request->website) ? $request->website : null),
                    $id
                ]);*/

                $company = Company::where('id', $id)->first();
                $company->name = $request->name;
                $company->email = (isset($request->email) && !empty($request->email) ? $request->email : null);
                $company->logo = (isset($filename) && !empty($filename) ? $filename : null);
                $company->website = (isset($request->website) && !empty($request->website) ? $request->website : null);
                $company->save();

            } else {

                /*DB::update('UPDATE `companies` SET `name`=?, `email`=?, `website`=? WHERE id=?', [
                    $request->name,
                    (isset($request->email) && !empty($request->email) ? $request->email : null),
                    (isset($request->website) && !empty($request->website) ? $request->website : null),
                    $id
                ]);*/

                $company = Company::where('id', $id)->first();
                $company->name = $request->name;
                $company->email = (isset($request->email) && !empty($request->email) ? $request->email : null);
                $company->website = (isset($request->website) && !empty($request->website) ? $request->website : null);
                $company->save();
            }
            return redirect('companies')->with([
                'flash_message' => 'Your company, '.$request->name.' has been add successfully!',
                'flash_type' => 'success'
            ]);
        }

        // get company
        //$company = DB::selectOne('SELECT * FROM companies WHERE id=?', [$id]);
        $company = Company::where('id', $id)->first();

        return view('companies.edit', [
            'company' => $company
        ]);
    }

    public function view(Request $request, $id) 
    {
        // Only loggined
        if (!Auth::check()) return redirect('/');

        if (!isset($id) || !empty($id)) redirect('companies');

        // get company
        //$company = DB::selectOne('SELECT * FROM companies WHERE id=?', [$id]);
        $company = Company::where('id', $id)->first();

        // count employee
        $persons = DB::selectOne('SELECT count(id) as count FROM employees WHERE company_id=?', [$id]);

        return view('companies.view', [
            'company' => $company,
            'count_employees' => $persons->count,
        ]);
    }
}
