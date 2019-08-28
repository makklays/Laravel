<?php

namespace App\Http\Controllers;

use App\Http\Requests\cvRequest;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     * [GET /cv]
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // list
    }

    /**
     * Show the form for creating a new resource.
     * [GET /cv/create]
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // add
    }

    /**
     * Store a newly created resource in storage.
     * [POST /cv]
     *
     * @param cvRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(cvRequest $request)
    {
        // insert in db
    }

    /**
     * Display the specified resource.
     * [GET /cv/{cv}]
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // view
    }

    /**
     * Show the form for editing the specified resource.
     * [GET /cv/{cv}/edit]
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // view
    }

    /**
     * Update the specified resource in storage.
     * [PUT/PATCH /cv/{cv}]
     *
     * @param cvRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cvRequest $request, $id)
    {
        // update in db
    }

    /**
     * Remove the specified resource from storage.
     * [DELETE /cv/{cv}]
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete in db
    }
}
