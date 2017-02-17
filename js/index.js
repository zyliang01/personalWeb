/**
 * Created by zhuyunliang on 2016/12/15.
 */
$(function(){
    // 验证码
    var    codeLength = 4;
    create_code(codeLength);
    change_code(codeLength);
    control_submit(codeLength);
    initial_blog_page();
    //点击登陆、注册
    $("#login").click(function(){
       $(".container").show();
        $("#login_change").removeClass("common_color").addClass("common_colorNew");
    });
    $("#reg").click(function(){
        $(".container").show();
        $(".login_form").hide();
        $(".reg_form").show();
        $("#reg_change").removeClass("common_color").addClass("common_colorNew");
        $(".switch_bottom").css("left","215px");
    });
    // 登陆、注册来回切换
   $("#reg_change").click(function(){
       $("#reg_change").removeClass("common_color").addClass("common_colorNew");
       $("#login_change").removeClass("common_colorNew").addClass("common_color");
       $(".switch_bottom").animate({left:"215px"});
       $(".login_form").hide();
       $(".reg_form").show();
   });
    $("#login_change").click(function(){
        $("#login_change").removeClass("common_color").addClass("common_colorNew");
        $("#reg_change").removeClass("common_colorNew").addClass("common_color");
        $(".switch_bottom").animate({left:"70px"});
        $(".login_form").show();
        $(".reg_form").hide();
    });
    //注册验证
    $(".reg_user").focus(function(){
        $(".reg_user").removeClass("error_tip");
        $(".reg_user_tip").html("");
    }).blur(function (){
            verifyRegUserName();
    });

    $(".reg_psw").focus(function(){
        $(".reg_psw").removeClass("error_tip");
        $(".reg_psw_tip").html("");
    }).blur(function(){
            verifyRegPsw();
    });
    $(".reg_rpsw").focus(function(){
        $(".reg_rpsw").removeClass("error_tip");
        $(".reg_rpsw_tip").html("");
    }).blur(function(){
            verifyRegRpsw();
    });
    $("#user_input_code").focus(function(){
        $(this).removeClass("error_tip");
        $("#valid_failed").html("");
    }).blur(function(){
        verify_code ();
    });
    //登录验证
    $(".login_user").focus(function(){
        $(".login_user").removeClass("error_tip");
        $(".login_user_tip").html("");
    }).blur(function (){
        verifyLoginUserName();
    });

    $(".login_psw").focus(function(){
        $(".login_psw").removeClass("error_tip");
        $(".login_psw_tip").html("");
    }).blur(function(){
        verifyLoginPsw();
    });

    $(".close").click(function(){
        $(".loginReg").hide();
    })
});

function change_code(codeLength) {
    //更改验证码
    $("#checkCode").click(function () {
        create_code(codeLength);
    });
}

var code ;
function create_code(codeLength){
    //生成验证码
    code = "";
    var checkCode = $("#checkCode");
    var selectChar = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L',
        'M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

    for(var i=0;i<codeLength;i++){
        var charIndex = Math.floor(Math.random()*36);
        code +=selectChar[charIndex];
    }
    if(checkCode){
        checkCode.addClass("code");
        checkCode.val(code);
    }
}

function verify_code (){
    //验证验证码
    var user_input_code = $("#user_input_code").val().toLowerCase().trim();
    if(user_input_code.length <=0){
        $("#user_input_code").addClass("error_tip");
        $("#valid_failed").html("验证码不能为空");
        return false;
    } else if(user_input_code != code.toLowerCase()){
        $("#user_input_code").addClass("error_tip");
        $("#valid_failed").html("验证码错误");
        return false;
    }
    return true;
}

function control_submit(codeLength) {
    //当验证码验证成功后，才允许提交评论
    $("#user_input_code").keyup(function () {

    });
}
function initial_blog_page() {
    //防止从评论模块的perview页面后退到blog页面时，评论的提交按钮仍然维持disable=“false”状态
    $("#submit_comment").attr("disabled", true);
}

function  verifyRegUserName(){
     var val=$(".reg_user").val();
    var reg = /^1[3|4|5|7|8][0-9]{9}$/;
    var flag=reg.test(val);
    if(val==""){
        $(".reg_user_tip").html("手机号不能为空");
        $(".reg_user").addClass("error_tip");
        return false;
    }
    if(!flag){
        $(".reg_user_tip").html("手机号格式不正确");
        $(".reg_user").addClass("error_tip");
        return false;
    }
    return true;
}

function verifyRegPsw(){
    var val1=$(".reg_psw").val();
    var reg1= /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/;
    var flag1=reg1.test(val1);
    if(val1==""){
        $(".reg_psw_tip").html("密码不能为空");
        $(".reg_psw").addClass("error_tip");
        return false;
    }
    if(!flag1){
        $(".reg_psw_tip").html("密码格式不正确");
        $(".reg_psw").addClass("error_tip");
        return false;
    }
    return true;
}

function verifyRegRpsw(){
    var val2=$(".reg_rpsw").val();
    if(val2==""){
        $(".reg_rpsw_tip").html("确认密码不能为空");
        $(".reg_rpsw").addClass("error_tip");
        return false;
    }
    if(val2!==$(".reg_psw").val()){
        $(".reg_rpsw_tip").html("两次密码不一致");
        $(".reg_rpsw").addClass("error_tip");
        return false;
    }
    return true;
}

function verifyLoginUserName(){
    var val=$(".login_user").val();
    var reg = /^1[3|4|5|7|8][0-9]{9}$/;
    var flag=reg.test(val);
    if(val==""){
        $(".login_user_tip").html("手机号不能为空");
        $(".login_user").addClass("error_tip");
        return false;
    }
    if(!flag){
        $(".login_user_tip").html("手机号尚未注册");
        $(".login_user").addClass("error_tip");
        return false;
    }
    return true;
}

function verifyLoginPsw(){
    var val1=$(".login_psw").val();
    //var flag1=reg1.test(val1);
    if(val1==""){
        $(".login_psw_tip").html("密码不能为空");
        $(".login_psw").addClass("error_tip");
        return false;
    }
    /*if(!flag1){
        $(".reg_psw_tip").html("密码不正确");
        $(".reg_psw").addClass("error_tip");
        return false;
    }*/
    return true;
}
//注册提交表单验证
function regCheck(){
    if (verifyRegUserName() && verifyRegPsw() && verifyRegRpsw() && verify_code ()) {
        return true;
    }
    return false;
}
//登陆提交表单验证
function loginCheck(){
    if(verifyLoginUserName() && verifyLoginPsw()){
        return true;
    }
    return false;
}
