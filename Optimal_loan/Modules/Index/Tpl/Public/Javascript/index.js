$(document).ready(function(){
	index.init();
})
function change_code(obj){
	$('#vd3').attr("src",vetifyURL+'/'+Math.random());
	return false;
}
var index = {
	currentIntro : -1 ,
	bufferText : "" ,
	minZIndex : 1 ,
	onMouseAction : function() {
		$(".introBtn").bind("mouseover",function(){
			var _this = $(this);
			var id = _this.attr("id");
			id = id.substring(id.length - 1);
			if (id == index.currentIntro) {
				return;
			};
			//picture change
			$("#introImgStage"+id).css({
				height:"0%",
				zIndex:index.minZIndex+1
			}).animate({
				height:"100%"
			});
			index.minZIndex+=1;

			//text change
			$("#introOverroll").stop().animate({
				opacity:0
			})
			$("#intro"+index.currentIntro).stop().animate({
				opacity:0
			});
			$("#intro"+id).stop().animate({
				opacity:1
			});
			index.currentIntro = id;
		});
	},
	taggleAction : function() {
		document.getElementById("log").onclick = function() {
			document.getElementById("login").style.display = "none";
			document.getElementById("register").style.display = "block";
		}
		document.getElementById("reg").onclick = function() {
			document.getElementById("register").style.display = "none";
			document.getElementById("login").style.display = "block";
		}
	},
	getByClass : function(oParent, sClass) {
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
	},
	init : function() {
		index.onMouseAction();
		index.taggleAction();
	}
}