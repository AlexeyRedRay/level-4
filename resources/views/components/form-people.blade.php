@props([
    'person' => null,
    'homeworlds',
    'genders',
    'films',
    'films_id' => null
])

    <div class="row mb-3">
        <div class="col">
            <label for="name" class="form-label">name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" required
                   @if($person) value="{{$person->name}}" @endif>
            @error('name')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col">
            <label for="hair_color" class="form-label">hair color</label>
            <input name="hair_color" type="text" class="form-control @error('hair_color') is-invalid @enderror" id="hair_color" required
                   @if($person) value="{{$person->hair_color}}" @endif>
            @error('hair_color')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label for="height" class="form-label">height</label>
            <input name="height" type="text" class="form-control  @error('height') is-invalid @enderror" id="height" required
                   @if($person) value="{{$person->height}}" @endif>
            @error('height')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col">
            <label for="mass" class="form-label">mass</label>
            <input name="mass" type="text" class="form-control  @error('mass') is-invalid @enderror" id="mass" required
                   @if($person) value="{{$person->mass}}" @endif>
            @error('mass')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col">
            <label for="birth_year" class="form-label">birth year</label>
            <input name="birth_year" type="text" class="form-control  @error('birth_year') is-invalid @enderror" id="birth_year" required
                   @if($person) value="{{$person->birth_year}}" @endif>
            @error('birth_year')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">

        <div class="col">
            <label for="homeworlds" class="form-label">select homeworlds</label>
            <select name="homeworld_id" class="form-select  @error('homeworld_id') is-invalid @enderror"  id="homeworlds" size="6" required>
                @foreach($homeworlds as $homeworld_id => $homeworld)
                    @if($person && $person->homeworld_id == $homeworld_id)
                        <option value="{{$homeworld_id}}" selected>{{$homeworld}}</option>
                    @else
                        <option value="{{$homeworld_id}}">{{$homeworld}}</option>
                    @endif
                @endforeach
            </select>
            @error('homeworld_id')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col">
            <label for="gender" class="form-label">select gender</label>
            <select name="gender_id" class="form-select  @error('gender_id') is-invalid @enderror" id="gender" size="6" required>
                @foreach($genders as $gender_id => $gender)
                    @if($person && $person->gender_id == $gender_id)
                        <option value="{{$gender_id}}" selected>{{$gender}}</option>
                    @else
                        <option value="{{$gender_id}}">{{$gender}}</option>
                    @endif
                @endforeach
            </select>
            @error('gender_id')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col">
            <label for="films" class="form-label">select films</label>
            <select name="films[]" class="form-select  @error('films') is-invalid @enderror" id="films" size="6" multiple required>
                @foreach($films as $film_id => $film)
                    @if($person && in_array($film_id, $films_id))
                        <option value="{{$film_id}}" selected>{{$film}}</option>
                    @else
                        <option value="{{$film_id}}">{{$film}}</option>
                    @endif
                @endforeach
            </select>
            @error('films')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="formFileMultiple" class="form-label">Add images</label>
            <input name="images[]" class="form-control" type="file" id="formFileMultiple" multiple>
        </div>
    </div>
