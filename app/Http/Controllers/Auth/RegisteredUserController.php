<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'regex:/^(\+65)[0-9]*$/'],
            'dating_code' => ['required', 'string', 'regex:/^(DT)[0-9]{3}$/'],
            'gender' => ['required', 'string', 'regex:/^(Male|Female)$/'],
            'profile_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'dob' => ['required', 'date', 'before:'.date('Y-m-d', strtotime('-18 years'))],
            'password' => ['required', Rules\Password::defaults()],
        ],[
            'phone' => 'Phone number must be started with +65!',
            'dating_code' => 'Dating code must be started with DT!',
            'dob' => 'You must be 18 years old and above!'
        ]);

        ($request->gender == 'Male') ? $gender = '01' : $gender = '02';
        $user_id = 'SKY'.substr($request->dating_code, 2).$gender;

        $image = $request->file('profile_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(144,144)->save('image/profile_image/'.$name_gen);

        $save_url = 'image/profile_image/'.$name_gen;

        try {
            $user = DB::transaction(function () use ($user_id, $request, $save_url) {
                return User::create([
                    'user_id' => $user_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'dating_code' => $request->dating_code,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'profile_image' => $save_url,
                    'dob' => $request->dob,
                    'password' => Hash::make($request->password),
                ]);
            });

            // User created successfully
            // You can perform additional actions here if needed, such as sending a confirmation email.

        } catch (\Exception $e) {
            // An error occurred during user creation
            // You can log the error, display a friendly error message, or handle it as needed.

            // Log the error (optional)
            logger()->error('Error creating user: ' . $e->getMessage());

            // Display a friendly error message (optional)
            // You can redirect back with an error message, or return a response with an error view.
            return redirect()->back()->with('error', 'Dating code is used');

            // Alternatively, you can re-throw the exception to let Laravel handle it globally.
            // throw $e;
        }

        return redirect()->back()->with('success', 'Congratulations, your account has been successfully created. You can log in using '.$request->email. ' or '.$user_id.'.');
        // event(new Registered($user));
        // Auth::login($user);

    }
}
