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
    <script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/moment/moment.js'); ?>"></script>


<!--    <script type="text/javascript" src="/path/to/bootstrap/js/transition.js"></script>-->
<!--    <script type="text/javascript" src="/path/to/bootstrap/js/collapse.js"></script>-->
<!--    <!-- Include all compiled plugins (below), or include individual files as needed -->-->
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

<body style="background: #607d8b;">

<div class="container" style="margin-top: 30px;">
    <div class="row" style="color: #ffffff;">
        <div class="col-md-6">
            DB Active : <span style="color: yellow;font-weight: bold;">db_academic</span>
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
                    <a href="<?php echo base_url('database/setting-auto-config'); ?>"><i class="fa fa-cog fa-custom-right"></i> Setting Auto Backup</a>
                </li>
                <li role="presentation" style="float: right;">
                    <a href="#"><i class="fa fa-github-alt fa-custom-right"></i> Github Setting</a>
                </li>
            </ul>

            <div style="margin-top: 30px;">

                <?php echo $page; ?>

            </div>



        </div>
    </div>
</div>

</body>

<script>

    $(document).ready(function () {

        setInterval(function () {
            $('#timeNow').text(moment().format('dddd, d MMM YYYY H:mm:ss'));
        },1000);
    });

</script>

</html>