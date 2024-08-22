<?php

namespace App\Http\Controllers;

use DB;
use Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgetPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function forgotpassword(){
        return view('auth.forgotpassword');
    }

    public function forgotPasswordPost(ForgetPasswordRequest $request){
         $token = Str::random(64);

         DB::table('password_reset_tokens')->insert([
             'email' => $request->email,
             'token' => $token,
             'created_at' => Carbon::now()
         ]);

         Mail::send('auth.forgot-password-email', ['token' => $token], function($message) use($request){
             $message ->to($request->email);
             $message ->subject('Reset Password');
         }); 
        return redirect('/forgot-password')->with('status','An Email has been sent to you. Please check your Inbox');
    }

    // public function resetpassword(string $token){
    //     return view('auth.reset-password', ['token' => $token]);
    // }

    // public function resetpasswordpost(ResetPasswordRequest $request){
    //      $updatepassword = DB::table('password_reset_tokens')->where([
    //          'email' => $request->email,
    //          'token' => $request->token
    //      ])->first();

    //      if(!$updatepassword){
    //          return redirect('/reset-password/{token}')->with('error','Incorrect Values');
    //      }

    //      User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

    //      DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

    //      return redirect('login')->with('success','Password has been updated');

    // }
}
