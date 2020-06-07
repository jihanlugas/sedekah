<?php

namespace App\Http\Controllers;

use App\Usertree;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\PhotouploadTrait;

class CompleteregistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    use PhotouploadTrait;

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
                    'confirmation_status' => 0,
                ]);

                // Atas dari user yang invite
                foreach ($mUsertrees as $mUsertree){
                    Usertree::create([
                        'user_id' => $mUser->id,
                        'parent_id' => $mUsertree->parent_id,
                        'parent_level' => $mUsertree->parent_level - 1,
                        'confirmation_status' => 0,
                    ]);
                }

                // User Yg Invite Lv 5
                Usertree::create([
                    'user_id' => $mUser->id,
                    'parent_id' => $mUserinvitation->id,
                    'parent_level' => 5,
                    'confirmation_status' => 0,
                ]);
            }


            $mUser->requested_by = $mUserinvitation->id;
            $mUser->save();
            return redirect()->route('completeregistration.upload')->with('alert-success', 'Berhasil Menambahkan Invitation Code!');
        }else{
            return redirect()->route('completeregistration.requested')->with('alert-danger', 'Invitation Code Not Valid!');
        }
    }

    public function upload()
    {
        $mUsertrees =  Usertree::where('user_id', Auth::user()->id)
            ->where('photo_id', 0)->get();

        if(!$mUsertrees->count()){
            return redirect()->route('completeregistration.completeupload');
        }

        $mUsertrees = Usertree::with(['user'])->where('user_id', Auth::user()->id)->get();
        return view('completeregister.upload', ['mUsertrees' => $mUsertrees]);
    }

    public function postupload(Request $request){
        if ($request->photo_id){
            foreach ($request->photo_id as $i => $data){
//                $data->validate([
//                    'photo_id' => 'image|mimes:jpeg,png,gif,webp|max:2048'
//                ]);
                $mUsertree = Usertree::where('parent_id', $i)
                    ->where('user_id', Auth::user()->id)->first();
                $photo_id = ($this->uploadPhoto($data, $mUsertree->id));

                $mUsertree->photo_id = $photo_id;
                $mUsertree->save();
            }

            $mUsertrees =  Usertree::where('user_id', Auth::user()->id)
                ->where('photo_id', 0)->get();

            if(!$mUsertrees->count()){
                return redirect()->route('completeregistration.upload');
            }else{
                return redirect()->route('completeregistration.completeupload');
            }
        }else{
            return redirect()->route('completeregistration.upload');
        }
    }

    public function completeupload(){
        return view('completeregister.completeupload');
    }
}
