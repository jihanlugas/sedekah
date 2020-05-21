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
            $mUsertrees = Usertree::where('user_id', $mUserinvitation->id)
                ->where('is_admin', '!=', 1)
                ->where('parent_level', '!=', 2)
                ->get();

            if ($mUsertrees){

                // Admin Lv 1
                Usertree::create([
                    'user_id' => $mUser->id,
                    'parent_id' => 1,
                    'parent_level' => 1,
                    'is_admin' => 1,
                ]);

                // Atas dari user yang invite
                foreach ($mUsertrees as $mUsertree){
                    Usertree::create([
                        'user_id' => $mUser->id,
                        'parent_id' => $mUsertree->parent_id,
                        'parent_level' => $mUsertree->parent_level - 1,
                    ]);
                }

                // User Yg Invite Lv 5
                Usertree::create([
                    'user_id' => $mUser->id,
                    'parent_id' => $mUserinvitation->id,
                    'parent_level' => 5,
                ]);
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
