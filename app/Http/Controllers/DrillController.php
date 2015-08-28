<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AgeGroup;
use App\Drill;
use App\Principle;
use App\Stage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DrillController extends Controller
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
        return view('admin.drill.index')->withDrills(Drill::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.drill.create')
            ->with('ageGroups', AgeGroup::all())
            ->withPrinciples(Principle::all())
            ->withStages(Stage::all());
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
            'name' => 'required|unique:drills',
            'slug' => 'required|unique:drills',
            'stage_id' => 'required',
            'image' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.drill.create')->withErrors($validator)->withInput();
        }
        $drill = new Drill();
        $drill->name = $request->input('name');
        $drill->slug = $request->input('slug');
        $drill->stage_id = $request->input('stage_id');
        $drill->notes = $request->input('notes');
        $drill->coaching_points = $request->input('coaching_points');
        $drill->age_id = $request->input('age_id');
        $drill->principle_id = $request->input('principle_id');
        $drill->save();
        $imageName = $drill->id . '-' . $drill->slug . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move($this->getUploadPath(), $imageName);
        $drill->image = $this->getImagePath($imageName);
        $drill->save();
        return redirect()->route('admin.drill.index')->withMessage('Your drill has been saved.');
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
        $drill = Drill::findOrFail($id);
        return view('admin.drill.edit')
            ->withDrill(Drill::findOrFail($id))
            ->with('ageGroups', AgeGroup::all())
            ->withPrinciples(Principle::all())
            ->withStages(Stage::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request Request object
     * @param int     $id      Resource ID
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:drills,name,' . $id,
            'slug' => 'required|unique:drills,slug,' . $id,
            'stage_id' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('admin.drill.edit', $id)->withErrors($validator)->withInput();
        }
        $drill = Drill::findOrFail($id);
        $drill->name = $request->input('name');
        $drill->slug = $request->input('slug');
        $drill->stage_id = $request->input('stage_id');
        $drill->notes = $request->input('notes');
        $drill->coaching_points = $request->input('coaching_points');
        $drill->age_id = $request->input('age_id');
        $drill->principle_id = $request->input('principle_id');
        $drill->save();
        if ($request->image) {
            $imageName = $drill->id . '-' . $drill->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($this->getUploadPath(), $imageName);
            $drill->image = $this->getImagePath($imageName);
        }
        $drill->save();
        return redirect()->route('admin.drill.index')->withMessage('Your drill has been updated.');
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
        Drill::findOrFail($id)->delete();
        // TODO Delete the image from the directory?
        return redirect()->route('admin.drill.index')->withMessage('The requested drill has been deleted.');
    }

    /**
     * Returns the upload path for images
     *
     * @return string
     */
    protected function getUploadPath()
    {
        return join(DIRECTORY_SEPARATOR, array(public_path(), 'img', 'drills'));
    }

    /**
     * Returns the path to an image
     *
     * @param string $image Image file name
     *
     * @return string
     */
    protected function getImagePath($image)
    {
        return join(DIRECTORY_SEPARATOR, array('img', 'drills', $image));
    }
}
