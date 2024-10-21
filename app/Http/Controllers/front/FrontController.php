<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client_database;

class FrontController extends Controller
{
    public function index()  {
        $client_databases = client_database::get();

        return view('front.index', compact('client_databases'));
    }

    public function search2(Request $request) {
        // Get the search2 input from the request
        $search2 = $request->input('search2');
    
        // If there is a search2 term, filter the records by 'no_sertifikat' or 'entitas_usaha'
        $client_databases = client_database::when($search2, function ($query2, $search2) {
            return $query2->where('no_sertifikat', 'like', "%{$search2}%")
                         ->orWhere('entitas_usaha', 'like', "%{$search2}%");
        })->get();
    
        // Return the view with the filtered records and the search2 query (to keep it in the search2 box)
        return view('front.index', compact('client_databases', 'search2'));
    }
}
