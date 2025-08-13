<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getVisitorDetails()
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];

        date_default_timezone_get();

        $visit_time = date('h:i:sa');
        $visit_date = date('d-m-y');

        $result = Visitor::insert([
            'ip_address'=>$ip_address,
            'visit_time'=>$visit_time,
            'visit_date'=>$visit_date
        ]);

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
