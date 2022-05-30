<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AdminAddContact()
    {
        return view('admin.contact.create');
    }

    public function AdminStoreContact(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('admin.contact')->with('success', 'Contact Details Stored');
    }

    public function AdminEditContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function AdminUpdateContact(Request $request, $id)
    {
        Contact::findOrFail($id)->update($request->all());
        return redirect()->route('admin.contact')->with('success', 'Contact Details Stored');
    }

    public function AdminDeleteContact($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.contact')->with('success', 'Contact Details Stored');
    }

    public function Contact()
    {
        $contact = DB::table('contacts')->first();
        return view('pages.contact', compact('contact'));
    }

    public function ContactForm(Request $request)
    {
        ContactForm::create($request->all());
        return redirect()->route('contact')->with('success', 'Your Message Send Successfully');
    }

    public function AdminMessage(){
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }

    public function AdminDeleteMessage($id){
        ContactForm::findOrFail($id)->delete();
        return redirect()->route('admin.message')->with('success', 'Message Is Deleted Successfully');
    }
}
