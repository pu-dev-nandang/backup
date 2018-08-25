<div class="row">
    <div class="col-md-12">

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="tableDB">
                <thead>
                <tr>
                    <th style="width: 2%;">No</th>
                    <th>Database</th>
                    <th style="width: 5%;">BC</th>
                    <th style="width: 25%;">Last Backup</th>
                    <th style="width: 25%;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;

                foreach ($arrDataDB as $item){ ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td style="text-align: left;"><?php echo $item['Name']; ?></td>
                        <td><?php echo $item['BC']; ?></td>
                        <td><?php echo $item['LastBackup']; ?></td>
                        <td>
                            <button class="btn btn-sm btn-success"><i class="fa fa-cloud-upload fa-custom-right"></i> Backup</button> |
                            <a href="<?php echo base_url('backup/download/'.$item['Name']); ?>" target="_blank" class="btn btn-sm btn-primary btnDownloadDB" ><i class="fa fa-download fa-custom-right"></i> Download</a>
                        </td>
                    </tr>
                <?php }



                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>

    $(document).ready(function () {
        // var url = base_url_js+'backup/download/db_va';
        // PopupCenter(url,'xtf','1300','500');

    });
    
    $('.btnDownloadDB3').click(function () {
        var db = $(this).attr('data-db');
        var url = base_url_js+'backup/download/'+db;

        $.get(url,function (result) {

        });
    });


</script>