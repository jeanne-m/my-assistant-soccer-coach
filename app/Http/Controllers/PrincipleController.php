<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Focus;
use App\Principle;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PrincipleController extends Controller
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
        return view('admin.principle.index')->withPrinciples(Principle::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.principle.create')->withFoci(Focus::all());
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
            'name' => 'required|unique:principles',
            'slug' => 'required|unique:principles',
            'focus_id' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.principle.create')->withErrors($validator)->withInput();
        }
        $principle = new Principle();
        $principle->name = $request->input('name');
        $principle->slug = $request->input('slug');
        $principle->focus_id = $request->input('focus_id');
        $principle->save();
        return redirect()->route('admin.principle.index')->withMessage('Your principle has been saved.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id Resource ID
     *
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.principle.edit')->withPrinciple(Principle::findOrFail($id))->withFoci(Focus::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int     $id      Resource ID
     * @param Request $request Request object
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $rules = [
            'name' => 'required|unique:principles,name,' . $id,
            'slug' => 'required|unique:principles,slug,' . $id,
            'focus_id' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.principle.edit', $id)->withErrors($validator)->withInput();
        }
        $principle = Principle::findOrFail($id);
        $principle->name = $request->input('name');
        $principle->slug = $request->input('slug');
        $principle->focus_id = $request->input('focus_id');
        $principle->save();
        return redirect()->route('admin.principle.index')->withMessage('Your principle has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id Resource ID
     *
     * @return Response
     */
    public function destroy($id)
    {
        Principle::findOrFail($id)->delete();
        return redirect()->route('admin.principle.index')->withMessage('The requested principle has been deleted.');
    }
}
