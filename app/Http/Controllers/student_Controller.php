<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\student;
use Illuminate\Http\Request;



class student_Controller extends Controller
{
    public function index() {
        $students = student::all();
        if($students->count()>0){
            return response()->json([
                'status' =>200,
                'students'=>$students
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
            'name'=> 'required|string|max:191',
            'course'=> 'required|string|max:191',
            'email'=> 'required|string|email|max:191',
            'phone'=> 'required|digits:10',


        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()],422);
            
        }else{
            $students=student::create([
                'name'=>$request->name,
                'course'=>$request->course,
                'email'=>$request->email,
                'phone'=>$request->phone,

            ]);
            dd($students);
            if($students){
                return response()->json([
                    'status'=>200,
                    'massage'=>"message created succefully",
                    "students" => $students
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
        $students = student::find($id);
        if($students){
            return response()->json([
                'status'=>200,
                'student'=>$students
            ],200);
        }else{
            return response ()->json([
                'status'=>500,
                'message'=>'Something went wrong'
            ],500);
        }
    }
    public function edit(Request $request, int $id){
        $students = student::all();
        if($students->count()>0){
            return response()->json([
                'status' =>200,
                'students'=>$students
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
            'name'=> 'required|string|max:191',
            'course'=> 'required|string|max:191',
            'email'=> 'required|string|email|max:191',
            'phone'=> 'required|digits:10',


        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()],422);
            
        }else{
            $students = student::find($id);
            
            $students->update([
                'name'=>$request->name,
                'course'=>$request->course,
                'email'=>$request->email,
                'phone'=>$request->phone,

            ]);
            if($students){
                return response()->json([
                    'status'=>200,
                    'massage'=>"message update succefully",
                    "students" => $students
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
     $students=student::find($id);
     if($students){
        $students->delete();
        return response()->json([
            'status'=>200,
            'message'=>"Deleted student Successfull!"
        ],200);
     }else{
        return response()->json([
            'stutes'=>404,
            'message'=>"No such Student found"
        ],404);
    }
    }
}
