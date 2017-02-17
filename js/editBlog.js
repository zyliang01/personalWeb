/**
 * Created by zhuyunliang on 2016/12/26.
 */
function check(){
    var comment=document.getElementById("comment").value;
    var comUser=document.getElementById("comUser").value;
    if(comment=='' || comUser==''){
        alert("麻烦请输入留言并且大名，谢谢😊");
        return false;
    }
}
