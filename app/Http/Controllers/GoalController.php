<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = Goal::all();
         
        return view('goals.index', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mark' => 'required',
            'now' => 'required',
            'todo' => 'required',
            ]);
            
        $goal = new Goal();
        $goal->mark = $request->input('mark');
        $goal->now = $request->input('now');
        $goal->todo = $request->input('todo');
        $goal->save();
        
        return redirect()->route('goals.index', ['id' => $goal->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Goal $goal)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal)
    {
      return view('goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'mark' => 'required',
            'now' => 'required',
            'todo' => 'required',
            ]);
            
        $goal->mark = $request->input('mark');
        $goal->now = $request->input('now');
        $goal->todo = $request->input('todo');
        $goal->save();
        
        return redirect()->route('goals.index', ['id' =>$goal->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        $goal->delete();
        
        return redirect()->route('goals.index');
    }
}
