<?php

namespace App\Http\Controllers;

use App\Memo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memos = Memo::latest('memo_date')->get();
      
        return view('memos.index', compact('memos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('memos.create');
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
            'title' => 'required',
            'content' => 'required',
            'memo_date' => 'required',
            ]);
        $memo = new Memo();
        $memo->title = $request->input('title');
        $memo->content = $request->input('content');
        $memo->memo_date = $request->input('memo_date');
        $memo->save();
        
        return redirect()->route('memos.index', ['id' => $memo->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo)
    {
        $memos = Memo::whereDate('memo_date', '2020-3-3');
        return view('memos.show', ['memo' => $memo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo)
    {
        return view('memos.edit', compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memo $memo)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'memo_date' => 'required',
            ]);
            
        $memo->title = $request->input('title');
        $memo->conent = $request->input('content');
        $memo->memo_date = $request->input('memo_date');
        $memo->save();
     
        return redirect()->route('memos.index', ['id' => $memo->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();
        
        return redirect()->route('memos.index');
    }
    
   public function calendar(Memo $memo) 
   {
       $displayMonth = Carbon::parse('2020-03-01 00:00:00');
       echo $displayMonth->dayOfWeek;
       

       $memos = Memo::all();
       
       return view('memos.calendar2', ['memo' => $memos, 'month' => $displayMonth]);
   }
}
