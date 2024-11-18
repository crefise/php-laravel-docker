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
            'clients'  => Clients::all()->map(function ($client) {
                $client['haircut_count'] = Works::where('client_id', $client->id)->count();
                return $client;
            })->toArray(),
            'maleRegularClients' => Clients::where('sex', 'male')->where('has_discount', true)->get()
        ]);
    }

    public function create()
    {

        $hair = Haircuts::firstWhere('id', request()->get('haircut_id'));

        $client = Clients::where([
            ['first_name', request()->get('first_name')],
            ['second_name', request()->get('second_name')],
            ['third_name', request()->get('third_name')],
            ['sex', $hair->sex]
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
            'cost' => $client->has_discount ? $hair->cost * 0.97 : $hair->cost,
            'client_id' => $client->id,
        ]);

        $work->save();


        $count = Works::where('client_id', $client->id)->get()->count();

        if ($count > 3) {
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
            'name' => 'Male superman haircut',
            'sex'  => 'male',
        ]);

        \App\Haircuts::create([
            'cost' => 150,
            'name' => 'Male superwoman haircut',
            'sex'  => 'female',
        ]);

        \App\Haircuts::create([
            'cost' => 10,
            'name' => 'Easy cut for male',
            'sex'  => 'male',
        ]);

        \App\Haircuts::create([
            'cost' => 3,
            'name' => 'Easy cut for female',
            'sex'  => 'female',
        ]);
    }
}
