/**
 * Created by zhuyunliang on 2016/12/25.
 */
// inner variables
var canvas, ctx;
var clockRadius = 90;
var clockImage;

// draw functions :
function clear() { // clear canvas function
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
}

function drawScene() { // main drawScene function
    clear(); // clear canvas

    // get current time
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    hours = hours > 12 ? hours - 12 : hours;
    var hour = hours + minutes / 60;
    var minute = minutes + seconds / 60;

    // save current context
    ctx.save();

    ctx.drawImage(clockImage, 0, 0, 180, 180);

    ctx.translate(canvas.width / 2, canvas.height / 2);
    ctx.beginPath();

    // circle
    /*ctx.beginPath();
    ctx.arc(0,0,89,0,Math.PI*2,false);
    ctx.strokeStyle="#000";
    ctx.lineWidth="2";
    ctx.closePath();
    ctx.stroke();*/

    for(var i= 0;i<60;i++){

        ctx.save();
        ctx.beginPath();
        ctx.translate(0,0);
        ctx.rotate(Math.PI/180*6*i);
        ctx.moveTo(0,-85);
        ctx.lineTo(0,-80);
        ctx.strokeStyle="#000";
        ctx.lineWidth="1";
        ctx.stroke();
        ctx.closePath();
        ctx.restore();
    }


    for(var i= 0;i<12;i++){
        ctx.save();
        ctx.beginPath();
        ctx.translate(0,0);
        ctx.rotate(Math.PI/180*30*i);
        ctx.moveTo(0,-85);
        ctx.lineTo(0,-75);
        ctx.strokeStyle="#000";
        ctx.lineWidth="2";
        ctx.stroke();
        ctx.closePath();
        ctx.restore();
    }

    // draw numbers
    ctx.font = '18px Arial';
    ctx.fillStyle = '#000';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    for (var n = 1; n <= 12; n++) {
        var theta = (n - 3) * (Math.PI * 2) / 12;
        var x = clockRadius * 0.7 * Math.cos(theta);
        var y = clockRadius * 0.7 * Math.sin(theta);
        ctx.fillText(n, x, y);
    }

    // draw hour
    ctx.save();
    var theta = (hour - 3) * 2 * Math.PI / 12;
    ctx.rotate(theta);
    ctx.beginPath();
    ctx.moveTo(-10, -5);
    ctx.lineTo(-10, 5);
    ctx.lineTo(clockRadius * 0.5, 1);
    ctx.lineTo(clockRadius * 0.5, 0);
    ctx.fill();
    ctx.restore();

    // draw minute
    ctx.save();
    var theta = (minute - 15) * 2 * Math.PI / 60;
    ctx.rotate(theta);
    ctx.beginPath();
    ctx.moveTo(-10, -4);
    ctx.lineTo(-10, 4);
    ctx.lineTo(clockRadius * 0.8, 1);
    ctx.lineTo(clockRadius * 0.8, 0);
    ctx.fill();
    ctx.restore();

    // draw second
    ctx.save();
    var theta = (seconds - 15) * 2 * Math.PI / 60;
    ctx.rotate(theta);
    ctx.beginPath();
    ctx.moveTo(-10, -3);
    ctx.lineTo(-10, 3);
    ctx.lineTo(clockRadius * 0.9, 1);
    ctx.lineTo(clockRadius * 0.9, 0);
    ctx.fillStyle = '#0f0';
    ctx.fill();
    ctx.restore();

    ctx.restore();
}

// initialization
$(function(){
    canvas = document.getElementById('canvas');
    ctx = canvas.getContext('2d');

    // var width = canvas.width;
    // var height = canvas.height;

    clockImage = new Image();
   

    setInterval(drawScene, 1000); // loop drawScene
});

//二维码
$(function(){
   $(".wechatIcon").bind("mouseover",function(){
       $(".qrcode").show();
       $(".wechatIcon").attr("src","images/wechated.png")
   }).bind("mouseout",function(){
       $(".qrcode").hide();
       $(".wechatIcon").attr("src","images/wechat.png")
   });
    $(".github").bind("mouseover",function(){
        $(".github").attr("src","images/githubed.png")
    }).bind("mouseout",function(){
        $(".github").attr("src","images/github.png")
    });
    $(".blog").bind("mouseover",function(){
        $(".blog").attr("src","images/bloged.png")
    }).bind("mouseout",function(){
        $(".blog").attr("src","images/blog.png")
    });
});