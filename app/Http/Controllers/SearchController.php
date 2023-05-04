<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function searchView(Request $request){

        //dd(1);
        $users = DB::table('user')
        ->select('user.*', 'department.name as department_name', 'designation.name as designation_name')
        ->join('department', 'department.id', '=', 'user.fk_department')
        ->join('designation', 'designation.id', '=', 'user.fk_designation')
        ->get();

       // dd($users);
        return view('lilac.lilac', ['users' => $users]);
    }

    public function search(Request $request){

        //dd(1);
        //dd($request->query);

        $searchData = $request->input('query');
        
        //dd($searchData);
        $users = DB::table('user')
        ->select('user.*', 'department.name as department_name', 'designation.name as designation_name')
        ->join('department', 'department.id', '=', 'user.fk_department')
        ->join('designation', 'designation.id', '=', 'user.fk_designation')
        ->where('user.name', 'LIKE', '%' . $searchData . '%')
        ->orWhere('department.name', 'LIKE', '%' . $searchData . '%')
        ->orWhere('designation.name', 'LIKE', '%' . $searchData . '%')
        ->get();

        //return $users;
        $searchResults = view('lilac.search-results', compact('users'))->render();
        return response()->json(['searchResults' => $searchResults]);
    }
}
