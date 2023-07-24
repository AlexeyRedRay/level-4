<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePeopleRequest;
use App\Models\Film;
use App\Models\Gender;
use App\Models\Homeworld;
use App\Models\People;
use App\Services\Images;

class ResourceController extends Controller
{
    protected $homeworlds;
    protected $genders;
    protected $films;

    public function __construct()
    {
        $this->homeworlds = Homeworld::pluck('name', 'id')->all();
        $this->genders = Gender::pluck('gender', 'id')->all();
        $this->films = Film::pluck('title', 'id')->all();
    }

    public function index()
    {
        $people = People::orderBy('id', 'desc')->paginate(10);
        return view('people', compact('people'));
    }

    public function create()
    {
        return view('create', [
            'homeworlds' => $this->homeworlds,
            'genders' => $this->genders,
            'films' => $this->films,]);
    }

    public function store(SavePeopleRequest $request)
    {
        $form_data = $request->safe()->except(['films.*', 'images.*', 'del-images']);
        $person = People::create($form_data);
        $person->films()->attach($form_data['films']);
        if ($request->file('images'))
        {
            $images = $request->file('images');
            Images::addImage($person, $images);
        }
        return redirect()->route('people.index');
    }

    public function show(string $id)
    {
        $person = People::findOrFail($id);
        return view('show', compact('person'));
    }

    public function edit(string $id)
    {
        $person = People::with('films', 'images')->findOrFail($id);
        $films_id = [];
        foreach ($person->films as $film)
        {
            $films_id[] = $film->id;
        }
        return view('edit', [
            'homeworlds' => $this->homeworlds,
            'genders' => $this->genders,
            'films' => $this->films,
            'person' => $person,
            'films_id' => $films_id]);
    }

    public function update(SavePeopleRequest $request, string $id)
    {
        $form_data = $request->safe()->except(['films.*']);
        $person = People::findOrFail($id);
        $person->films()->sync($form_data['films']);
        $person->update($form_data);
        if ($request->file('images'))
        {
            $images = $request->file('images');
            Images::addImage($person, $images);
        }

        if (!empty($form_data['del-images']))
        {
            $del_images = $form_data['del-images'];
            Images::delImage($person, $del_images);
        }
        return redirect()->route('people.show', $id);
    }

    public function destroy(string $id)
    {
        People::findOrFail($id)->delete();
        return redirect()->route('people.index');
    }
}
