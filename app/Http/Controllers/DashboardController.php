<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $address = $user->addresses->first();

    // Vérifiez si l'adresse existe, puis accédez à ses propriétés
    if ($address) {
        $street = $address->street;
        $city = $address->city;
        $country = $address->country;
    } 
        return view('dashboard', ['user' => $user, 'address' => $address]);
    }

}
