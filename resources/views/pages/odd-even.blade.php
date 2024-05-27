@extends('layout')

@section('content')

<h2 class="mb-3">Enter a number to check if it is odd or even:</h2>

<div class="row justify-content-md-center">
    <div class=" col-sm-4">
        <form action="{{ route('oddEven') }}" method="get">
            <div class="input-group mb-3">
                <input
                    value="{{ $value }}"
                    type="number" 
                    min="0" 
                    class="form-control" 
                    name="number" 
                    placeholder="Enter a number" 
                    required
                >
                <button type="submit" class="btn btn-primary">Check</button>
            </div>
        </form>
    </div>
</div>

@if('' !== $result)
<div class="row justify-content-md-center">
    <div class=" col-sm-4">
        <div class="alert alert-info">Number is {{ $result }}</div>
    </div>
</div>
@endif

@include('partials.error', ['fieldName' => 'number'])

@endsection