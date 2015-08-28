<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Focus;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FocusController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
        if (!auth()->user() || !auth()->user()->admin) {
            return redirect()->route('home');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.focus.index')->withFoci(Focus::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.focus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request Request object
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:foci',
            'slug' => 'required|unique:foci'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.focus.create')->withErrors($validator)->withInput();
        }
        $focus = new Focus();
        $focus->name = $request->input('name');
        $focus->slug = $request->input('slug');
        $focus->save();
        return redirect()->route('admin.focus.index')->withMessage('Your focus has been saved.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param integer $id Resource ID
     *
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.focus.edit')->withFocus(Focus::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request Request object
     * @param integer $id      Resource ID
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:foci,name,' . $id,
            'slug' => 'required|unique:foci,slug,' . $id
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.focus.edit', $id)->withErrors($validator)->withInput();
        }
        $focus = Focus::findOrFail($id);
        $focus->name = $request->input('name');
        $focus->slug = $request->input('slug');
        $focus->save();
        return \Redirect::route('admin.focus.index')->withMessage('Your focus has been updated.');
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
        Focus::findOrFail($id)->delete();
        return redirect()->route('admin.focus.index')->withMessage('The requested focus has been deleted.');
    }
}
