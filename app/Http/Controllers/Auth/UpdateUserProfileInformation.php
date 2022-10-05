<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfileInformation extends Controller
{
    public function update(Request $request)
    {

        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
            'phone' => ['nullable', 'numeric'],
        ]);
        // dd($request->all());
       $user=Auth::user();
       $user->update($request->all());
        return back()->with('status','profile-information-updated');
        // if (
        //     $input['email'] !== $user->email &&
        //     $user instanceof MustVerifyEmail
        // ) {
        //     $this->updateVerifiedUser($user, $input);
        // } else {
        //     $user->update([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'phone' => $request->phone,
        //     ]);
        // }


    }
}
