<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ExportAccounts;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Account as UserAccount;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CreateVotersRequest;

class AccountController extends Controller
{
    public function index(){
        return view('admin.account');
    }
    public function voters(){
        return view('admin.add-voters');
    }
   
    public function cekAkun(){
        return view('cekakun');
    }
    public function cekAcc(Request $request)
{
    $email = $request->input('email');
    $query = User::where('email',$email)->get();

    if ($query->isEmpty()) {
        return redirect()->back()->with('warning', 'akun belum terdaftar..');
    }

    return redirect()->back()->with('message', 'akun sudah terdaftar..');
}

    public function listAccount(){
        return view('admin.listaccount');
    }
}

