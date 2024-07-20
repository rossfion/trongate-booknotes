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
                    Publisher Details
                </div>
                <div class="card-body">
                    <?php
                    echo form_open($form_location);
                    echo form_label('Publisher Name');
                    echo form_input('publisher_name', $publisher_name);

                    echo '<div>Publisher Status: ';
                    echo form_checkbox('publisher_status', 1, $publisher_status);
                    echo '</div>';
                    echo form_submit('submit', 'Submit');
                    echo anchor('publishers/manage', 'Cancel', array("class" => "button alt"));

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
</div>
<!--/.col (right) -->
</div>
<!-- /.row -->

<!-- Delete Modal -->

<div class='modal' id='confirm-delete' style='display:none;'>
    <div class = 'modal-heading danger'>Delete Record</div>
    <div class='modal-body'>
        <p>You are about to delete this record. This action cannot be undone. Are you sure?</p>
        <?php
        echo form_open(BASE_URL . 'publishers/submit_delete/' . $update_id, array('class' => 'text-center'));
        echo form_submit('submit', 'Yes - Delete', array('class' => 'danger'));
        $cancel_attr['class'] = 'alt go right';
        $cancel_attr['onclick'] = 'closeModal()';
        echo form_button('cancel', 'Cancel', $cancel_attr);

        echo form_close();
        ?>
    </div>

</div>