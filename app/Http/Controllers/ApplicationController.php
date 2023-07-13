<?php

namespace App\Http\Controllers;

use App\Models\Intent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function applicationAdd()
    {
        $applications = DB::table('intents')
            ->leftJoin('properties', 'intents.property_id', '=', 'properties.id')
            ->leftJoin('units', 'intents.unit_id', '=', 'units.id')
            ->select('properties.name as propertyName', 'units.name as unitName', 'intents.status as intentStatus', 'intents.created_at as dateSubmitted')
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        // dd($applications);
        return view('application', compact('applications'));
    }

    public function applicationStore(Request $request)
    {
        // dd($request);
        // dd(Auth::user()->id);
        Intent::insert([
            'user_id' => Auth::user()->id,
            // 'user_name' => Auth::user()->name,
            // 'user_email' => Auth::user()->email,
            'property_id' => $request->property_id,
            'unit_id' => $request->unit_id,
            'contact_numbers' => json_encode($request->contact_numbers),
            'current_address' => $request->current_address,
            'partner' => $request->partner,
            'religion' => $request->religion,
            'employer' => $request->employer,
            'employer_address' => $request->employer_address,
            'employer_contact_number' => $request->employer_contact_number,
            'emergency_contact' => $request->emergency_contact,
            'emergency_contact_number' => $request->emergency_contact_number,
            'other_tenants_name' => json_encode($request->other_tenants_name),
            'status' => 'submitted',
            'created_at' => Carbon::now()
        ]);


        return Redirect()->route('dashboard');
    }
}
