<?php

namespace See\Http\Controllers\Auth;

use See\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use See\Models\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return config('ldap_auth.usernames.eloquent');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string|regex:/^\w+$/',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $username = $credentials[$this->username()];
        $password = $credentials['password'];

        $data = json_encode(array('user' => $username, 'pass' => $password));

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, "http://api1.sinprosp.org.br/ldap/login");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, true);

        if ($result['code']) {

            // the user exists in the LDAP server, with the provided password

            $user = User::where($this->username(), $username)->first();

            if (!$user) {
                // the user doesn't exist in the local database, so we have to create one

                $user = new User();
                $user->username = $username;
                $user->password = '';

                // // you can skip this if there are no extra attributes to read from the LDAP server
                // // or you can move it below this if(!$user) block if you want to keep the user always
                // // in sync with the LDAP server

                // $sync_attrs = $this->retrieveSyncAttributes($username);

                // foreach ($sync_attrs as $field => $value) {
                //     $user->$field = $value !== null ? $value : '';
                // }
            }

            // by logging the user we create the session, so there is no need to login again (in the configured time).
            // pass false as second parameter if you want to force the session to expire when the user closes the browser.
            // have a look at the section 'session lifetime' in `config/session.php` for more options.
            $this->guard()->login($user, true);
            return true;
        }

        // the user doesn't exist in the LDAP server or the password is wrong
        // log error
        return false;
    }
}
