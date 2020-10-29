@extends('admin.common.main')

@section('cnt')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> ホーム
        <span class="c-gray en">&gt;</span> ユーザーセンター
        <span class="c-gray en">&gt;</span> ユーザー更新
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <article class="page-container">
        @include('admin.common.validate')
        <form action="{{route('admin.user.edit',['id'=>$model->id])}}" method="post" class="form form-horizontal" id="form-member-add">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">ユーザー名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    {{$model->username}}
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名前：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="truename" value="{{$model->truename}}">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>古パスワード：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="spassword" autocomplete="off">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">新パスワード：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="password" id="password" autocomplete="off">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">新パスワード確認：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="password_confirmation" autocomplete="off">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>性别：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="sex" type="radio" value="男性" checked>
                        <label for="sex-1">男性</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" name="sex" value="女性">
                        <label for="sex-2">女性</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>携帯：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="phone" value="{{$model->phone}}">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>メール：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="email" class="input-text" placeholder="" name="email" value="{{$model->email}}">
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;更新&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>
    @endsection

@section('js')
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
    <script>
        //checkbox style
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-member-add").validate({
            rules:{
                truename:{
                    required:true
                },
                spassword:{
                    required: true
                },
                password_confirmation:{
                    equalTo:'#password'
                },
                email:{
                    email:true
                },
                phone:{
                    phone:true
                }
            },
            messages:{
                truename:{
                    required:'名前は　必ず指定してください'
                },
                spassword:{
                    required:'古パスワードは　必ず指定してください'
                },
                password_confirmation:{
                    equalTo:'新パスワードは　再確認してください'
                },
                email:{
                    email:'正しくメールを入力してください'
                }
            },
            onkeyup:false,
            //验证成功后的样式
            success:"valid",
            submitHandler:function(form){
                //表单提交
                form.submit();
            }
        });
        // phonenumber検証
        jQuery.validator.addMethod("phone", function(value, element) {
            var reg = /(\+?81|0)\d{1,4}[ \-]?\d{1,4}[ \-]?\d{4}$/;
            return this.optional(element) || (reg.test(value));
        }, "正しく携帯番号を入力してください");
    </script>
    @endsection
