<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use App\User;
use App\Subscriber;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CmsController extends Controller
{
    public function index(){
        if(session()->has('shoppingCar')){
            return redirect()->route('home.info');
        }else{
            return view('cms.index');
        }
    }

    public function clubView(){
    	$users = User::all();
    	return view('cms.club')->with(compact('users'));
    }

    public function informationView(){
    	return view('cms.informacion');
    }

    public function categoryView(){
    	$categorias = Category::all();
    	return view('cms.categorias')->with(compact('categorias'));
    }

    public function config(){
        $user_id = Auth::id();
    	$user = User::findOrFail($user_id);
    	return view('cms.config.index')->with(compact('user'));
    }

    public function passwordUpdate( Request $request ){
        $user_id = Auth::id();
    	$user = User::findOrFail($user_id);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

    	return back()->with('message', 'Contraseña actualizada Exitosamente!');
    }

    public function accounts(){
        $accounts = Account::orderBy('created_at','DESC')->get();
    	return view('cms.accounts.index', compact('accounts'));
    }

    public function accountsCreate(Request $request){
        $account_name = $request->account;
        $account_number = $request->account_number;
        $account_mail = $request->account_mail;
        $account_titular = $request->account_titular;
        $account_description = $request->account_description;

        $account = new Account;
        $account->create([
            'account' => $account_name,
            'account_number' => $account_number,
            'account_mail' => $account_mail,
            'account_titular' => $account_titular,
            'account_description' => $account_description
        ]);

    	return back()->with('message', 'Cuenta creada Exitosamente!');
    }
}
