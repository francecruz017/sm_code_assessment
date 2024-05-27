@extends('layout')

@section('content')

<h2 class="mb-3">Enter a year to check if it is a leap year or not:</h2>

<div class="row justify-content-md-center">
    <div class=" col-sm-4">
        <form action="{{ route('leapYearChecker') }}" method="get">
            <div class="input-group mb-3">
                <input
                    value="{{ $value }}"
                    type="number" 
                    min="1800"
                    class="form-control" 
                    name="year" 
                    placeholder="Enter a number" 
                    required
                >
                <button type="submit" class="btn btn-primary">Check Year</button>
            </div>
        </form>
    </div>
</div>

@if('' !== $result)
<div class="row justify-content-md-center">
    <div class=" col-sm-4">
        <div class="alert alert-info">The Year {{ $value }} is {{ $result }}</div>
    </div>
</div>
@endif

@include('partials.error', ['fieldName' => 'year'])

@endsection