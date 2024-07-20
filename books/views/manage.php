<?php $add_book_url = BASE_URL . "books/create"; ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <!--<h3 class="box-title">Responsive Hover Table</h3>-->
                <a class=" button primary" href="<?php echo $add_book_url; ?>">Add a New Book</a>
                <div class="box-tools">
                    <!--<div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="go-right" placeholder="Search">
    
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>-->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <?php echo Pagination::display($pagination_data); ?>
                <table class="table table-hover">
                    <tr>
                        <th>Book ID</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Category</th>
                        <th>Publication Year</th>
                        <th>Cover Image</th>
                        <th>Date Read</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    <?php if (count($rows) > 0) { ?>
                        <?php
                        // display all books
                        
                        foreach ($rows as $row) {
                            $book_id = $row->id;
                            $book_title = $row->book_title;
                            $author_name = $row->author_name;
                            $publisher_name = $row->publisher_name;
                            $category_name = $row->category_name;
                            $publication_year = $row->publication_year;
                            $book_cover_image = $row->book_cover_image;
                            $date_read = $row->date_read;
                            $edit_book_url = BASE_URL . "books/create/" . $row->id;
                            $view_book_url = BASE_URL . "books/show/" . $row->id;
                            $delete_book_url = BASE_URL . "books/submit_delete/" . $update_id;

                            $status = $row->book_status;

                            if ($status == 1) {
                                $status_label = "success";
                                $status_desc = "Active";
                            } else {
                                $status_label = "default";
                                $status_desc = "Inactive";
                            }
                            
                            ?>

                            <tr>
                                <td><?php echo $book_id; ?></td>
                                <td><?php echo $book_title; ?></td>
                                <td><?php echo $author_name; ?></td>
                                <td><?php echo $publisher_name; ?></td>
                                <td><?php echo $category_name; ?></td>
                                <td><?php echo $publication_year; ?></td>
                                <td><?php echo $book_cover_image; ?></td>
                                <td><?php echo $date_read; ?></td>				  
                                <td><a class="button info" href="<?php echo $edit_book_url; ?>">Edit</a></td>


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

