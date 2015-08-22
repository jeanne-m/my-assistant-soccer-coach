<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
        if (auth()->user()->admin) {
            return redirect()->route('home');
        }
    }

    /**
     * Displays all of the users
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.user.index')->withUsers(User::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id Resource ID
     *
     * @return Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.user.index');
    }

    /**
     * Updates the admin field to be true
     *
     * @param integer $id Resource ID
     *
     * @return Response
     */
    public function grant($id)
    {
        $user = User::findOrFail($id);
        $user->admin = true;
        $user->update();
        return redirect()->route('admin.user.index')->withMessage('Your update has been saved.');
    }

    /**
     * Updates the admin field to be false
     *
     * @param integer $id Resource ID
     *
     * @return Response
     */
    public function revoke($id)
    {
        $user = User::findOrFail($id);
        $user->admin = false;
        $user->update();
        return redirect()->route('admin.user.index')->withMessage('Your update has been saved.');
    }
}
