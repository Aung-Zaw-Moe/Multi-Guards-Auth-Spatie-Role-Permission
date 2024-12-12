<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('seller.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Dashboard()
    {
        return view('seller.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function SellerLogin(Request $request)
    {
        // dd($request->all());
        $check = $request->all();
        if (Auth::guard('seller')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('seller.dashboard')->with('error', 'Seller Login Successfully.');
        } else {
            return back()->with('error', 'Invalid Email or Password.');
        };
    }

    /**
     * Display the specified resource.
     */
    public function Sellerlogout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller_login_form')->with('error', 'Seller Logout Successfully.');
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
