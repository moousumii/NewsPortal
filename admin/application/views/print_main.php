<html>
    <head>
        <title>Print <?=$page_title?></title>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
        <base href="<?=base_url()?>" />
        <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>style/print_style.css">
        <script type="text/javascript">
            <!--
            function printthispage() {
                //window.print();
                if (navigator.appName == "Microsoft Internet Explorer")
                {
                  var PrintCommand = '<object ID="PrintCommandObject" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></object>';
                  document.body.insertAdjacentHTML('beforeEnd', PrintCommand);
                  PrintCommandObject.ExecWB(6, -1); PrintCommandObject.outerHTML = "";
                }
                else {
                  window.print();
                }
            }
            //-->
        </script>
    </head>
    <body onload="printthispage()">
        <div><img src="images/logo1.png" alt="alt"/></div>
        <div class="doc_wrapper mar_0_auto txt_center">
            <div class="inner mar_0_auto">
                <div class="header_wrapper txt_center">
                    <div style="text-align:center;">
                    <?=date('d-m-Y H:i')?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="pad_10 m_height">
                    <?php include_once $dir . '/' . $page . '.php'; ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>