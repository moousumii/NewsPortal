tinyMCE.init({
    // General options
    mode : "exact",
    elements : "content_1,content_2",
    theme : "advanced",
    width : "300",
    height: "300",
    //plugins : "fullpage,safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template,inlinepopups",
    plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
    content_css : "tools/tiny_mce/themes/content.css",
    // Theme options
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright",
    theme_advanced_buttons2 : "justifyfull,styleselect,formatselect,fontselect,fontsizeselectcut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,",
    theme_advanced_buttons3 : "outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolortablecontrols,|,hr,removeformat,visualaid,|,",
    theme_advanced_buttons4 : "sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons5 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    file_browser_callback : "ajaxfilemanager",
    theme_advanced_resizing : true,
    forced_root_block : false,
    force_br_newlines : true,
    force_p_newlines : false,
    relative_urls : false,
    remove_script_host : false,
    document_base_url : "<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/'; ?>",
    valid_elements : "*[*]",
    extended_valid_elements : "*[*]",
    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "lists/template_list.js",
    external_link_list_url : "lists/link_list.js",
    external_image_list_url : "lists/image_list.js",
    media_external_list_url : "lists/media_list.js",


    // Replace values for the template plugin
    template_replace_values : {
        username : "Some User",
        staffid : "991234"
    }
});

function ajaxfilemanager(field_name, url, type, win) {
    // var ajaxfilemanagerurl = "tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
    switch (type) {
        case "image":
            break;
        case "media":
            break;
        case "flash":
            break;
        case "file":
            break;
        default:
            return false;
    }
    tinyMCE.activeEditor.windowManager.open({
        url: "tools/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
        width: 782,
        height: 440,
        inline : "yes",
        close_previous : "no"
    },{
        window : win,
        input : field_name
    });

}