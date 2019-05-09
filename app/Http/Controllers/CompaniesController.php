<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Transport\MailgunTransport;
use Illuminate\Support\Facades\Mail;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class CompaniesController extends Controller
{
    public function showCompanies(Request $request)
    {
        // list of companies
        //$companies = DB::select('SELECT * FROM companies ');
        $companies = DB::table('companies')->paginate(10);

        return view('companies.show', [
            'companies' => $companies
        ]);
    }

    public function addCompany(Request $request)
    {
        /*$this->validate($request, [
            'name' => 'required|max:255',
        ]);*/

        /*
        if (isset($_POST) && !empty($_POST)) {
            echo '<pre>';
            print_r($request->website);
            print_r($_POST);
            echo '</pre>';
            //exit;
        }
        */

        // add a new company
        if ($request->isMethod('post') && isset($request->name) && !empty($request->name)) {
            $insert = DB::insert('INSERT INTO companies SET `name`=?, email=?, logo=?, website=?', [
                $request->name,
                (isset($request->email) && !empty($request->email) ? $request->email : null),
                (isset($request->logo) && !empty($request->logo) ? $request->logo : null),
                (isset($request->website) && !empty($request->website) ? $request->website : null),
            ]);

            echo '<pre>';
            print_r($request->file());
            echo '</pre>';

            foreach ($request->file() as $file) {
                //foreach ($file as $f) {
                $file->move(storage_path('app/public'), time().'_'.$file->getClientOriginalName());
                //}
            }

            // storage/app/public

            //echo $insert;
            /*echo '<pre>';
            print_r($insert);
            print_r($_POST);
            echo '</pre>';
            echo '-------------';*/

            if ($insert) {
                // send email
                echo 'send mail';

                Mail::send('emails.newcompany', array('key' => 'value'), function($message)
                {
                    $message->to('phpdevops@gmail.com', 'Джон Смит')->subject('Add a new company on site!');
                });

                // storage/app/public
            }

            //return redirect('/companies');
        }

        return view('companies.add', [
            //'companies' => $companies
        ]);

    }
}