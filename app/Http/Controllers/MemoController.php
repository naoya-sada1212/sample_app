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

       if(isset($_GET['ym'])) {
            $ym =$_GET['ym'];
        } else {
            $ym =Carbon::today();
        }
        $newDate = Carbon::parse("$ym");
        $firstOfMonth =$newDate->firstOfMonth();
        $endOfMonth = $firstOfMonth->copy()->endOfMonth();
        $dayOfWeek = $firstOfMonth->dayOfWeek;
        $today = Carbon::today()->format('Y-m-d');
        $prev = Carbon::parse("$ym")->subMonth();
        $next = Carbon::parse("$ym")->addMonth();
        
        $dates = [];
        $j = 0;
        
        for($i = 0; $i < $dayOfWeek; $i++) {
            $dates[$j][] = "";
        }
        
        for ($i = 0; true; $i++) {
            $date = $firstOfMonth->copy()->addDay($i);
            if(isset($dates[$j]) && count($dates[$j]) === 7) {
                $j++;
            }
            if ($date > $endOfMonth) {
                break;
            }
            $dates[$j][] = $date->format('Y-m-d');
        }
        
        if($endOfMonth->dayOfWeek != 6) {
            for ($i = count($dates[$j]); $i < 7; $i++) {
               $dates[$j][] = "";
            }
        }
        
       return view('memos.calendar2',compact(
           'dates', 
           'today',
           'prev',
           'next',
           'newDate'
           ));
        
        /*if(isset($_GET['ym'])) {
            $ym =$_GET['ym'];
        } else {
            $ym =Carbon::today();
        }
        $newDate = Carbon::parse("$ym");
        $firstOfMonth =$newDate->firstOfMonth();
        $endOfMonth = $firstOfMonth->copy()->endOfMonth();
        $dayOfWeek = $firstOfMonth->dayOfWeek;
        $today = Carbon::today();
        $prev = Carbon::parse("$ym")->subMonth();
        $next = Carbon::parse("$ym")->addMonth();
        
        $dates = [];
        $j = 0;
        
        for($i = 0; $i < $dayOfWeek; $i++) {
            $dates[$j][] = "";
        }
        
        for ($i = 0; true; $i++) {
            $date = $firstOfMonth->copy()->addDay($i);
            if(isset($dates[$j]) && count($dates[$j]) === 7) {
                $j++;
            }
            if ($date > $endOfMonth) {
                break;
            }
            $dates[$j][] = $date->day;
        }
        
        
        if($endOfMonth->dayOfWeek != 6) {
            for ($i = count($dates[$j]); $i < 7; $i++) {
               $dates[$j][] = "";
            }
        }
        
        return view('memos.calendar3', compact(
            'dates',
            'today',
            'next',
            'prev',
            'newDate',
            'memoDate'
            ));*/
    }
    public function calendarMemo(Memo $memo) 
    {
        $memos = Memo::all();
        if (isset($_GET['x'])) {
            $x = $_GET['x'];
        }
        $memoDate = Memo::whereDate('created_at', $x)->get();
        
    return view('memos.calendar4', compact(
        'memos', 
        'memoDate'
        ));
    }
    
}
