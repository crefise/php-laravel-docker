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
        return view('welcome', [
            'haircuts' => Haircuts::all()->toArray() ?? [],
            'works'    => Works::with('client')->with('haircut')->get()->toArray() ?? [],
        ]);
    }

    public function create()
    {
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
}
