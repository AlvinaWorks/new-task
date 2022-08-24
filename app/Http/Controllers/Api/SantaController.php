<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Santa;
use App\Models\User;
use Validator;

class SantaController extends Controller
{

    // get santa
    public function getSanta(Request $request)
    {
        $validations = [
            'name' => ['required','string','exists:users,name']
        ];
        $messages = [];
        $validator = Validator::make($request->toArray(), $validations,$messages);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'data' => null, 'message'=>$validator->errors()], 422);
        } else {
            $user = User::where('name',$request->name)->first();
            $santa = User::find(Santa::where('santa_id', $user->id)->first()->user_id);
            if (!$santa) {
                return response()->json(['status' => 'error', 'data' => null, 'message' => 'empty.'], 422);
            }
            return response()->json(['status' => 'success', 'data' => $santa], 200);
        }
    }

}
