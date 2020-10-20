<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

<link href="/admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />

<title>ログイン - H-ui.admin v3.1</title>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
{{--<div class="header"></div>--}}
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    @include('admin.common.validate')
    @include('admin.common.msg')
    <form class="form form-horizontal" action="{{ route('admin.login') }}" method="post">
      {{ csrf_field() }}
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="username" type="text" placeholder="ユーザ一" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="password" type="password" placeholder="パスワード" class="input-text size-L">
        </div>
      </div>
{{--      <div class="row cl">--}}
{{--        <div class="formControls col-xs-8 col-xs-offset-3">--}}
{{--          <input class="input-text size-L" type="text" placeholder="コード" onblur="if(this.value==''){this.value='認証コード:'}" onclick="if(this.value=='認証コード:'){this.value='';}" value="認証コード:" style="width:150px;">--}}
{{--          <img src=""> <a id="kanbuq" href="javascript:;">更新</a> </div>--}}
{{--      </div>--}}
{{--      <div class="row cl">--}}
{{--        <div class="formControls col-xs-8 col-xs-offset-3">--}}
{{--          <label for="online">--}}
{{--            <input type="checkbox" name="online" id="online" value="">--}}
{{--    使我保持登录状态</label>--}}
{{--        </div>--}}
{{--      </div>--}}
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;録&nbsp;">&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;キャンセル&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright blog by H-ui.admin v3.1</div>
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>

</body>
</html>