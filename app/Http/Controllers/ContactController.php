<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show(){
        $contact = Contact::all()->where('user_id',auth()->id());
        return view('admin.contact.show',[
            'contacts' => $contact
        ]);
    }

    public function store(){
        $attributes = \request()->validate([
            'text' => 'required',
            'name' => 'required',
            'address' => 'required',
            'email' => ['required','email']
        ]);

        $attributes['user_id'] = auth()->id();

        if (Contact::all()->where('user_id',auth()->id())->count() === 0){
            Contact::create($attributes);
            return back();
        }
        return back()->with('success','You cannot create more than 1 contact');
    }

    public function edit(Contact $contact){
        $this->authorize('checkOwner',$contact);
            return view('admin.contact.edit', [
                'contact' => $contact
            ]);
    }

    public function update(Contact $contact){
        $attributes = \request()->validate([
            'text' => 'required',
            'name' => 'required',
            'address' => 'required',
            'email' => ['required','email']
        ]);

        $contact->update($attributes);
        return back();
    }

    public function destroy(Contact $contact){
        $this->authorize('checkOwner',$contact);
        $contact->delete();
        return back();
    }
}
