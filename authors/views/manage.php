<?php $add_author_url = BASE_URL . "authors/create"; ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a class="button primary" href="<?php echo $add_author_url; ?>">Add a New Author</a>
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
                        <th>Author ID</th>

                        <th>Author Name</th>
                        <th>Author Status</th>

                        <th colspan="2">Actions</th>
                    </tr>
                    <?php if (count($rows) > 0) { ?>
                        <?php
                        // display all authors

                        foreach ($rows as $row) {
                            $author_id = $row->id;
                            $author_name = $row->author_name;

                            $edit_author_url = BASE_URL . "authors/create/" . $row->id;
                            $view_author_url = BASE_URL . "authors/show/" . $row->id;

                            $status = $row->author_status;

                            if ($status == 1) {
                                $status_label = "success";
                                $status_desc = "Active";
                            } else {
                                $status_label = "default";
                                $status_desc = "Inactive";
                            }
                            ?>

                            <tr>
                                <td><?php echo $author_id; ?></td>
                                <td><?php echo $author_name; ?></td>
                                <td>
                                    <span class="label label-<?php echo $status_label; ?>"><?php echo $status_desc; ?></span>
                                </td>

                                <td><a class="button info" href="<?php echo $edit_author_url; ?>">Update</a></td>


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