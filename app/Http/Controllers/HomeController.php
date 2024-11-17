<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Haircuts;
use App\Works;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->createCL();

        return view('welcome', [
            'haircuts' => Haircuts::all()->toArray() ?? [],
            'works'    => Works::with('client')->with('haircut')->get()->toArray() ?? [],
        ]);
    }

    public function create()
    {

        $hair = Haircuts::firstWhere('id', request()->get('haircut_id'));

        $client = Clients::where([
            ['first_name', request()->get('first_name')],
            ['second_name', request()->get('second_name')],
            ['third_name', request()->get('third_name')],
        ])->first();

        if (!$client) {


            $client = Clients::create([
                'first_name' => request()->get('first_name'),
                'second_name' => request()->get('second_name'),
                'third_name' => request()->get('third_name'),
                'sex'       => $hair->sex,
            ]);

            $client->save();
        }

        $work = Works::create([
            'haircut_id' => request()->get('haircut_id'),
            'client_id' => $client->id,
        ]);

        $work->save();


        $count = Works::where('client_id', $client->id)->get()->count();

        if ($count > 4) {
            $client->has_discount = true;

            $client->save();
        }

        return redirect()->route('home');
    }

    public function createCL()
    {
        if(Haircuts::all()->count() > 0) return;

        \App\Haircuts::create([
            'cost' => 100,
            'name' => 'Haircut 1 male',
            'sex'  => 'male',
        ]);

        \App\Haircuts::create([
            'cost' => 200,
            'name' => 'Haircut 2 female',
            'sex'  => 'female',
        ]);

        \App\Haircuts::create([
            'cost' => 100,
            'name' => 'Haircut 3 male',
            'sex'  => 'male',
        ]);

        \App\Haircuts::create([
            'cost' => 250,
            'name' => 'Haircut 4 female',
            'sex'  => 'female',
        ]);
    }
}
