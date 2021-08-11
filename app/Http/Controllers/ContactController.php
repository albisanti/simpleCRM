<?php

namespace App\Http\Controllers;

use App\Exports\ContactExport;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
        $contact = DB::table('contacts')->whereRaw("type = 'supplier'");
        if(!empty($request->search)){
            $exp = explode(' ',$request->search);
            foreach ($exp as $k => $item) {
                if($k === 0) {
                    $contact->whereRaw('(name like ? or email like ? or wtd like ? or address like ? or city like ?)',
                        ['%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%']);
                } else {
                    $contact->whereRaw('(name like ? or email like ? or wtd like ? or address like ? or city like ?)',
                        ['%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%']);
                }
            }
        }
        $suppliers = $contact->get();
        return view('find',['type' => 'supplier', 'rs' => $suppliers,'search' => $request->search]);
    }

    public function Customers(Request $request){
        $contact = DB::table('contacts')->whereRaw("type = 'customer'");
        if(!empty($request->search)){
            $exp = explode(' ',$request->search);
            foreach ($exp as $k => $item) {
                if($k === 0) {
                    $contact->whereRaw('(name like ? or email like ? or wtd like ? or address like ? or city like ?)',
                    ['%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%']);
                } else {
                    $contact->whereRaw('(name like ? or email like ? or wtd like ? or address like ? or city like ?)',
                        ['%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%']);
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

    public function UpdateContact(Request $request){
        if(!empty($request->datas['id'])){
            $contact = Contact::find($request->datas['id']);
            $contact->name = $request->datas['name'];
            $contact->email = $request->datas['email'];
            $contact->address = $request->datas['address'];
            $contact->city = $request->datas['city'];
            $contact->nation = $request->datas['nation'];
            $contact->wtd = $request->datas['wtd'];
            $contact->notes = $request->datas['notes'];
            $contact->rating = $request->datas['rating'];
            if($contact->save()){
                return response()->json(['status' => 'success']);
            }
            return response()->json(['status' => 'error','report' => "Can't update the contact. Please retry in a few minutes"]);
        }
        return abort(404,'ID unavailable');
    }

    public function DeleteContact(Request $request){
        if(!empty($request->id)){
            $contact = Contact::find($request->id);
            if($contact->delete()){
                return response()->json(['status' => 'success']);
            }
            return response()->json(['status' => 'error','report' => "Can't delete the contact. Please retry in a few minutes"]);
        }
        return abort(404,'ID unavailable');
    }

    public function export(Request $request){
        $contact = DB::table('contacts')->whereRaw("type = ?",[$request->type]);
        if(!empty($request->search)){
            $exp = explode(' ',$request->search);
            foreach ($exp as $k => $item) {
                if($k === 0) {
                    $contact->whereRaw('(name like ? or email like ? or wtd like ? or address like ? or city like ?)',
                        ['%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%']);
                } else {
                    $contact->whereRaw('(name like ? or email like ? or wtd like ? or address like ? or city like ?)',
                        ['%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%','%'.$item.'%']);
                }
            }
        }
        $suppliers = $contact->select(['id','type','name','email','address','city','nation','wtd','notes'])->get();

        return Excel::download(new ContactExport($suppliers),$request->type.'.xlsx');
    }

}
