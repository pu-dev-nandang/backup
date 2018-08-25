
<style>
    .h4-heading {
        margin-top: 5px;
        font-weight: bold;
        padding-left: 10px;

    }

    .h4-daily {
        border-left: 10px solid #ff9800;
    }

    .h4-weekly {
        border-left: 10px solid #2196f3;
    }

    .h4-monthly {
        border-left: 10px solid #607d8b;
    }

    .thumbnail-auto {
        position: relative;
        min-height: 100px;
        padding: 10px;
        /*background: #f6f6f6;*/
    }

    .thumbnail-auto-daily {
        border-top: 5px solid #ff9800;
    }
    .thumbnail-auto-weekly {
        border-top: 5px solid #2196f3;
    }
    .thumbnail-auto-monthly {
        border-top: 5px solid #607d8b;
    }

    .thumbnail-auto .status-active {
        position: absolute;
        top: 0;
        right: 0;
        background: #4caf50;
        height: 20px;
        width: 100px;
        color: #fff;
        text-align: center;
        padding: 3px;
        font-size: 10px;
        margin-top: 3px;
    }

    .thumbnail-auto .status-nonactive{
        position: absolute;
        top: 0;
        right: 0;
        background: #9e9e9e;
        height: 20px;
        width: 100px;
        color: #fff;
        text-align: center;
        padding: 3px;
        font-size: 10px;
        margin-top: 3px;
    }
</style>

<div class="row">
    <div class="col-md-4">
        <div class="thumbnail thumbnail-auto thumbnail-auto-daily">
            <div class="status-active">
                <i class="fa fa-check fa-custom-right"></i> Active
            </div>

            <h4 class="h4-heading h4-daily">Daily Backup</h4>
            <hr/>

            <div class="form-group">
                <label>Choose Time</label>
                <input class="form-control" id="formDaily" />
            </div>
            <div class="form-group">
                <label>Select DB</label>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <?php for($i=0;$i<count($dataDB);$i++){
                            if($i==0){
                                echo "<tr>";
                            } else if($i%3==0){
                                echo "</tr><tr>";
                            }

                            ?>

                            <td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="option1"> <?php echo $dataDB[$i]; ?>
                                </label>
                            </td>

                        <?php } ?>
                    </table>
                </div>

            </div>

            <hr/>
            <div style="text-align: right;">
                <button class="btn btn-danger">Set Non Active</button> |
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="thumbnail thumbnail-auto thumbnail-auto-weekly">
            <div class="status-nonactive">
                <i class="fa fa-times fa-custom-right"></i> Non-Active
            </div>
            <h4 class="h4-heading h4-weekly">Weekly Backup</h4>
            <hr/>

            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Select Day</label>
                        <select class="form-control" id="formWeeklyDay"></select>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Choose Time</label>
                        <input class="form-control" id="formWeeklyTime" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select DB</label>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <?php for($i=0;$i<count($dataDB);$i++){
                                    if($i==0){
                                        echo "<tr>";
                                    } else if($i%3==0){
                                        echo "</tr><tr>";
                                    }

                                    ?>

                                    <td>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1"> <?php echo $dataDB[$i]; ?>
                                        </label>
                                    </td>

                                <?php } ?>
                            </table>
                        </div>

                    </div>
                    <hr/>
                    <div style="text-align: right;">
                        <button class="btn btn-danger">Set Non Active</button> |
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="thumbnail thumbnail-auto thumbnail-auto-monthly">
            <div class="status-nonactive">
                <i class="fa fa-times fa-custom-right"></i> Non-Active
            </div>
            <h4 class="h4-heading h4-monthly">Montly Backup</h4>
            <hr/>

            <div class="row">
                <div class="col-xs-5">
                    <div class="form-group">
                        <label>Select Date</label>
                        <select class="form-control" id="formMontlyDate"></select>
                    </div>
                </div>
                <div class="col-xs-7">
                    <div class="form-group">
                        <label>Choose Time</label>
                        <input class="form-control" id="formMonthlyIme" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select DB</label>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <?php for($i=0;$i<count($dataDB);$i++){
                                    if($i==0){
                                        echo "<tr>";
                                    } else if($i%3==0){
                                        echo "</tr><tr>";
                                    }

                                    ?>

                                    <td>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1"> <?php echo $dataDB[$i]; ?>
                                        </label>
                                    </td>

                                <?php } ?>
                            </table>
                        </div>

                    </div>
                    <hr/>
                    <div style="text-align: right;">
                        <button class="btn btn-danger">Set Non Active</button> |
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>



    $(function () {

        var weekArray = moment.weekdays();

        $('#formWeeklyDay,#formMontlyDate').empty();
        $('#formWeeklyDay').append('<option value="" disabled selected>Selc. Day</option>');
        $('#formWeeklyDay').append('<option value="" disabled>----------</option>');
        for(var i=0;i<weekArray.length;i++){
            $('#formWeeklyDay').append('<option value="'+i+'">'+weekArray[i]+'</option>');
        }

        $('#formMontlyDate').append('<option value="" disabled selected></option>');
        for(var d=1;d<29;d++){
            $('#formMontlyDate').append('<option value="'+d+'">'+d+'</option>');
        }
        // $('#formMontlyDate1').datetimepicker({
        //     // format: 'MMM Do'
        //     format: 'Do'
        // });

        $('#formDaily,#formWeeklyTime,#formMonthlyIme').datetimepicker({
            format: 'LT'
        });
    });

</script>