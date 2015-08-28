<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StageController extends Controller
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
        return view('admin.stage.index')->withStages(Stage::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.stage.create');
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
            'name' => 'required|unique:stages',
            'slug' => 'required|unique:stages'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.stage.create')->withErrors($validator)->withInput();
        }
        $stage = new Stage();
        $stage->name = $request->input('name');
        $stage->slug = $request->input('slug');
        $stage->save();
        return redirect()->route('admin.stage.index')->withMessage('Your stage has been saved.');
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
        return view('admin.stage.edit')->withStage(Stage::findOrFail($id));
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
            'name' => 'required|unique:stages,name,' . $id,
            'slug' => 'required|unique:stages,slug,' . $id
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.stage.edit', $id)->withErrors($validator)->withInput();
        }
        $stage = Stage::findOrFail($id);
        $stage->name = $request->input('name');
        $stage->slug = $request->input('slug');
        $stage->save();
        return redirect()->route('admin.stage.index')->withMessage('Your stage has been updated.');
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
        Stage::findOrFail($id)->delete();
        return redirect()->route('admin.stage.index')->withMessage('The requested stage has been deleted.');
    }
}
