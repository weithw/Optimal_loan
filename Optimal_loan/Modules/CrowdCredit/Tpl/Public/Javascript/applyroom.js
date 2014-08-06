window.onload=function(){
	v_scroll(
		document.getElementById('cshort'),
		document.getElementById('clong'),
		document.getElementById('chatcontent'),
		document.getElementById('chatcontentstage')
		);
	v_scroll(
		document.getElementById('mshort'),
		document.getElementById('mlong'),
		document.getElementById('members'),
		document.getElementById('membersstage')
		);
	init();
}
function init () {
	maskformsuit();
	bindevents();
	stopPropagation();
	/****************/
	loopAsk();
	sendMsg();
	MemberJoin();
	MemberCollect();

	quitJoin();
	quitCollect();
	HostKick();
	HostStart();
	HostDestroy();
	/******************/
}

function loopAsk() {
	timer1=setInterval(function() {
		$.post(URL+"/sayprocess",{rid:getRId()},function(data) {
			var container = $("#chatcontent").find("ul").eq(0);
			var contain ='';
			
			var length = data.length ;

			for(var i = 0 ; i< length ; i++) {
				contain += '<li>';
				contain += data[i].user;
				contain += parseTime(parseInt(data[i].time));
				contain += ':';
				contain += data[i].content;				
				contain += '</li>';
			}
			// contain.substr(1,contain.length-1);
			container.html(contain);
			//alert(contain);
		})
	},500);
	setInterval(function() {
		$.post(URL+"/chatroom",{rid:getRId()},function(data) {
		})
	},500);	
}
function sendMsg() {
	$(".send").click(function(){
		var username = $(this).parent().attr("username");
		var rid = $(this).parent().attr("roomid");
		var content = $(".sendcontent").val();
		var time = (new Date).getTime();
		$.post(URL+"/upprocess",{user:username,rid:rid,content:content,time:time},function(){

		});
	})
}
function MemberJoin() {
	$(".memberJoin").click(function(){
		var rid = getRId();
		
		$.post(URL+"/join",{rid:rid},function(){
				window.location.href=window.location.href;
		});
	})
}
function quitJoin() {
	$(".quitJoin").click(function(){
		var rid = getRId();
		
		$.post(URL+"/quitjoin",{rid:rid},function(){
				 window.location.href=window.location.href;
		});
	})
}
function MemberCollect() {
	$(".MemberCollect").click(function(){
		
		var rid = getRId();

		$.post(URL+"/collect",{rid:rid},function(){
				window.location.href=window.location.href;
		});
	})
}
function quitCollect() {
	$(".quitCollect").click(function(){
		
		var rid = getRId();

		$.post(URL+"/quitCollect",{rid:rid},function(){
				window.location.href=window.location.href;
		});
	})
}

function HostKick() {
	$(".Hostkick").click(function(){
		var rid = getRId();
		var id=getId(this);
		$.post(URL+"/Hostkick",{id:id,rid:rid},function(){
				window.location.href=window.location.href;
		});
	})
}
function HostStart() {
	$(".HostStart").click(function(){
		
		var rid = getRId();
		var container = $("#chatcontent").find("ul").eq(0);
		var contain = "";
		
		contain+= "房主开始准备贷款，请进入<br/>";
		var enterURL=URL.substr(0,URL.length-9);
		contain+="<a href=" +enterURL +"/Contract/index/ID/"+pageID+">这里</a>";
		contain+="签署合同";
		
		// contain+="</li>";
		var username = $(this).attr("username");
		var rid = getRId();
		var time = (new Date).getTime();
		$.post(URL+"/upprocess",{user:username,rid:rid,content:contain,time:time},function(){

		});
	})
}
function HostDestroy() {
	$(".HostDestroy").click(function(){
		
		var rid = getRId();
		$.post(URL+"/HostDestroy",{rid:rid},function(){
				window.location.href=roomURL;
		});
	})
}

function stopPropagation() {
	$("input").click(function(e){
		e = e || event;
		e.stopPropagation();
	})
}
function getId(obj){
	return $(obj).attr("id");
}
function getRId(){
	return $("#membersstage").attr("roomid");
}
function parseTime(time) {
	var t = new Date(time);
	//
	return "["+t.getHours()+":"+t.getMinutes()+":"+t.getSeconds()+"]";
}



function v_scroll(that , box , text , text_box ){
	var thatX ;
	var thatY ;
	var t=0;
	var move=function(e){
		e = e || event;
		e.preventDefault();
		if(text.offsetHeight<text_box.offsetHeight){
			return;
		}
		if(t<0){
			t=0;
		}
		if(box.offsetHeight-that.offsetHeight<t){
			t=box.offsetHeight-that.offsetHeight;
		}
		var scale = t/(box.offsetHeight-that.offsetHeight);
		//add fantacy move 
		that.style.top = t+'px';
		text.style.top = parseInt(-(text.offsetHeight-text_box.offsetHeight)*scale)+'px';
	}
	var mm=function(e){
		var oevent = e||event;
		t = oevent.clientY-thatY;
		move();
	}
	var md=function(e){	
		var oevent = e||event;
		thatY = oevent.clientY-that.offsetTop;	
		myevent(document , 'mousemove' , mm);
		myevent(document , 'mouseup' , function(){
			myevent(document , 'mousemove' ,mm ,'unbind');
			myevent(that , 'mousedown' ,md ,'unbind');
			v_scroll(that , box , text , text_box );
			if(document.releaseCapture){
				that.releaseCapture();
			}
		});
		return false;
	}
	myevent(that , 'mousedown' , md);

	if(document.setCapture){
		that.setCapture();
	}
	var mw=function(e){
		var eve=e||event;
		eve.preventDefault()
		var down = true;
		down = eve.wheelDelta?eve.wheelDelta<0:eve.detail>0;
		if(down){
			t+=20;
		}else{
			t-=20;
		}
		move();
	}
	myevent(text_box , 'mousewheel' ,mw);
	myevent(text_box , 'DOMMouseScroll' ,mw);
}
function myevent(who , what , func ,on_off){		
	if(who.attachEvent){
		who.attachEvent('on'+what , func);
		if(on_off==null)
			return ;
		who.detachEvent('on'+what , func)
		
	}
	else{
		who.addEventListener(what , func ,false);
		if(on_off==null)
			return ;
		who.removeEventListener(what ,func ,false);
	
	}
}
function bindevents(){
	var spans = getByClass(document,"user");
	for(var i = 0 , length = spans.length ; i < length ; i++){
		spans[i].onclick = function() {

			document.getElementById("mask").style.display = "block";
			document.getElementById("maskform").style.display = "block";
		}
	}
	document.getElementById("exit").onclick = function() {
		document.getElementById("mask").style.display = "none" ;
		document.getElementById("maskform").style.display = "none" ;
	}
	window.onresize = function() {
		maskformsuit();
	}
}
function maskformsuit() {
	var cwidth = document.body.clientWidth || document.documentElement.clientWidth;
	document.getElementById("maskform").style.left = (cwidth - 350)/2 + "px";
	document.getElementById("maskform").style.top = "150px";
}
var getByClass = function(oParent, sClass) {
    var aEle=oParent.getElementsByTagName('*');
    var aResult=[];
    var re=new RegExp('\\b'+sClass+'\\b', 'i');
    var i=0;
    for(i=0;i<aEle.length;i++)
    {
        if(re.test(aEle[i].className))
        {
            aResult.push(aEle[i]);
        }
    }
    return aResult;
}