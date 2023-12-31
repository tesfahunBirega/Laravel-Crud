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
            'department_id' => ['required', 'digits:1'],
            'subject_id' => 'array' // Assuming subject_ids is an array of subject IDs

            

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
                'department_id'=>$request->department_id,
            ]);
            // return $request->input('subject_id');
            if($students){
                if ($request->has('subject_id')) {
                    $students->subject()->attach($request->input('subject_id'));
                }
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
        $students = student::where('id',$id)->with("department")->first();
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
