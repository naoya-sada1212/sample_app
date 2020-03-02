<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Calendar extends Model
{
    public function getCalendarDates($year, $month)
    {
    $dateStr = sprintf('%04d-%02d-01', $year, $month);
        $date = new Carbon($dateStr);
        //カレンダーを四角形にするため、前月となる左上の隙間用のデータをいれるためずらす
        $date->subDay($date->dayofWeek);
        //同上。左下の隙間のための計算
        $count = 31 + $date->dayofWeek;
        $count = ceil($count / 7) * 7;
        $date = [];
        
        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            //copyしないと全部同じオブジェクトを入れてしまうことになる
            $date[] = $date->copy();
        }
        return $dates;
    }
}
