<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Add(Request $request){
        return view('add');
    }

    public function Create(Request $request){
        $contact = new Contact;
        $contact->type = $request->type;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->nation = $request->nation;
        $contact->wtd = $request->wtd;
        $contact->notes = $request->notes;
        $contact->rating = $request->rating;
        if($contact->save()){
            return redirect('/')->with('status', 'The '.$request->type.' has been created.');
        }
        return redirect('/add')->with('status','error');
    }

    public function Suppliers(Request $request){
        $contact = Contact::where('type','=','supplier');
        if(!empty($request->search)){
            $exp = explode(' ',$request->search);
            foreach ($exp as $k => $item) {
                if($k === 0) {
                    $contact->where('name', 'like', '%' . $item . '%')->orWhere('email', 'like', '%' . $item . '%')->orWhere('wtd', 'like', '%' . $item . '%')->orWhere('address', 'like', '%' . $item . '%')
                        ->orWhere('city', 'like', '%' . $item . '%');
                }
            }
        }
        $suppliers = $contact->get();
        return view('find',['type' => 'customer', 'rs' => $suppliers,'search' => $request->search]);
    }

    public function Customers(Request $request){
        $contact = Contact::where('type','=','customer');
        if(!empty($request->search)){
            $exp = explode(' ',$request->search);
            foreach ($exp as $k => $item) {
                if($k === 0) {
                    $contact->where('name', 'like', '%' . $item . '%')->orWhere('email', 'like', '%' . $item . '%')->orWhere('wtd', 'like', '%' . $item . '%')->orWhere('address', 'like', '%' . $item . '%')
                        ->orWhere('city', 'like', '%' . $item . '%');
                }
            }
        }
        $suppliers = $contact->get();
        return view('find',['type' => 'customer', 'rs' => $suppliers,'search' => $request->search]);
    }

    public function Query(Request $request){
        if(!empty($request->id)){
            $contact = Contact::find($request->id);
            return response()->json(['status' => 'success', 'html' => view('sections.contact-modal',['rs' => $contact,'edit' => $request->edit == 'y'])->render()]);
        }
        return abort(404,'ID unavailable');
    }
}
