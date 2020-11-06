<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site\Quest;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $quests = Quest::get();

        return view('site.quests.index', compact('quests'));
    }

    /**
     * Display the specified resource.
     *
     * @param Quest $quest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Quest $quest)
    {
        $quest->load([
            'active_bookings'
        ]);
        return view('site.quests.show', compact('quest'));
    }
}
