<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\PartnerLocator;
use App\Models\State;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCompanies( Request $request){
        sleep(2);
       
        $status  = $request->has('status') ? $request->status : null;
        $country = $request->has('country') ? $request->country : null;
        $state   = $request->has('state') ? $request->state : null;

        $companies = PartnerLocator::when($status, function($query) use ($status){
                                        return $query->where('status', $status);
                                    })
                                    ->when($country, function($query) use ($country){
                                        return $query->whereJsonContains('countries_covered', $country);
                                    })
                                    ->when($state, function($query) use ($state){
                                        return $query->whereJsonContains('states_covered', $state);
                                    })
                                    ->get();
                                    
        $states = null;
        if($country){
            $ctr = Country::where('short_name', $country)->first();
            $states = State::where('country_id', $ctr->country_id)->get();
        }
        
        return response()->json([
            'companies' => $companies,
            'states'    => $states
        ], 200);
    }


    public function searchCompanies( Request $request){
        $search = $request->has('keyword') ? $request->keyword : null;
        $companies = PartnerLocator::where('address', 'LIKE', '%'.$search.'%')->orWhere('company', 'LIKE', '%'.$search.'%')->get();
        return response()->json([
            'companies' => $companies,
            'states'    => null
        ], 200);
    }
}
