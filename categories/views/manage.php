<?php $add_category_url = BASE_URL . "categories/create"; ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a class="button primary" href="<?php echo $add_category_url; ?>">Add a New Category</a>
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
                        <th>Category ID</th>

                        <th>Category Name</th>
                        <th>Category Status</th>

                        <th colspan="2">Actions</th>
                    </tr>
                    <?php if (count($rows) > 0) { ?>
                        <?php
                        // display all categories

                        foreach ($rows as $row) {
                            $category_id = $row->id;
                            $category_name = $row->category_name;

                            $edit_category_url = BASE_URL . "categories/create/" . $row->id;
                            $view_category_url = BASE_URL . "categories/show/" . $row->id;

                            $status = $row->category_status;

                            if ($status == 1) {
                                $status_label = "success";
                                $status_desc = "Active";
                            } else {
                                $status_label = "default";
                                $status_desc = "Inactive";
                            }
                            ?>

                            <tr>
                                <td><?php echo $category_id; ?></td>
                                <td><?php echo $category_name; ?></td>
                                <td>
                                    <span class="label label-<?php echo $status_label; ?>"><?php echo $status_desc; ?></span>
                                </td>

                                <td><a class="button info" href="<?php echo $edit_category_url; ?>">Edit</a></td>


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