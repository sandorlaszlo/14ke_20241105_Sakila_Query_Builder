<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function actors()
    {
        //SELECT * FROM actor;
        // $actors = DB::table('actor')->get();
        // return view('actors', ['actors' => $actors]);

        // SELECT * from actor ORDER BY last_name
        $actors = DB::table('actor')
            // ->orderBy('last_name', 'desc')
            ->orderByDesc('last_name')
            ->get();

        // SELECT count(*) as count_of_actors from actor 
        $count = DB::table('actor')->count();

        return view('actors', ['actors' => $actors, 'count' => $count]);

    }

    public function categories()
    {
        $categories = DB::table('category')->get();
        return view('categories', ['categories' => $categories]);
    }

    // public function actorsByFirstName($firstName)
    public function actorsByFirstName(Request $request)
    {
        $firstName = $request->first_name;
        //SELECT * from actor WHERE first_name LIKE 'JOHNNY'
        $actors = DB::table('actor')
            ->where('first_name', 'LIKE', $firstName)
            ->get();
        
        return view('actors', ['actors' => $actors, 'count' => count($actors)]);
    }

    public function actorsByName($firstName, $lastName)
    {
        // SELECT * from actor WHERE first_name LIKE 'JOHNNY' and last_name LIKE 'CAGE'
        $actors = DB::table('actor')
            ->where('first_name', 'LIKE', $firstName)
            ->where('last_name', 'LIKE', $lastName)
            ->get();
        
        return view('actors', ['actors' => $actors, 'count' => count($actors)]);
    }

    public function countFirstNames()
    {
        // SELECT first_name, count(*) as count_of_actors  from actor GROUP BY first_name
        $actors = DB::table('actor')
            ->select('first_name')
            ->groupBy('first_name')
            ->get();
        dd($actors);
    }
}
