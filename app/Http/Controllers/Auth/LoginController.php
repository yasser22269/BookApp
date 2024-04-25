<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $providers = [
        // 'github',
        'facebook','google','twitter'
    ];


    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {


    //  try{

        //  DB::beginTransaction();

         $user = Socialite::driver($driver)->stateless()->user();
         $authUser = $this->findOrCreateUser($user, $driver);
         Auth::login($authUser, true);
         if($authUser->password == " "){
             return redirect()->route('profile')->with(['success' => '  تم التسجيل بنجاح يرجى ملئ باقى التسجيل' ]);
          }else
          return redirect($this->redirectTo)->with(['success' => 'تم التسجيل بنجاح']);


//   }catch (\Exception $ex) {
//       DB::rollback();
//       return redirect($this->redirectTo)->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
//   }

    }

    public function findOrCreateUser($user, $driver)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }

        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $driver,
            'provider_id' => $user->id,
            // 'avatar' => $user->avatar_original,
            'access_token' => $user->token,
            'password' => " ",
            'userLogin' => true,

        ]);
    }
    public function logoutWeb()
    {

        Auth::logout();
        // $gaurd->logout();

        return redirect()->url('/');
    }

    // private function getGaurd()
    // {
    //     return auth('web');
    // }
}
