$j(document).ready(function(){
    validator.init();
    common.init();
    $j(".date_picker").datepicker({
        dateFormat:'yy-mm-dd',
        buttonImageOnly:true,
        changeYear:true
    }); 
    $j('button.button,input[type="button"].button,input[type="submit"].button,input[type="reset"].button,button.cancel,input[type="button"]').button();
    $j(".tooolbars #add").button({
            icons: {
                primary: 'ui-icon-plus'
            }
        }).next().button({
            icons: {
                primary: 'ui-icon ui-icon-pencil'
            }
        }).next().button({
            icons: {
                primary: 'ui-icon ui-icon-info'
            }
        }).next().button({
            icons: {
                primary: 'ui-icon ui-icon-link'
            }
        }).next().button({
            icons: {
                primary: 'ui-icon ui-icon-trash'
            }
        }).next().button({
            icons: {
                primary: 'ui-icon ui-icon-refresh'
            }
        }).next().button({
            icons: {
                primary: 'ui-icon ui-icon-disk'
            }
        }).next().button({
            icons: {
                primary: 'ui-icon ui-icon-disk'
            }
        });
    $j('ul.sf-menu').superfish();
});

var common={
    init:function(){
        $j('.jadd_button').click(function(){
            common.add_content(this);
        });
        $j('.jedit_button').click(function(){
            common.edit_content(this);
        });
        $j('.jdelete_button').click(function(){
            common.delete_content(this);
        });
        $j('.jstatus_button').click(function(){
            common.status_content(this);
        });
         $j('.print_view_button').click(function(){
            common.print_view_content(this);
        });

        $j('.add').click(function(){

            var index=$j('#num_image').val();
            var a=  '<tr><td>&nbsp;</td><td><input type="file"  class="text ui-widget-content ui-corner-all width_400" name="image_name_'+index+'"</td><tr>';
            $j('#add_image').append(a);
            index=parseInt(index)+1;
            $j('#num_image').val(index);
            return false;
        });

    },
    add_content:function(obj){
        var url=$j(obj).attr('title');
        window.location=base_url+url;
    },
    edit_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        var url=$j(obj).attr('title');
        window.location=base_url+url+'/'+id;
         return false;
    },
    delete_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        if(confirm('Are you sure want to delete the content?')){
            var url=$j(obj).attr('title');
            window.location=base_url+url+'/'+id;
        }

        return false;
    },
    status_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        var url=$j(obj).attr('title');
        window.location=base_url+url+'/'+id;
        return false;
    },

    print_view_content:function(obj){
        var s=$j("#data_grid").jqGrid('getGridParam','selarrrow');
        if(s.length==0){
            alert('Please select a record!');
            return false;
        }
        var id=s[0];
        var url=$j(obj).attr('title');

        url=url+'/'+id;
        window.open(url);
        return false;
    },
    open_win: function(url)
    {
        TheNewWin=window.open(base_url+url,'Print VIew',"width=360,height=600,menubar=1,status=0,location=1,toolbar=0,scrollbars=yes");
        TheNewWin=window.open(base_url+url,'Print View',"width=500,height=600,menubar=1, status = 0,location = 1,toolbar=0,scrollbars =yes");
        var left   = (screen.width  - width)/2;
        var top    = (screen.height - 600)/2;
        TheNewWin.moveTo(left,top);
    }
}