<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class HomeController extends Controller
{
    public function index(){
        //$countries = Country::withCount('states')->paginate(10);
        $cities = City::with('country')->paginate(10);
        return view('data.country', compact('cities'));
    }
    function fetch_data(Request $request){
        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cities = City::with('states.country')->where('name', 'like', '%'.$query.'%')
                        ->orderBy($sort_by, $sort_type)
                        ->paginate(10);
            return view('data.pagination_data', compact('cities'))->render();
        }
    }
}
