<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\client_database;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        // Get current date minus 5 years
        $threeYearsAgo = Carbon::now()->subYears(3);

        // Count companies registered within the last 3 years
        $totalCompaniesLast3Years = client_database::where('masa_berlaku', '>=', $threeYearsAgo)->count();

        // Count all registered companies
        $allCompaniesCount = client_database::count();

        // Calculate companies registered more than 3 years ago
        $olderCompaniesCount = $allCompaniesCount - $totalCompaniesLast3Years;

        return view('admin.dashboard', compact('totalCompaniesLast3Years', 'allCompaniesCount', 'olderCompaniesCount'));
    }
}
