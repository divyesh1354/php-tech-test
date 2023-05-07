var Custom = function () {

    // private functions & variables

    var dispMessage = function(sType,sText) {
        toastr[sType.toLowerCase()](sText, sType);
    }

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.            
        },

        //some helper function
        myNotification: function (sType,sText) {
            dispMessage(sType,sText);
        }

    };

}();
$(function () {
    var url = window.location;
    $('.page-sidebar-menu  a[href="' + url + '"]').parent('li').addClass('active');
    $('.page-sidebar-menu a').filter(function () {
        return this.href == url;
    }).parent('li').addClass('active').parent('ul').parent('li').addClass('active open');
});

function setTitle( aoData,a ) {
    aoTitles = []; // this array will hold title-based sort info
    oSettings = a.fnSettings();  // the oSettings will give us access to the aoColumns info
    i = 0;
    for (ao in aoData) {
        name = aoData[ao].name;
        value = aoData[ao].value;

        if (name.substr(0,"iSortCol_".length) == "iSortCol_") {
            // get the column number from "ao"
            iCol = parseInt(name.replace("iSortCol_", ""));
            sName = "";
            if (oSettings.aoColumns[value]) sName = oSettings.aoColumns[value].sName;
            // create an entry in aoTitles (which will later be appended to aoData) for this column
            aoTitles.push( { name: "iSortTitle_"+iCol, value: sName});
            i++;
        }
         
    }
 
    // for each entry in aoTitles, push it onto aoData
     for (ao in aoTitles)   aoData.push( aoTitles[ao] );
}


$(document).on('switch-change','.make-switch', function(event, state) {
        
    $(this).prop('checked', state.value);
    var val = state.value ? 'y' : 'n';
    var url = $(this).data('url');
    var id = $(this).data('id');
    var table = $(this).data('getaction');
       
    $.post(url,{action:'change_status',table:table,value:val,id:id},function(r){
        sType = getStatusText(r.status);
        sText = r.message;
        Custom.myNotification(sType,sText);
    },'json');
});
$(document).on('click','.btnDelete', function(event, state) 
{
    var conf = confirm("Are you sure you want to delete this?");
    if(conf)
    {
        var url = $(this).data('url');
        var id = $(this).data('id');               
        $.post(url,{action:'delete',id:id},function(r){
            sType = getStatusText(r.status);
            sText = r.message;
            Custom.myNotification(sType,sText);
            oTable.fnDraw();
        },'json');
    }
    
});

//cancel or delete bids
$(document).on('click','.quotecancel', function(event, state) 
{
    var conf = confirm("Are you sure you want to cancel this ?");
    if(conf)
    {
        var url = $(this).data('url');
        var id = $(this).data('id');               
        $.post(url,{action:'cancel',id:id},function(r){
            sType = getStatusText(r.status);
            sText = r.message;
            Custom.myNotification(sType,sText);
            $("#bidarea"+id).remove();
        },'json');


    }
    
});

//approve quote
$(document).on('click','.quoteapprove', function(event, state) 
{
    var url = $(this).data('url');
    var id = $(this).data('id');               
    $.post(url,{action:'approve',id:id},function(r){
        sType = getStatusText(r.status);
        sText = r.message;
        Custom.myNotification(sType,sText);
        refresh_bids();
        //location.reload();
    },'json');
    
});

/*$(document).on('click','.provider', function(event, state) 
{
    var url = $(this).data('url');
    var id = $(this).data('id');  
                 
    $.post(url,{action:'getinfo',id:id},function(r){
        
        $("#providermodel").html(r.html);
        
    },'json');
});*/

function getStatusText(code)
{
    sText = "";
    if(code !== undefined)
    {
        switch(code)
        {
            case 200:{ sText = 'Success';break;}
            case 404:{ sText = 'Error';break;}
            case 403:{ sText = 'Error';break;}
            case 500:{ sText = 'Error';break;}
            default:{sText = 'Error';}
            
        }
    }
    return sText;
}
function addOverlay(tag,type){
    //$('<div id="overlayDocument"><img src="'+SITE_URL+'themes/front/images/ajax-loading.gif" /></div>').appendTo(tag)
    type =='undefined'?$('<div id="overlayDocument"><img src="'+SITE_URL+'themes/front/images/ajax-loading.gif" /></div>').appendTo(tag):$(tag).html('<div id="overlayDocument"><img src="'+SITE_URL+'themes/front/images/ajax-loading.gif" /></div>');
}
function removeOverlay(tag){$('#overlayDocument').remove();}
function scrollToElement(e){$('html, body').animate({scrollTop:$(e).offset().top - 100},'slow');}

$(document).on('click','.btnEdit,.btnView',function(e){
    e.preventDefault();
    var $this = $(this);
    var id = $this.data('id');
    var type = $this.data('type');
    var editLink = $(this).data('url');
    
    $.post(editLink,{id:id,type:type},function(r){
        if(r.status == 200)
        {
            $(".pageform").html(r.html);
            $('.portlet-toggler').toggle();
            scrollToElement(".page-content");
        }
        else
        {
            sText = r.msg;
            Custom.myNotification('Error',sText);
        }        
    },'json');
});

$(document).on('click','.btn-toggler',function(e){
    e.preventDefault();
    $('.portlet-toggler').toggle();
});
function image_crop(width,ratio,minX,minY,maxX,maxY)
{
  var w1 = width;
  var h1 = (ratio)*w1;
  jQuery(function($){
    var jcrop_api,boundx,boundy;
    $('#crop_image').Jcrop({
      boxWidth:width,
      onChange: updateCoords,
      onSelect: updateCoords,
      setSelect: [ 0, 0, w1, h1 ],
      minSize:[minX,minY],
      maxSize:[maxX,maxY],
      aspectRatio: ratio      
    },function(){
      // Use the API to get the real image size
      var bounds = this.getBounds();
      boundx = bounds[0];
      boundy = bounds[1];
      // Store the API in the jcrop_api variable
      jcrop_api = this;
      // Move the preview into the jcrop container for css positioning      
    });
    function updateCoords(c)
    {
       $('#x').val(c.x);
        $('#y').val(c.y);
      $('#w').val(c.w);
      $('#h').val(c.h);
    };

  });
} 
function web_email_status(module,email_status,id)
{
  $.post(SITE_URL+'user/web_email_status',{module:module,email_status:email_status,id:id},function(r){
    sType = getStatusText(r.status);
    sText = r.message;
    Custom.myNotification(sType,sText);
  },'json');
}
function web_delete(module,id)
{
  $.post(SITE_URL+'user/web_delete',{module:module,id:id},function(r){
    
    if(r.status == 200)
    {
      $('#row_'+id).remove();
    }
    sType = getStatusText(r.status);
    sText = r.message;
    Custom.myNotification(sType,sText);
  },'json');
}
function web_finding(id,action,url)
{
    $.post(SITE_URL+url,{action:action,id:id},function(r){
        $('.portlet-toggler.pageform').html(r.html);
        $('.portlet-toggler').toggle();
        return false;
  },'json');    

}
function back_portlet()
{
  $('.portlet-toggler').toggle();  
}
function add_btn_overlay()
{
  $('button:submit').attr("disabled", true);
}
function remove_btn_overlay()
{
  $('button:submit').attr("disabled", false);
}
