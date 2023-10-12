<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\subject;

use Illuminate\Http\Request;

class Subject_Controller extends Controller
{
    public function index() {
        $subject = subject::all();
        if($subject->count()>0){
            return response()->json([
                'status' =>200,
                'subject'=>$subject
            ],200);
        }else{
            return response()->json([
             'status' =>404,
             'message'=>'No record found'
            ],404);
        }
    }

    

    public function store(Request $request){
        $validator =Validator::make($request->all(),[
            'Course_Name'=> 'required|string|max:191',
            'Course_Id' => ['required', 'digits:5']

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()],422);
            
        }else{
            $subject=subject::create([
                'Course_Name'=>$request->Course_Name,
                'Course_Id'=>$request->Course_Id,

            ]);
            if($subject){
                return response()->json([
                    'status'=>200,
                    'massage'=>"message created succefully",
                    "subject" => $subject
                ],200);
            }else{
                return response ()->json([
                    'status'=>500,
                    'message'=>'Something went wrong'
                ],500);
            }
        }
    }
    public function show($id){
        $subject = subject::find($id);
        if($subject){
            return response()->json([
                'status'=>200,
                'subject'=>$subject
            ],200);
        }else{
            return response ()->json([
                'status'=>500,
                'message'=>'Something went wrong'
            ],500);
        }
    }
    public function edit(Request $request, int $id){
        $subject = subject::all();
        if($subject->count()>0){
            return response()->json([
                'status' =>200,
                'subject'=>$subject
            ],200);
        }else{
            return response()->json([
             'status' =>404,
             'message'=>'No record found'
            ],404);
        }
    }

    public function update(Request $request,int $id){
        $validator =Validator::make($request->all(),[
            'Course_Name'=> 'required|string|max:191',
            'Course_Id'=> 'required|string|max:191',


        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()],422);
            
        }else{
            $subject = subject::find($id);
            
            $subject->update([ 
                'Course_Name'=>$request->Course_Name,
                'Course_Id'=>$request->Course_Id,

            ]);
            if($subject){
                return response()->json([
                   'status'=>200,
                    'massage'=>"message update succefully",
                    "subject" => $subject
                ],200);
            }else{
                return response ()->json([
                    'status'=>500,
                    'message'=>'Something went wrong'
                ],500);
            }
        }
    }
    public function destroy($id){
     $subject=subject::find($id);
     if($subject){
        $subject->delete();
        return response()->json([
            'status'=>200,
            'message'=>"Deleted subject Successfull!"
        ],200);
     }else{
        return response()->json([
            'stutes'=>404,
            'message'=>"No such subject found"
        ],404);
    }
    }
}
