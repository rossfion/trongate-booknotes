<?= validation_errors() ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h1>Create New Record</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="card">
                <div class="card-heading">
                    Book Details
                </div>
                <div class="card-body">
                    <?php
                    echo form_open($form_location);
                    echo form_label('Book Title');
                    echo form_input('book_title', $book_title);
                    echo form_label('Book Subitle');
                    echo form_input('book_subtitle', $book_subtitle);
                    echo form_label('Book Edition');
                    echo form_input('book_edition', $book_edition);
                    echo form_label('Author');
                    echo form_dropdown('author_id', $author_options, $author_id);
                    echo form_label('Publisher');
                    echo form_dropdown('publisher_id', $publisher_options, $publisher_id);
                    echo form_label('Category');
                    echo form_dropdown('category_id', $category_options, $category_id);
                    echo form_label('Publication Year');
                    echo form_input('publication_year', $publication_year);
                    echo form_label('Book ISBN');
                    echo form_input('book_isbn', $book_isbn);
                    echo form_label('Link To Book Cover');
                    echo form_input('book_cover_image', $book_cover_image);

                    echo form_label('Date Read');
                    $date_attributes = array('type' => 'datepicker');
                    echo form_input('date_read', $date_read, $date_attributes);

                    echo form_label('Book Notes');
                    $attributes = array("id" => "summernote");
                    echo form_textarea('book_notes', $book_notes, $attributes);

                    echo '<div>Book Status: ';
                    echo form_checkbox('book_status', 1, $book_status);
                    echo '</div>';
                    echo form_submit('submit', 'Submit');
                    echo anchor('books/manage', 'Cancel', array("class" => "button alt"));

                    if ($update_id > 0) {
                        $delete_attr['class'] = 'danger go-right';
                        $delete_attr['onclick'] = 'openModal(\'confirm-delete\')';
                        echo form_button('delete', 'Delete', $delete_attr);
                    }


                    echo form_close();
                    ?>
                </div><!-- ./ --end card body -->
            </div><!-- ./ --end card -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!--</div>-->
<!--/.col (right) -->
<!--</div>-->
<!-- /.row -->

<!-- Delete Modal -->

<div class='modal' id='confirm-delete' style='display:none;'>
    <div class = 'modal-heading danger'>Delete Record</div>
    <div class='modal-body'>
        <p>You are about to delete this record. This action cannot be undone. Are you sure?</p>
        <?php
        echo form_open(BASE_URL . 'books/submit_delete/' . $update_id, array('class' => 'text-center'));
        echo form_submit('submit', 'Yes - Delete', array('class' => 'danger'));
        $cancel_attr['class'] = 'alt go right';
        $cancel_attr['onclick'] = 'closeModal()';
        echo form_button('cancel', 'Cancel', $cancel_attr);

        echo form_close();
        ?>
    </div>

</div>