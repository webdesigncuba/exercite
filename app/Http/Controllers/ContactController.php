<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index',[
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Http::get('https://restcountries.com/v3.1/all');
        $countries = $response->json();

        $callingCodes = [];

        foreach ($countries as $country) {
            if (isset($country['idd']['root']))  {
                $callingCodes[] = $country['idd']['root'];

            }
        }

        return view('contact.create', ['callingCodes' => $callingCodes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $code = $request->input('code');
        $number = $request->input('number');

        // Add data

        $person = new Contact();
        $person->code = $code;
        $person->number = $number;

        // save in BD
        $person -> save();
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact, $id)
    {
        $contacts = Contact::find($id);
        $response = Http::get('https://restcountries.com/v3.1/all');
        $countries = $response->json();

        $callingCodes = [];

        foreach ($countries as $country) {
            if (isset($country['idd']['root']))  {
                $callingCodes[] = $country['idd']['root'];

            }
        }
        return view('contact.edit',[
            'contacts' => $contacts,
            'callingCodes' => $callingCodes 
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact, $id)
    {
        $code = $request->input('code');
        $number = $request->input('number');

        // Add data

        $person = Contact::find($id);
        $person->code = $code;
        $person->number = $number;

        // save in BD
        $person -> update();
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact, $id)
    {
      // Contact for ID
      $person = Contact::find($id);
      $person->delete();
      return redirect()->route('contact.index');
    }
}
