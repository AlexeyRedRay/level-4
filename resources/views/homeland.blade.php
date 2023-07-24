@extends('layouts.wrapper')

@section('title')Homeland Search @endsection

@section('content')
    <h1 class="text-center">Homeland Search</h1>

    <form method="post" action="{{route('homeland.search')}}" enctype="multipart/form-data" class="mb-5">
    @csrf
        <label for="homeworlds" class="form-label">select homeworlds</label>
        <select name="homeworld_id" class="form-select mb-2"  id="homeworlds" size="6" required>
            @foreach($homeworlds as $k => $v)
                <option value="{{$k}}">{{$v}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>

@if(isset($people))
    <h2>People from {{$homeworld}}</h2>
    @include('people-table')
@endif

@endsection
