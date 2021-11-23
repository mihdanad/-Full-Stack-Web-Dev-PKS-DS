<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\OtpCode;
use Illuminate\Http\Request;
// use App\Mail\OtpRegisterMail;
use App\Events\OtpStoredEvent;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $allRequest = $request->all();

        //set validation
        $validator = Validator::make($allRequest, [
            'name'   => 'required',
            'email' => 'required|unique:users,email|email',
            'username' => 'required|unique:users,username'
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create($allRequest);

        do {
            $random = mt_rand(100000, 999999);
            $check = OtpCode::where('otp', $random)->first();
        } while ($check);

        $now = Carbon::now();

        $otp_code = OtpCode::create([
            'otp' => $random,
            'valid_until' => $now->addMinutes(5),
            'user_id' => $user->id
        ]);


        //kirim otp ke email user tanpa event
        // Mail::to($otp_code->user->email)->send(new OtpRegisterMail($otp_code));

        //kirim otp ke email user dengan event
        event(new OtpStoredEvent($otp_code));



        return response()->json([
            'succes' => true,
            'message' => 'Data User Berhasil dibuat',
            'data' => [
                'user' => $user,
                'otp_code' => $otp_code
            ]
        ]);
    }
}
