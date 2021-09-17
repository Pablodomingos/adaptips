<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Movie;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\MoveWhitelistExcludesToCoverage;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class Moviecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search');

        if ($search) {
            //$countries = Country::where('country', 'like', '%'.$search.'%')->get();

            //$country = $movie->country->country;
            $movies = Movie::where('title', 'like', '%' . $search . '%')
                ->orWhere('genre', 'like', '%' . $search . '%')
                ->orWhere('release', 'like', '%' . $search . '%')
                //->orWhere($country,'like', '%'.$search.'%')
                ->orWhere('synopsis', 'like', '%' . $search . '%')
                ->orWhere('rating', 'like', '%' . $search . '%')
                ->get();

            if (count($movies) == 0) {
                $country = Country::where('country', $search)->first();
                if ($country == null) {
                    $movies = [];
                } else {
                    $movies = Movie::where('country_id', $country->id)->get();
                }
            }
        } else {
            $movies = Movie::all();
            //dd($movies);
        }

        return view('movies', compact('movies', 'search'));
        return view('movies', ['movies' => $movies, 'search' => $search]);

        foreach ($movies as $movies) {
            echo ($movies);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('createmovie', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if ($request->file('image')->isValid()){
            ($request->file('image')->store('movie'));
        }*/
        $data = $request->all();

        $data['image'] = $request->file('image')->store('movie', 'public');

        Movie::create($data);

        return redirect(route('movie.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $countries = Country::all();

        return view('editarmovie', compact('movie', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $movie = Movie::find($id);
        
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $movie->image);
            $data['image'] = $request->file('image')->store('movies', 'public');
        }

        $movie->update($data);

        return redirect(route('movie.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        Storage::delete('public/' . $movie->image);
        $movie->delete();
        return redirect(route('movie.index'));
    }
}
