@extends('layout')

@section('content')
    <h2>Multiplication Table</h2>

    <table class="multiplication-table">
        @for ($i = 1; $i <= 10; $i++)
            <tr>
                @for ($j = 1; $j <= 10; $j++)
                    <td>{{ $i * $j }}</td>
                @endfor
            </tr>
        @endfor
    </table>
@endsection