<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'login';
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {

        if (!Auth::check()) {
            return redirect('/login');
        }

        if ($user->type_compte === "prestataire") {
            $notification = array(
                'message' => 'Connexion prestataire effectuée avec succès!',
                'alert-type' => 'success'
            );
            return redirect('/dossier-prestataires')->with($notification);
        } elseif ($user->type_compte === "beneficiaire") {
            $notification = array(
                'message' => 'Connexion bénéficiaire effectuée avec succès!',
                'alert-type' => 'success'
            );
            return redirect('/dossier-benefiaires')->with($notification);
        } elseif ($user->type_compte === "administrateur") {
            $notification = array(
                'message' => 'Connexion administrateur effectuée avec succès!',
                'alert-type' => 'success'
            );
            return redirect('/administrations')->with($notification);
        } elseif ($user->type_compte === "gestionnaire") {
            $notification = array(
                'message' => 'Connexion gestionnaire effectuée avec succès!',
                'alert-type' => 'success'
            );
            return redirect('/gestionnaires')->with($notification);
        }


    }

    protected function redirectTo($request)
    {
        return route('login');
    }


}
