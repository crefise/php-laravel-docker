<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>haircut</title>
</head>
<body>
<div>
    <h1>Peace of hair</h1>
</div>
<div>
    <form method="POST" action="/works">
        @csrf <!-- {{ csrf_field() }} -->
        @foreach($haircuts as $haircut)
            <div style="border: 1px black solid; margin-top: 10px">
                <div>
                    Haircut number: <span>{{$haircut['id']}}</span>
                </div>
                <div>
                    Haircut name: <span>{{$haircut['name']}}</span>
                </div>
                <div>
                    Haircut sex: <span>{{$haircut['sex']}}</span>
                </div>
            </div>
        @endforeach
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
    @foreach ($works as $work)
        <div style="border: 1px black solid; margin-top: 10px">
            <div>
                Haircut name: <span>{{$work['haircut']['name']}}</span>
            </div>
            <div>
                Haircut cost: <span>{{$work['haircut']['cost']}}</span>
            </div>
            <div>
                Haircut client full name: <span>{{$work['client']['first_name'] . $work['client']['second_name'] . $work['client']['third_name']}}</span>
            </div>
            <div>
                Client has discount: <span>{{$work['client']['has_discount'] }}</span>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
