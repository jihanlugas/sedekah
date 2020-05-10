<?php

namespace App\Http\Controllers;

use App\Usertree;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class CompleteregistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function requested()
    {
        return view('completeregister.requested');
    }

    public function postrequested(Request $request)
    {
        $mUserinvitation = User::where('invitation_code', $request->invitation_code)->first();
        $mUser = User::where('id', Auth::user()->id)->first();
        if ($mUserinvitation){
            $mUsertrees = Usertree::where('user_id', $mUserinvitation->id)->get();
            foreach ($mUsertrees as $mUsertree){
//                if ($mUsertree->parent_level == 1)
//                Usertree::create([
//                    'user_id' => $mUser->id,
//                    'parent_id' => $mUsertree->parent_id,
//                    'parent_level' => $mUsertree->parent_level,
//                ]);
            }
            $mUser->requested_by = $mUserinvitation->id;
            $mUser->save();
            return redirect()->route('upload')->with('alert-success', 'Berhasil Menambahkan Invitation Code!');
        }else{
            return redirect()->route('requested')->with('alert-danger', 'Invitation Code Not Valid!');
        }
    }

    public function upload()
    {
        return view('completeregister.upload');
    }
}
