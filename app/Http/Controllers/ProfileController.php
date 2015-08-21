<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource
     *
     * @return Response
     */
    public function show()
    {
        return view('profile.show')->withUser(auth()->user());
    }

    /**
     * Show the form for editing the specified resource
     *
     * @return Response
     */
    public function edit()
    {
        return view('profile.edit')->withUser(auth()->user());
    }

    /**
     * Update the specified resource in storage
     *
     * @param Request $request Request object
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|confirmed'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('profile.edit')->withErrors($validator)->withInput();
        }
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->input('password') !== 'donotchangeme') {
            $user->password = \Hash::make($request->input('password'));
        }
        $user->update();
        return redirect()->route('profile.show')->withMessage('Your profile has been saved.');
    }

    /**
     * Remove the specified resource from storage
     *
     * @return Response
     */
    public function destroy()
    {
        User::findOrFail(auth()->user()->id)->delete();
        return redirect()->route('home');
    }
}
