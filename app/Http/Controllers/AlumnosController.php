<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlumnosDB;

class AlumnosController extends Controller
{

    public function Register(REQUEST $request){
        $validated = $request->validate([
            'name'=>'required',
            'promedio'=>'required',
            'universidad'=>'required'
        ]);
        if(!$validated){
            return response()->json([
                'message'=>'Error'
            ],400);
        }
        else{
         $DB = new AlumnosDB();
         $DB->Nombre = (string) $request->name;
         $DB->Promedio = $request->promedio;
         $DB->Universidad = (string) $request->universidad;
         $DB->save();

         return response()->json([
            'message'=>'Success'
        ],200);

        }
    }

    public function Update(REQUEST $request,$id){
        $validated = $request->validate([
            'name'=>'required',
            'promedio'=>'required',
            'universidad'=>'required'
        ]);
        if(!$validated){
            return response()->json([
                'message'=>'Error'
            ],400);
        }
        else{
        $DB = AlumnosDB::where('id', $id)->first();
         $DB->Nombre = (string) $request->name;
         $DB->Promedio = $request->promedio;
         $DB->Universidad = (string) $request->universidad;
         $DB->save();

         return response()->json([
            'message'=>'Success'
        ],200);

        }
    }

    public function Delete($id){
       
        $DB = AlumnosDB::where('id', $id)->first()->delete();
         return response()->json([
            'message'=>'Success'
        ],200);

        
    }

    public function Get(){
       
        $DB = AlumnosDB::all();
         return response()->json([
            'data'=>$DB,
            'message'=>'Success'
        ],200);

        
    }

}
