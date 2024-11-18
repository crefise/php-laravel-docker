<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>haircut</title>
</head>
<body>
<div>
    <form method="POST" action="/works">
        @csrf <!-- {{ csrf_field() }} -->
        <h1>Haircuts list:</h1>
        @foreach($haircuts as $haircut)
            <div style="border: 1px black solid; margin-top: 10px">
                <div>
                    Haircut number: <b>{{$haircut['id']}}</b>
                </div>
                <div>
                    Haircut name: <b>{{$haircut['name']}}</b>
                </div>
                <div>
                    Haircut sex: <b>{{$haircut['sex']}}</b>
                </div>
            </div>
        @endforeach

        <h1>Create work:</h1>
        <div style="margin-top: 20px">
            <div><span>First name</span><input name="first_name" placeholder="Enter first name"></div>
            <div><span>Second name</span><input name="second_name" placeholder="Enter second name"></div>
            <div><span>Third name</span><input name="third_name" placeholder="Enter third name"></div>
            <div><span>Number of hair cut(see on the top of page)</span><input name="haircut_id" placeholder="Enter haircut number"></div>
            <button>Save</button>
        </div>
    </form>
</div>
<div>
    <h1>Works entries:</h1>
    @foreach ($works as $work)
        <div style="border: 1px black solid; margin-top: 10px">
            <div>
                Work code: <b>{{$work['id']}}</b>
            </div>
            <div>
                Haircut name: <b>{{$work['haircut']['name']}}</b>
            </div>
            <div>
                Haircut base cost: <b>{{$work['haircut']['cost']}}</b>
            </div>
            <div>
                Haircut cost: <b>{{$work['cost']}}</b>
            </div>
            <div>
                Haircut client full name: <b>{{$work['client']['first_name'] . ' ' . $work['client']['second_name'] . ' ' . $work['client']['third_name']}}</b>
            </div>
        </div>
    @endforeach
</div>

<div>
    <h1>Clients entries:</h1>
    @foreach ($clients as $client)
        <div style="border: 1px black solid; margin-top: 10px">
            <div>
                Client full name: <b>{{ $client['first_name'] . ' ' . $client['second_name'] . ' ' . $client['third_name']}}</b>
            </div>
            <div>
                Client sex: <b>{{ $client['sex'] }}</b>
            </div>
            <div>
                Number of haircuts: <b>{{ $client['haircut_count'] }}</b>
            </div>
            <div>
                Has discount: <b>{{ $client['has_discount'] ? 'yes' : 'no' }}</b>
            </div>
        </div>
    @endforeach
</div>

<div>
    <h1>MALE REGULAR entries:</h1>
    @foreach ($maleRegularClients as $maleRegularClient)
        <div style="border: 1px black solid; margin-top: 10px">
            <div>
                Client full name: <b>{{ $maleRegularClient['first_name'] . ' ' . $maleRegularClient['second_name'] . ' ' . $maleRegularClient['third_name']}}</b>
            </div>
            <div>
                Client sex: <b>{{ $maleRegularClient['sex'] }}</b>
            </div>
            <div>
                Number of haircuts: <b>{{ $maleRegularClient['haircut_count'] }}</b>
            </div>
            <div>
                Has discount: <b>{{ $maleRegularClient['has_discount'] ? 'yes' : 'no' }}</b>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
