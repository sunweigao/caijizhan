//tab1
function cur(ele){ 
	$(ele).addClass("selected").siblings().removeClass("selected"); 
} 
function tab(id_tab,tag_tab,id_con,tag_con,act){ 
	$(id_tab).find(tag_tab).eq(0).addClass("selected"); 
	$(id_con).find(tag_con).eq(0).show().siblings(tag_con).hide(); 
	if(!act){ act="click"}; 
	if(act=="click"){ 
	$(id_tab).find(tag_tab).each(function(i){ 
	$(id_tab).find(tag_tab).eq(i).click(function(){ 
	cur(this); 
	$(id_con).find(tag_con).eq(i).show().siblings(tag_con).hide();})}) 
} if(act=="mouseover"){ 
	$(id_tab).find(tag_tab).each(function(i){ 
	$(id_tab).find(tag_tab).eq(i).mouseover(function(){ 
	cur(this); 
	$(id_con).find(tag_con).eq(i).show().siblings(tag_con).hide(); 
})})} 
} 
//

//================
$(function(){
	$("#updown").css("top",window.screen.availHeight/2-100+"px");
	$(window).scroll(function() {		
		if($(window).scrollTop() >= 100){
			$('#updown').fadeIn(300); 
		}else{    
			$('#updown').fadeOut(300);    
		}  
	});
	$('#updown .up').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);});
	$('#updown .down').click(function(){$('html,body').animate({scrollTop: document.body.clientHeight+'px'}, 800);});
});

//================
function showMood(){
	$("#mood").load(bloghost+"/zb_users/theme/Sean_Cms/include/them_mood.html");
﻿}
//================
$(document).ready(function(){
	tab("#tri","li","#picbox","ul","mouseover");
	tab("#tri_sidebar","li","#picbox_sidebar","ul","mouseover");
	showMood();var id1=0;id1=window.setInterval("showMood()",60000);
});