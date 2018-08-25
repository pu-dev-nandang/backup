<div class="row">
    <div class="col-md-12">
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
            for($i=0;$i<count($dataDB);$i++){ ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td style="text-align: left;"><?php echo $dataDB[$i]; ?></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button class="btn btn-sm btn-success"><i class="fa fa-cloud-upload fa-custom-right"></i> Backup</button> |
                        <button class="btn btn-sm btn-primary" id="btnDownloadDB"><i class="fa fa-download fa-custom-right"></i> Download</button>
                    </td>
                </tr>
            <?php }

            ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    
    $('#btnDownloadDB').click(function () {
        
    });


</script>