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

//今月の日付フォーマット
$today = date('Y-m-j');

//カレンダーのタイトルを作成
$html_title = date('Y年n月', $timestamp);

//前月・次月の年月を取得
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

//該当月の日数を取得
$day_count = date('t', $timestamp);

//1日が何曜日か
//方法１：mktimeを使う
$youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

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
       $week .= '<td class="today"><a href="#" data-toggle="modal" data-target="#exampleModalScrollable">' . $day;
    } else {
        $week .= '<td><a href="#" data-toggle="modal" data-target="#exampleModalScrollable">' . $day;
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
        background-color: #EFF8FE;
        border-bottom: solid 2px #E6E6E6 ;
        font-weight: bold;
    }
    p {
        color: #2E9AFE;
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
        background-color: #E6E6E6 !important;
    }
    th:nth-of-type(1), td:nth-of-type(1) {
        background-color: #F8E0E0;
    }
    th:nth-of-type(7), td:nth-of-type(7) {
        background-color: #E0ECF8;
     }
    .modal-body {
      height: 500px;
    }
</style>
</head>
<body>
  @component('components.header3')
  @endcomponent
  
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
  @component('components.footer')
  @endcomponent
  
  @foreach ($memos as $memo)
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">メモ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container mx-o my-2">
          <div class="card border-primary mb-3" style="width: 20rem;" style="height: 40rem;">
           <div class="card-header">{{ $memo->title }}</div>
             <div class="card-body text-primary">
               <p class="card-text">{{ $memo->content }}</p>
               <p class="card-text">{{ $memo->memo_date }}</p>
               <div class="d-flex" styltfe="height: 36.4px;">
                 <a href="/memos/{{ $memo->id }}/edit" class="btn btn-outline-primary">編集</a>
                 <form action="/memos/{{ $memo->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else { return false };">
                   <input type="hidden" name="_method" value="DELETE">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <button type="submit" class="btn btn-outline-danger">削除</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>
@endforeach
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

  
