<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class department extends Controller
{
    public function department_store(Request $request){
        $validator =Validator::make($request->all(),[
            'Department_Name'=> 'required|string|max:191',

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()],422);
            
        }else{
            $department=department::create([
                'Department_Name'=>$request->department_Name,
                'student_id'=>$request->student_id

            ]);
            if($department){
                return response()->json([
                    'status'=>200,
                    'massage'=>"message created succefully",
                    "students" => $department
                ],200);
            }else{
                return response ()->json([
                    'status'=>500,
                    'message'=>'Something went wrong'
                ],500);
            }
        }
    }
}
