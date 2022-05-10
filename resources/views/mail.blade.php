<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <table>
        @if(is_array($inputs))
            @foreach($inputs as $key => $field)
                <tr>
                    <td>{{ str_replace('_', ' ', ucfirst($key))  }} : </td>
                    <td> {{ $field }}</td>
                </tr>
            @endforeach
        @endif
    </table>
</body>
</html>