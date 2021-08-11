<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function showServices(Request $request){
        $services = DB::table('services');
        if(!empty($request->search)) {
            $services->whereRaw('name like ?',['%'.$request->search.'%']);
        }
        $services = $services->get();
        return view('services',['rs' => $services,'search' => $request->search]);
    }

    public function getServices(Request $request){
        $services = Service::get();
        $options = '<option value="">Select an option</option>';
        foreach ($services as $service) {
            $options .= '<option value="'.$service->id.'">'.$service->name.'</option>';
        }
        return $options;
    }

    public function addService(Request $request){
        if(!empty($request->name)){
            $service = new Service;
            $service->name = $request->name;
            if($service->save()){
                return response()->json(['status' => 'success']);
            }
            return response()->json(['status' => 'error', 'report' => 'Error while creating a new service']);
        }
        return response()->json(['status' => 'error', 'report' => 'No name']);
    }

    public function deleteService(Request $request){
        $service = Service::find($request->id);
        $service->delete();
        return response()->json(['status' => 'success']);
    }
}
