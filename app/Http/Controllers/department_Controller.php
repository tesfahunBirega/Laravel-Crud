<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\department;
use Illuminate\Http\Request;

class department_Controller extends Controller
{
    public function index(){
        $departments = department::all();
        if($departments->count()>0){
            return response()->json([
                'status' =>200,
                'department' =>$departments
            ],200);
        }else{
            return response() ->json([
                'status' =>404,
                'message' =>'No record found'
            ],404);
        }
       

    }
    public function department_store(Request $request){
        $validator =Validator::make($request->all(),[
            'Department_Name'=> 'required|string|max:191'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()],422);
            
        }else{
            $department=department::create([
                'Department_Name'=>$request->Department_Name,
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
    public function show($id){
        $department =  department::find($id);
        if($department){
            return response()->json([
                'status' =>200,
                'department' =>$department
            ],200);

        }else{
            return response ()->json([
                'status' =>500,
                'message' =>'Something went wronge'
            ],500);
        }
    }
    public function update(Request $request,int $id){
        $validator =Validator::make($request->all(),[
            'Department_Name'=> 'required|string|max:191'
            
        ]);
        if($validator->fails()){
            return response()->json([
                'status' =>422,
                'error' =>$validator->message()],422
            );
        }else{
            $departments =department::find($id);

            // $departments->Department_Name = $request->Department_Name;
            // $departments->save();

            $departments ->update([
                'Department_Name'=>$request->Department_Name
            ]);

            if($departments){
                return response()->json([
                    'status'=>200,
                    'message'=>'Message Update Successfully!!',
                    'Department' =>$departments

                ],200);
            }else{
                return response ()->json([
                    'status'=>500,
                    'message' =>'Something went wronge',
                    'Department' =>$departments
                ],500);
            }
        }

    }
    public function destroy($id){
        $department = department::find($id);
        if($department){
            $department->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Delete Department Successfully'
            ],200);

        }else{
            return response()->json([
                'status'=>404,
                'message'=>'No Such student Department'
            ],404);
        }

    }

}
