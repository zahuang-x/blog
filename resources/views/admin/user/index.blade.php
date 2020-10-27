<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/css/pagination.css" />
    <title>ユーザー管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> ホーム
    <span class="c-gray en">&gt;</span> ユーザーセンター
    <span class="c-gray en">&gt;</span> ユーザーリスト
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
@include('admin.common.msg')
<div class="page-container">
    <div class="text-c">日付範囲：
        <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
        -
        <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
        <input type="text" class="input-text" style="width:250px" placeholder="ユーザー名、携帯を入力してください" id="" name="">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> サーチ</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a class="btn btn-danger radius" onclick="deleteAll()">
                <i class="Hui-iconfont">&#xe6e2;</i> ロート削除
            </a>
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i> ユーザー追加
            </a>
        </span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="20">ID</th>
                <th width="100">ユーザー名</th>
                <th width="80">名前</th>
                <th width="30">性別</th>
                <th width="90">携帯</th>
                <th width="130">メール</th>
                <th width="110">登録時間</th>
                <th width="50">状態</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
            <tr class="text-c">
                <td><input type="checkbox" value="1" name=""></td>
                <td>{{$item -> id}}</td>
                <td>{{$item -> username}}</td>
                <td>{{$item -> truename}}</td>
                <td>{{$item -> sex}}</td>
                <td>{{$item -> phone}}</td>
                <td>{{$item -> email}}</td>
                <td>2014-6-11 11:11:42</td>
                <td class="td-status"><span class="label label-success radius">正常</span></td>
                <td class="td-manage">
                    <a href="#"><span class="label label-primary radius">編集</span></a>
                    <a href="#"><span class="label label-danger radius">削除</span></a>
                    <a href="#"><span class="label label-warning radius">還元</span></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{--分页--}}
        {{$data->links()}}
    </div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
</body>
</html>
