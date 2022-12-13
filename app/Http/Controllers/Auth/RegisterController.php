<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telp' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'instansi' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $params['name'] = $data['name'];
        $params['email'] = $data['email'];
        $params['password'] = Hash::make($data['password']);

        $params1['name'] = $data[('name')];
        $params1['email'] = $data[('email')];
        $params1['address'] = $data[('address')];
        $params1['telp'] = $data[('telp')];
        $params1['instansi'] = $data[('instansi')];

        $saved1 = User::create($params);
        if ($saved1) {
            $sql = User::where('email', '=', $data[('email')])
                ->get();
            foreach ($sql as $row) {
                if ($data['email'] == $row->email && Hash::check($data['password'], $row->password)) {
                    $params1['user_id'] = $row->id;
                    break;
                }
            }
            $saved2 = Customer::create($params1);
        }
        return $saved1;
        return $saved2;
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
            
        // ]);
    }
}
