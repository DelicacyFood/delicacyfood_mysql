<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return Users::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'user_id' => DB::selectOne("select getNewId('users') as value from dual")->value,
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    // Register
    public function store(Request $request)
    {

        $data = $request->all();
        $check = $this->create($data);

        // Customer
        // $customer = new Customer;
        // $temp2 = DB::selectOne("select getNewId('users') as value from dual");
        // $customer->user_id = $temp2->value;
        // $customer->address = $request->alamat;
        // $customer->saldo = $request->saldo;

        // $customer->save();

        //$validatedData['password'] = bcrypt($validatedData['password']);

        // Jika menggunakan flash (baca flash storage di php)
        // $request->session()->flash('success', 'Registration Success! Please Login');

        return redirect('auth/login')->with(
            'success',
            'Registration Success! Please Login'
        );
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
