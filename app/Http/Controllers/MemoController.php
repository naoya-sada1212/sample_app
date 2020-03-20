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
        $memo->content = $request->input('content');
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
    public function destroy(Request $request, Memo $memo)
    {
        $memo->delete();
        
        return redirect()->route('memos.index');
    }
    
   public function calendar(Request $request,Memo $memo) 
   {
    //もし、GETで受けた場合$ymに代入する。受けなければ、$ymに今日の日付を代入。
       if(isset($_GET['ym'])) {
            $ym =$_GET['ym'];
        } else {
            $ym =Carbon::today();
        }
    //$newDateに$ymを入れ、その月の月初め、月末、月初の曜日、翌月、前月を入手。
        $newDate = Carbon::parse("$ym");
        $firstOfMonth =$newDate->firstOfMonth();
        $endOfMonth = $firstOfMonth->copy()->endOfMonth();
        $dayOfWeek = $firstOfMonth->dayOfWeek;
        $today = Carbon::today();
        $prev = Carbon::parse("$ym")->subMonth();
        $next = Carbon::parse("$ym")->addMonth();
    //$dates配列をセットし、$jに初期値の0を入れる。$datesは日にち、$jは週を表す。
        $dates = [];
        $j = 0;
    //月初の曜日まで空を$dates配列と$j配列に入れる。    
        for($i = 0; $i < $dayOfWeek; $i++) {
            $dates[$j][] = "";
        }
    //$dateに月初めから日付を足していく。もし、$jの配列の要素数が7になったら、新たな$j配列を追加する。
    //$dateが月末日より大きくなったら、ループを抜ける。そして、$dates配列と$j配列に$dateの日付を入れる。
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
     //もし、月末の曜日が土曜日(6)でなかったら、月末の曜日から、7まで空を入れる。   
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
        
    }
    public function calendarMemo(Memo $memo) 
    {
    //もし日付の数値(xxxx-xx-xx)をGETで取得したら、$xに代入する。    
        if (isset($_GET['x'])) {
            $x = $_GET['x'];
        }
    //$memo_dateから$xの数値と同じデータを取得し、$memoDateに入れる。    
        $memoDate = Memo::where('memo_date', $x)->get();

        
    return view('memos.calendar4', compact('memoDate'));
    }
    
}
