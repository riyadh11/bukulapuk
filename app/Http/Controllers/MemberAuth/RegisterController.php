<?php

namespace App\Http\Controllers\MemberAuth;

use App\Member;
use App\Bio;
use App\Member_Address;
use DB;
use Mail;
use Validator;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new Members as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect Members after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/member/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('member.guest');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:members',
            'username' => 'required|max:255|unique:members',
            'password' => 'required|min:8|confirmed',
        ]);
    }

    /**
     * Create a new Member instance after a valid registration.
     *
     * @param  array  $data
     * @return Member
     */
    protected function create(array $data)
    {
        return Member::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username'=>$data['username'],
            'password' => bcrypt($data['password']),
            'email_token' => str_random(32),
            'bio' => $data['bio'],
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('member.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('member');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }
        DB::beginTransaction();
        try
        {
            $bio=new Bio;
            $bio->TagLine="Just Incredible";
            $bio->img="noImg.jpg";
            $bio->save();

            $data=$request->all();
            $data['bio']=$bio->id;
            $Member = $this->create($data);
            $id = DB::table('members')->where('email',$data['email'])->first()->id;
            $alamat=new Member_Address;
            $alamat->alamat="Localhost";
            $alamat->member=$id;
            $alamat->save();
            $email = new EmailVerification(new Member(['email_token' => $Member->email_token, 'name' => $Member->name]));
            Mail::to($Member->email)->send($email);
            DB::commit();
            return redirect('/login')->with('status','Kami sudah mengirimkan kode konfirmasi ke alamat anda, silakan aktivasi akun anda menggunakan kode tersebut!');
        }
        catch(Exception $e)
        {
            DB::rollback(); 
            return back();
        }
    }
    
    public function verify($token)
    {
        Member::where('email_token',$token)->firstOrFail()->verified();
        return redirect('login');
    }
}
