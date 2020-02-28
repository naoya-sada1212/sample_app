
        <h1>休日設定</h1>
        <script>
            $(function() {
                $("#day").datepicker({dateFormat: 'yy-mm-dd'});
            });
        </script>
        <input type="text" id="day">
        <!-- 休日入フォーム -->
        <form method="POST" action="/holiday">
        <div class="form-group">
            {{ csrf_field() }}
            <label for="day">日付[YYYY/MM/DD]</label>
            <input type="text" name="day" class="form-control" id="day">
            <label for="description">説明</label>
        　　<input type="text" name="description" class="form-control" id="description">
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
        </form>
        <!-- 休日一覧表示 -->
        <table class="table">
            <thead>
              <tr>
                <td scope="col">日付</td>
                <td scope="col">説明</td>
                <td scope="col">作成日</td>
                <td scope="col">更新日</td>
              </tr>
            </thead>
            <tbody>
            @foreach($list as $val)
            <tr>
              <th scope="row">{{$val->day}}</th>
              <tb>{{$val->description}}</tb>
              <tb>{{$val->created_at}}</tb>
              <tb>{{$val->updated_at}}</tb>
            </tr>
            @endforeach
        </table>
        </tbody>
        <a href="{{ url('/carendar') }}">カレンダーに戻る</a>