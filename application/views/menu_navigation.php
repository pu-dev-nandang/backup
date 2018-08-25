<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/font-awesome.min.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/datetimepicker/css/bootstrap-datetimepicker.min.css'); ?>" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--    <script src="--><?php //echo base_url('assets/bootstrap/js/jquery.min.js'); ?><!--"></script>-->
    <script src="<?php echo base_url('assets/bootstrap/js/jquery-1.10.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/moment/moment.js'); ?>"></script>

    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/datetimepicker/js/bootstrap-datetimepicker.min.js'); ?>"></script>

</head>

<style>
    #tableDB thead tr th {
        text-align: center;
        background: #884343d9;
        color: #ffffff;
    }
    #tableDB tr td {
        text-align: center;
    }
    .fa-custom-right {
        margin-right: 5px;
    }
</style>

<script>

    $(document).ready(function () {

        window.base_url_js = "<?php echo base_url(); ?>";

        setInterval(function () {
            $('#timeNow').text(moment().format('dddd, d MMM YYYY H:mm:ss'));
        },1000);
    });

    $(document).on('click','#btnReloadDB',function () {
        var url = base_url_js+'backup/reLoadDatabase';

        loadingButton('#btnReloadDB');
        $.get(url,function (result) {
            setTimeout(function () {
                window.location.href='';
            },3000);
        });
    });


    function PopupCenter(url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

        width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    }

    function loadingButton(element) {
        $(element).prop('disabled',true).html('<i class="fa fa-refresh fa-custom-right fa-spin fa-fw"></i> Loading...');
    }

</script>

<body style="background: #607d8b;">

<?php

$db_load = 'db_academic';
if(isset($_SESSION['load_db'])){
    $db_load = $_SESSION['load_db'];
}

?>

<div class="container" style="margin-top: 30px;">
    <div class="row" style="color: #ffffff;margin-bottom: 10px;">
        <div class="col-md-6">
            <button class="btn btn-sm btn-default" id="btnReloadDB"><i class="fa fa-refresh fa-custom-right"></i> Reload DB</button> | DB Active : <span style="color: yellow;font-weight: bold;"><?php  echo $db_load; ?></span>
        </div>
        <div class="col-md-6" style="text-align: right;margin-bottom: 10px;">
            <div id="timeNow">-</div>
        </div>
    </div>
    <div class="row">

        <div class="thumbnail" style="min-height: 100px;padding: 15px;padding-top: 10px;">

            <ul class="nav nav-tabs">
                <li role="presentation" class="<?php if($this->uri->segment(2)=='list-database'){ echo 'active';} ?>">
                    <a href="<?php echo base_url('database/list-database'); ?>"><i class="fa fa-database fa-custom-right"></i> Database</a>
                </li>
                <li role="presentation" class="<?php if($this->uri->segment(2)=='setting-auto-config'){ echo 'active';} ?>">
                    <a href="<?php echo base_url('database/setting-auto-config'); ?>"><i class="fa fa-retweet fa-custom-right"></i> Auto Backup</a>
                </li>

                <li role="presentation" style="float: right;">
                    <a href="#"><i class="fa fa-github-alt fa-custom-right"></i> Github</a>
                </li>
                <li role="presentation" style="float: right;">
                    <a href="#"><i class="fa fa-cogs fa-custom-right"></i> Setting</a>
                </li>
            </ul>

            <div style="margin-top: 30px;">

                <?php echo $page; ?>

            </div>



        </div>
    </div>
</div>

</body>



</html>