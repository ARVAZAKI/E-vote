<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class loginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function loginAuth(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)){
            if(Auth::user()->role == 'admin'){
                return redirect('/admin');
            }else if(Auth::user()->role == 'mahasiswa'){
                return redirect('/vote/bem');
            }
        }
        return back()->withErrors([
            'email' => 'Email atau Password salah...',
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function register(){
        return view('auth.register');
    }
    public function registerProses(Request $request){
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users'),
                'ends_with:@student.upnjatim.ac.id',
            ],
            'password' => 'required'
        ]);
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
            'status' => 'belum sah'
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect('/email/verify')->with('terkirim',true);
    }
    public function resendEmail(Request $request)
{
    if ($request->user()->hasVerifiedEmail()) {
        return redirect($this->redirectPath());
    }

    $request->user()->sendEmailVerificationNotification();

    return back()->with('resent', true);
}
    public function uploadPhoto(){
        return view('auth.upload-photo');
    }
    public function postPhoto(Request $request){
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,heic|max:128000',
        ]);
    
        $photoFile = $request->file('photo');
        $extension = $photoFile->getClientOriginalExtension();
        $oldName = Auth::user()->email . now()->timestamp . '.' . $extension;
    
        // Check the file size
        $fileSize = $photoFile->getSize();
    
        if ($fileSize <= 7000000) {
            $photoFile->storeAs('foto', $oldName);    
            $user = User::where('email', Auth::user()->email)->update([
                'photo' => $oldName
            ]);
        } else {
            $manager = new ImageManager(new Driver());
            $newName = Auth::user()->email . now()->timestamp . '.' . $extension;
            $image = $manager->read('storage/foto/' . $oldName);
            $image->scale(width: 350);
            $image->scale(height: 350);
            $image->save('storage/foto/' . $newName);
    
            $user = User::where('email', Auth::user()->email)->update([
                'photo' => $newName
            ]);
        }
    
        return redirect('/vote/bem');
    }
    
    
}
