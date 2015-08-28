<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AgeGroup;
use App\Drill;
use App\Focus;
use App\Principle;
use App\Stage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the age group selection
     *
     * @return Response
     */
    public function index()
    {
        return view('home.age')->with('ageGroups', AgeGroup::all());
    }

    /**
     * Display the focus selection
     *
     * @param string $ageGroup Age group slug
     *
     * @return Response
     */
    public function focus($ageGroup)
    {
        if (AgeGroup::where('slug', $ageGroup)->count() < 1) {
            return redirect()->route('home');
        }
        return view('home.focus')->with('ageGroup', $ageGroup)->withFoci(Focus::all());
    }

    /**
     * Display the principle selection
     *
     * @param string $ageGroup Age group slug
     * @param string $focus    Focus slug
     *
     * @return Response
     */
    public function principle($ageGroup, $focus)
    {
        if (AgeGroup::where('slug', $ageGroup)->count() < 1) {
            return redirect()->route('home');
        }
        $focus = Focus::where('slug', $focus);
        if ($focus->count() < 1) {
            return redirect()->route('home.focus', $ageGroup);
        }
        $focus = $focus->first();
        return view('home.principle')
            ->with('ageGroup', $ageGroup)
            ->withFocus($focus)
            ->withPrinciples(Principle::where('focus_id', $focus->id)->get());
    }

    /**
     * Display the random practice plan
     *
     * @param string $ageGroup  Age group slug
     * @param string $focus     Focus slug
     * @param string $principle Principle slug
     *
     * @return Response
     */
    public function plan($ageGroup, $focus, $principle, Request $request)
    {
        $savedDrills = $request->input('saved_drills') ? $request->input('saved_drills') : array();
        $ageGroupModel = AgeGroup::where('slug', $ageGroup);
        if ($ageGroupModel->count() < 1) {
            return redirect()->route('home');
        }
        if (Focus::where('slug', $focus)->count() < 1) {
            return redirect()->route('home.focus', $ageGroup);
        }
        $principleModel = Principle::where('slug', $principle);
        if ($principleModel->count() < 1) {
            return redirect()->route('home.principle', $ageGroup, $focus);
        }
        $drills = array();
        foreach (Stage::all() as $stage) {
            $drill = null;
            if (array_key_exists($stage->id, $savedDrills)) {
                $drill = Drill::where('id', $savedDrills[$stage->id])->first();
                $drill->saved = true;
            }
            if (!$drill) {
                $drill = Drill::where('stage_id', $stage->id)->get()->random();
            }

            // Filter out age groups
            if (!in_array($ageGroupModel->get()->first()->id, $drill->age_id)) {
                continue;
            }

            // Filter out principles
            if (!in_array($principleModel->get()->first()->id, $drill->principle_id)) {
                continue;
            }

            $drill->notes = str_replace("\n", '<br>', $drill->notes);
            $drill->coaching_points = str_replace("\n", '<br>', $drill->coaching_points);
            $drills[] = $drill;
        }

        return view('home.plan')
            ->with('ageGroup', $ageGroup)
            ->withFocus($focus)
            ->withPrinciple($principle)
            ->withDrills($drills);
    }
}
