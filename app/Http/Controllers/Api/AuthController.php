<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterPublisherRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Child;
use App\Models\Children;
use App\Models\Client;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function registerUser(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                "name"=>$request->name,
                "phone"=>$request->phone,
                "user_name"=>$request->user_name,
                "email"=>$request->email,
                "gender"=>$request->gender,
                "password"=> Hash::make($request->password),
            ]);

            foreach ($request->Child as $key => $children){
              $Children[$key] =  Child::create([
                    "name"=>$children['name'],
                    "age"=>$children['age'],
                    "user_name"=> $children['user_name'],
                    "password"=> Hash::make($children['password']),
                    "user_id" => $user->id
                ]);
            }
            $token = $user->createToken('API Token')->plainTextToken;

            DB::commit();
            return jsonResponse(['user'=>$user ,"Children"=>$Children,'token'=> $token],200);


        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json([null
                ],400,'يوجد مضكله حاول مره اخرى');
        }

    }
    public function registerPublisher(RegisterPublisherRequest $request)
    {
        try {
            DB::beginTransaction();
            $Publisher = Publisher::create([
                "name"=>$request->name,
                "phone"=>$request->phone,
                "user_name"=>$request->user_name,
                "email"=>$request->email,
                "password"=> Hash::make($request->password),
            ]);

            $token = $Publisher->createToken('API Token')->plainTextToken;

            DB::commit();
            return jsonResponse(['data'=>$Publisher ,'token'=> $token],200);

        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json([null
            ],400,'يوجد مضكله حاول مره اخرى');
        }

    }
    function login(Request $request)
    {
        if($request->type == 'publisher')
            $data = Publisher::where('user_name',$request->user_name)->first();
        elseif($request->type == 'child')
            $data = Child::where('user_name',$request->user_name)->first();
        else
            $data = User::where('user_name',$request->user_name)->first();

        if($data){
            if(Hash::check($request->password,$data->password)){
                $token = $data->createToken('API Token')->plainTextToken;

                return jsonResponse([
                    'token'=> $token,
                    'data'=> $data,
                ],'تم التسجيل بنجاح');
            }else
                return  errorResponse('هذه البيانات غير مطابقه');

        }else{
            return errorResponse('اسم المستخدم  او كلمة سر خاطئه');
        }
    }
    function profile()
    {
        if (!auth('user')->check()) {
            return jsonResponse(['Unauthorized'],200);
        }
        $user = User::where('id', auth()->user()->id)->with('children')->first();
        return jsonResponse(['data'=>$user],200);
    }
    function profile_publisher()
    {
        //'publisher'
        if (!auth()->check()) {
            return jsonResponse(['Unauthorized'],200);
        }
        $user = Publisher::where('id', auth()->user()->id)->with('books')->first();
        return jsonResponse(['data'=>$user],200);
    }

}

