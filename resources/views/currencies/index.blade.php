<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        @if( Session::get('page_title') )
            {{ Session::get('page_title') }} | Laravel Currency Application
        @else
            Laravel Currency Application
        @endif
    </title>
</head>

<body>
    @if(Session::get('convert_response'))
        <div>
            {{ Session::get('convert_response')->old_amount }} {{ Session::get('convert_response')->old_currency }}
            =
            {{ Session::get('convert_response')->new_amount }} {{ Session::get('convert_response')->new_currency }}
        </div>
    @endif
    <div>
        <form action="{{ route('currencies.convert') }}" method="post">
            @csrf
            @if(Session::get('convert_response'))
                <input type="text" name="amount" value="{{ Session::get('convert_response')->old_amount }}"/>
            @else
                <input type="text" name="amount"/>
            @endif
            <select name="have">
                @foreach ($response_body->data as $currency)
                    @if ($currency->code == 'USD')
                        {{ $selected = 'selected' }}
                    @else
                        {{ $selected = '' }}
                    @endif
                    <option value="{{ $currency->code }}" {{ $selected }}>{{ $currency->code }} - {{ $currency->name }}</option>
                @endforeach
            </select>
            <select name="want">
                @foreach ($response_body->data as $currency)
                    <option value="{{ $currency->code }}">{{ $currency->code }} - {{ $currency->name }}</option>
                @endforeach
            </select>
            <input type="submit" />
        </form>
    </div>
</body>

</html>
