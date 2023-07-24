@extends('layouts.wrapper')

@section('title') Edit @endsection

@section('content')
    <div class="row mt-5">
        <form method="post" action="{{route('people.update', $person->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form-people :person="$person"
                           :homeworlds="$homeworlds"
                           :genders="$genders"
                           :films="$films"
                           :films_id="$films_id"/>

            @if(!$person->images->isEmpty())
                <p class="fs-2">mark the images to delete:</p>
                <div class="row">
                    @foreach($person->images as $image)
                        <div class="col">
                            <input name="del-images[]" class="form-check-input" type="checkbox" value="{{$image->name}}">
                            <img class="img-fluid" src="{{asset("/storage/images/$image->name")}}">
                        </div>
                    @endforeach
                </div>
            @endif

            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
@endsection
