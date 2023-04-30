<?php

namespace App\Http\Controllers;

use App\Models\patientModel;
use Illuminate\Http\Request;

class patientController extends Controller
{
    public function index()
    {
        $patients = patientModel::all();
        return response()->json($patients);
    }  

    public function store(Request $request)
    {
        $patients = new patientModel([
            'name' => $request->input('name'),
            'sex' => $request->input('sex'),
            'religion' => $request->input('religion'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'nik' => $request->input('nik'),

        ]);
        $patients->save();
        return response()->json('Patient created!');
    }

    public function show($id)
    {
        $contact = patientModel::find($id);
        return response()->json($contact);
    }
    public function update(Request $request, $id)
    {
       $patients = patientModel::find($id);
       $patients->update($request->all());
       return response()->json('Patient updated');
    }

    public function destroy($id)
    {
        $patients = patientModel::find($id);
        $patients->delete();
        return response()->json(' deleted!');
    }
}
