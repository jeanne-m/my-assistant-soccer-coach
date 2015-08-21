<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AgeGroup;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AgeGroupController extends Controller
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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.age-group.index')->with('ageGroups', AgeGroup::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.age-group.create');
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
            'name' => 'required|unique:age_groups',
            'slug' => 'required|unique:age_groups'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.age-group.create')->withErrors($validator)->withInput();
        }
        $ageGroup = new AgeGroup();
        $ageGroup->name = $request->input('name');
        $ageGroup->slug = $request->input('slug');
        $ageGroup->save();
        return redirect()->route('admin.age-group.index')->withMessage('Your age group has been saved.');
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
        return view('admin.age-group.edit')->with('ageGroup', AgeGroup::findOrFail($id));
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
            'name' => 'required|unique:age_groups,name,' . $id,
            'slug' => 'required|unique:age_groups,slug,' . $id
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.age-group.edit', $id)->withErrors($validator)->withInput();
        }
        $ageGroup = AgeGroup::findOrFail($id);
        $ageGroup->name = $request->input('name');
        $ageGroup->slug = $request->input('slug');
        $ageGroup->save();
        return \Redirect::route('admin.age-group.index')->withMessage('Your age group has been updated.');
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
        AgeGroup::findOrFail($id)->delete();
        return redirect()->route('admin.age-group.index')->withMessage('The requested age group has been deleted.');
    }
}
