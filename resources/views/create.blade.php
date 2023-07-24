@extends('layouts.wrapper')

@section('title') Create @endsection



@section('content')
   <div class="row mt-5">
       <form method="post" action="{{route('people.store')}}" enctype="multipart/form-data">
           @csrf
            <x-form-people :homeworlds="$homeworlds"
                           :genders="$genders"
                           :films="$films"/>
           <button type="submit" class="btn btn-primary">submit</button>
       </form>
   </div>
@endsection
