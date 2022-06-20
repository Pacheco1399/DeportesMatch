<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

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
            'apellido_paterno' => ['required', 'string'],
            'apellido_materno' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised(), 'confirmed'],
            'numero_telefono' => ['nullable', 'integer'],
            'rut' => ['nullable', 'string', 'unique:users'],
            'rol' => ['required', 'integer', 'min:1', 'max:3'],
            'estado' => ['required', 'integer', 'min:1', 'max:3'],
            'direccion' => ['nullable', 'string'],
            'direccion_numero' => ['nullable', 'integer'],
            'direccion_opcional' => ['nullable', 'string'],
            'comentario' => ['nullable', 'string'],
            'clave_antigua' => ['nullable', 'string'],
            'ban_time' => ['nullable', 'integer'],
            'motivo' => ['nullable', 'string'],
            'comuna' => ['nullable', 'string'],
            'deportes_id' => ['nullable', 'string'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    protected function profileImagePath()
    {
        $path = 'user-icon-default.jpg';
        if (request()->hasFile('foto') && request()->file('foto')->isValid()) {
            $path = request()->foto->store('image');
        }

        return $path;
    }
    protected function create(array $data)
    {

        /*$r = $data['rut'];

        $rutV = Str::replaceLast('.', '', $r);
        $rutV = Str::replaceLast('-', '', $rutV);
        dd($rutV);

        $p = Rut::parse($r)->format(Rut::FORMAT_ESCAPED);

        $rut = Rut::parse($p)->validate();

        if ($rut == true) {

        } else {
        return redirect()
        ->route('home');
        };*/

        return User::create([
            'name' => $data['name'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'],
            'email' => $data['email'],
            'rol' => $data['rol'],
            'rut' => $data['rut'],
            'estado' => $data['estado'],
            'password' => $data['password'],
            'foto' => $this->profileImagePath(),

        ]);

    }
}
