<?php

namespace App\Http\Controllers;

use App\Models\Couple;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function Index() {
        $users = User::all();
        return view('admin.index', compact('users'));
    } // End method

    public function EditUser(User $user){
        return view('content.edit_users', compact('user'));
    } // End method

    public function UpdateUser(Request $request) {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^(\+65)[0-9]*$/'],
            'dob' => ['required', 'date', 'before:'.date('Y-m-d', strtotime('-18 years'))],
        ],[
            'phone' => 'Phone number must be started with +65!',
            'dob' => 'You must be 18 years old and above!'
        ]);

        $user = User::findOrfail($request->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->save();
        return redirect()->route('admin.dashboard');
    } // End method

    public function BanUser(Request $request) {
        $user = User::findOrfail($request->id);
        $user->is_banned = 1;
        $user->save();

        if($user->is_married == 1){
            $couple = Couple::where('user1_id', $user->id)->orWhere('user2_id', $user->id)->first();
            $couple->user1->is_married = 0;
            $couple->user1->save();
            $couple->user2->is_married = 0;
            $couple->user2->save();
            $couple->delete();
        }

        return redirect()->route('admin.dashboard');
    } // End method

    public function UnbanUser(Request $request) {
        $user = User::findOrfail($request->id);
        $user->is_banned = 0;
        $user->save();

        return redirect()->route('admin.dashboard');
    } // End method
}
