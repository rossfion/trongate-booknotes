<?php $add_publisher_url = BASE_URL . "publishers/create"; ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a class="button primary" href="<?php echo $add_publisher_url; ?>">Add a New Publisher</a>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <?php echo Pagination::display($pagination_data); ?>
                <table class="table table-hover">
                    <tr>
                        <th>Publisher ID</th>

                        <th>Publisher Name</th>
                        <th>Publisher Status</th>

                        <th colspan="2">Actions</th>
                    </tr>
                    <?php if (count($rows) > 0) { ?>
                        <?php
                        // display all publishers

                        foreach ($rows as $row) {
                            $publisher_id = $row->id;
                            $publisher_name = $row->publisher_name;

                            $edit_publisher_url = BASE_URL . "publishers/create/" . $row->id;
                            $view_publisher_url = BASE_URL . "publishers/show/" . $row->id;

                            $status = $row->publisher_status;

                            if ($status == 1) {
                                $status_label = "success";
                                $status_desc = "Active";
                            } else {
                                $status_label = "default";
                                $status_desc = "Inactive";
                            }
                            ?>

                            <tr>
                                <td><?php echo $publisher_id; ?></td>
                                <td><?php echo $publisher_name; ?></td>
                                <td>
                                    <span class="label label-<?php echo $status_label; ?>"><?php echo $status_desc; ?></span>
                                </td>

                                <td><a class="button info" href="<?php echo $edit_publisher_url; ?>">Edit</a></td>


                            </tr>
                        <?php }
                    } ?>
                </table>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>