<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use JsonLd;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home(){

        if(!Cache::has('patients')){
            $patient = Patient::get();
            Cache::put('patients',$patient);

        }
        else{
            $patient = Cache::get('patients');

        }

        return view('home',compact('patient'));
    }

    public function show($id){
        $patient = Patient::findOrFail($id);
        SEOMeta::setTitle($patient->name);
        SEOMeta::setDescription($patient->name.'isimli hasta');
        SEOMeta::setCanonical(url()->current());

        JsonLd::setTitle($patient->name);
        JsonLd::setDescription($patient->name.'isimli hasta');
        JsonLd::setType('Product');

        return view('users.books.show',compact('patient'));
    }


}
