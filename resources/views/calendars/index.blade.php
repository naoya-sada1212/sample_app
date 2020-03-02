<?php
//タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

//前月・次月リンクが押された場合は、GETパラメータから年月を取得
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    //今月の年月を表示
    $ym = date('Y-m');
}

//タイムスタンプを作成し、フォーマットをチェックする
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

//今月の日付フォーマット　例）2018-07-03
$today = date('Y-m-j');

//カレンダーのタイトルを作成　例）2017年7月
$html_title = date('Y年n月', $timestamp);

//前月・次月の年月を取得
//方法１：mktimeを使う　mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

//方法２：strtotimeを使う
//$prev = date('Y-m', strtotime('-1 month', $timestamp));
//$next = date('Y-m', strtotime('+1 month', $timestamp));

//該当月の日数を取得
$day_count = date('t', $timestamp);

//1日が何曜日か　0:日　1:月...6:土
//方法１：mktimeを使う
$youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//方法２
//$youbi = date('w', $timestamp);

//カレンダー作成の準備
$weeks = [];
$week = '';

//第1週目:空のセルを追加
//例）１日が水曜日だった場合、日曜日から火曜日の3つ分の空セルを追加する
$week .= str_repeat('<td></td>', $youbi);

for ($day = 1; $day <= $day_count; $day++, $youbi++) {
    
    //2017-07-3
    $date = $ym . '-' . $day;
    
    if ($today == $date) {
       //今日の日付の場合は、class="today"をつける
       $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';
    
    //週終わり、または、月終わりの場合
    if ($youbi % 7 == 6 || $day == $day_count) {
        
        if ($day == $day_count) {
            //月の最終日の場合、空セルを追加
            //例）最終日が木曜日の場合、金・土曜日の空セルを追加
            $week .= str_repeat('<td></td>', 6 - ($youbi % 7));
        }
        
        //weeks配列にtrと$weekを追加する
        $weeks[] = '<tr>' . $week . '</tr>';
        
        //weekをリセット
        $week = '';
    }
}
?>
<html>
<head>
    <title>カレンダー</title>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
        
<style>
    .header {
        width: 100%;
        height: 3rem;
        margin: 0;
        margin-top: 0;
        padding: 1rem;
        background-color: #819ff7;
        font-weight: bold;
    }
    .container {
        left: 20px;
    }
    h3 {
        margin-bottom: 30px;
    }
    th {
        height: 20px;
        text-align: center;
    }
    td {
        height: 80px;
    }
    .today {
        background: #E6E6E6;
    }
    th:nth-of-type(1), td:nth-of-type(1) {
        color: red;
    }
    th:nth-of-type(7), td:nth-of-type(7) {
        color: blue;
     }
</style>
</head>
<body>
  <div class="header">
    <p>練習メモ</p>
  </div>
  <div class="container mx-0 my-2">
    <ul class="nav nav-tabs" class="justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="/memos">メモ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="/calendars">予定表</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/goals">目標</a>
      </li>
    </ul>
  </div>
  <div class="container">
    <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a><?php echo $html_title;?><a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
    <table class="table table-bordered">
      <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>          
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
      </tr>
      <?php 
        foreach ($weeks as $week) {
        echo $week;
        }
      ?>
    </table>
  </div>
  <footer class="py-3 bg-light fixed-bottom">
    <div class="container">
      <span class="text-muted small">Sample_app by Laravel & Bootstrap4</span>
    </div>
  </footer>
</body>
</html>

  
