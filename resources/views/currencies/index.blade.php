<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
</head>

<body>
    <div>
        <form action="{{ route('currencies.convert') }}" method="post">
            @csrf
            <input type="text" name="amount" />
            <select name="have">
                @foreach ($response_body->data as $item)
                    @if ($item->code == 'USD')
                    {{ $selected = 'selected' }}
                    @else
                        {{ $selected = '' }}
                    @endif
                    <option value="{{ $item->code }}" {{ $selected }}>{{ $item->code }} - {{ $item->name }}</option>
                @endforeach
            </select>
            <select name="want">
                @foreach ($response_body->data as $item)
                    <option value="{{ $item->code }}">{{ $item->code }} - {{ $item->name }}</option>
                @endforeach
            </select>
            <input type="submit" />
        </form>
    </div>
</body>

</html>
