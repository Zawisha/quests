<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\QuestRequest;
use App\Models\System\Quest;
use Illuminate\Support\Facades\Storage;

class QuestController extends Controller
{
    /**
     * QuestController constructor.
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $quests = Quest::get();

        return view('system.quests.index', compact('quests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $quest = Quest::make();

        return view('system.quests.create', compact('quest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuestRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');

            $extension = $image->getClientOriginalExtension();
            $title = 'photo_' . time() . '.' . $extension;

            Storage::disk('public')->putFileAs(
                '/quests', $image, $title
            );

            $data['photo_path'] = "/storage/quests/{$title}";
        }
        $quest = Quest::create($data);

        if ($quest) {
            return redirect()
                ->route('system.quests.index')
                ->with(['success' => __('success.store')]);
        } else {
            return back()
                ->withErrors(['msg' => __('error.store')])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Quest $quest
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Quest $quest)
    {
        $res = $quest->delete();
        if ($res) {
            return redirect()
                ->route('system.quests.index')
                ->with(['success' => __('success.destroy')]);
        } else {
            return back()
                ->withErrors(['msg' => __('error.destroy')])
                ->withInput();
        }
    }
}
