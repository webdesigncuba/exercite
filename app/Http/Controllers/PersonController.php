<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = Person::all();
        return view('person.index',[
            'persons' => $persons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = Contact::all();
        return view('person.create',[
            'contacts' => $contacts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate

        $validated = $request->validate([
            'email' => 'required|unique:person',
        ]);

        // Generar Avatar

        $name = $request->input('name'); // Nombre para el avatar
        $size = 40; // Tamaño del avatar en píxeles
        $background = 'FF0000'; // Color de fondo en formato hexadecimal
        $color = 'FFFFFF'; // Color del texto en formato hexadecimal
        $avatarUrl = asset("https://ui-avatars.com/api/?name=".urlencode($name)."&size=".$size."&background=".$background."&color=".$color);
        
        // Capturando los datos
        //$name = $name;
        $email = $request->input('email');
        $contac = $request->input('contact_id');
        $avatar = $avatarUrl;
        

        // Add data
        $person = new Person();
        $person->name = $name;
        $person->email = $email;
        $person->contact_id = $contac;
        $person->avatar = $avatarUrl;

        // save in BD
        $person -> save();
        return redirect()->route('person.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person, $id)
    {
        $persons = Person::with('contact')->find($id);

        return view('person.detail',[
            'persons' => $persons
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person, $id)
    {
        $persons = Person::find($id);
        $contacts = Contact::all();
        return view('person.edit',[
            'persons' => $persons,
            'contacts' => $contacts

        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $contac = $request->input('contact_id');


        // Add data

        $person = Person::find($id);
        $person->name = $name;
        $person->email = $email;
        $person->contact_id = $contac;

        // save in BD
        $person->update();
        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Person for ID
        $person = Person::find($id);
        $person->delete();
        return redirect()->route('person.index');
    }
}
