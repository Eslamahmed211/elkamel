<?php

namespace App\Http\Controllers;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class authController extends Controller
{


  public function login(Request $request)
  {
    $data = $request->validate([
      "email" => "required|email",
      "password" => "required|string|min:8",
      // 'g-recaptcha-response' => 'required|captcha'

    ], [
      "g-recaptcha-response.required" => "الكابتشا مطلوبة",
      "password.required" => "كلمة المرور مطلوبة",
      "email.required" => "الايميل مطلوب",
      "email.email" => "هذة ليست صيغة ايميل" ,
      "password.min" => "يجب ان لا يقل كلمة المرور عن 8 ارقام" ,


    ]);

    unset($data["g-recaptcha-response"]);



    if (auth::attempt($data)) {

      $user = User::where('email', $data['email'])->first();



      if ($user->active  == 3) {
        Auth::logout();
        return Redirect("login")->withErrors("حسابك غير نشط")->withInput();
      } elseif ($user->active == 0) {
        Auth::logout();
        return redirect("login")->withErrors("تم تسجيل الحساب انتظر حتي يتم تفعيل الحساب خلال 24 ساعة")->withInput();
      } elseif ($user->active == 1) {
        auth::login(auth::user());

        return redirect("admin/home");
      } else {
        Auth::logout();
        return redirect("login")->withErrors("هناك خطأ ما يرجي التواصل معنا")->withInput();
      }
    } else {

      $user = User::where("email", $data["email"])->first();

      if ($user == null) {
        return redirect("login")->withErrors("هذا البريد ليس موجود")->withInput();
      } else {
        $passwordFromDb =  $user->password;

        if (!password_verify($data["password"], $passwordFromDb)) {
          return redirect("login")->withErrors("كلمة المرور غير صحيحة")->withInput();
        }
      }
    }
  }





  public function logout()
  {
    Auth::logout();

    return redirect('login');
  }

  public function changePasswoed(Request $request)
  {
    $data = $request->validate([
      "old" => "required|string",
      "password" => "required|string|min:8|max:32|confirmed",
    ], [
      "password.min" => "يجب ان لا تقل كلمة السر عن 8 حروف",
      "old.required" => "كلمة السر القديمة مطلوبة",
      "password.required" => "كلمة السر الجديدة مطلوبة",
      "password.confirmed" => "كلمة السر غير متطابقة",
    ]);

    try {

      if (password_verify($data['old'], auth()->user()->password)) {

        User::find(auth()->user()->id)->update([
          "password" => bcrypt($data['password'])
        ]);

        return Redirect::back()->with("success", "تم تغير كلمة السر بنجاح");
      } else {
        return Redirect::back()->with("error", "كلمة السر القديمة غلط");
      }
    } catch (\Throwable $th) {
      return Redirect::back()->with("error", "لا يمكن تغير كلمة السر");
    }
  }


}
