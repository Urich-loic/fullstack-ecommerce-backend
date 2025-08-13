<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class contactController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function storeContact(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "message"=>"required",
        ]);

        date_default_timezone_get();
        $contact_date = date('d-m-y');
        $contact_time =

        $result = Contact::insert([
            "name"=>$request->name,
            "email"=>$request->email,
            "message"=>$request->message,
            "contact_time"=>Carbon::now()->diffForHumans(),
            "created_at"=>date('d-m-y')
        ]);

        return $result;
    }

}
