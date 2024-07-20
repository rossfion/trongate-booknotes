<?php

class Publishers extends Trongate {

    private $default_limit = 6;

    function get_all_publishers() {
        $sql = 'SELECT * FROM publishers ORDER BY publisher_name';
        $data['rows'] = $this->model->query($sql, 'object');
        //json($all_rows);
        $options[''] = 'Please Select ...';
        foreach ($data['rows'] as $row) {
            $author_id = $row->publisher_id;
            $author_name = $row->publisher_name;

            echo '<option value="' . $publisher_id . '">' . ucfirst($publisher_name) . '</option>';
        }
    }

    function _reduce_rows($all_rows) {
        $rows = [];
        $start_index = $this->_get_offset();
        $limit = $this->_get_limit();
        $end_index = $start_index + $limit;

        $count = -1;
        foreach ($all_rows as $row) {
            $count++;
            if (($count >= $start_index) && ($count < $end_index)) {
                $row->publisher_status = ($row->publisher_status == 1 ? 'yes' : 'no');
                $rows[] = $row;
            }
        }

        return $rows;
    }

    function _get_selected_per_page() {
        if (!isset($_SESSION['selected_per_page'])) {
            $selected_per_page = $this->per_page_options[1];
        } else {
            $selected_per_page = $_SESSION['selected_per_page'];
        }

        return $selected_per_page;
    }

    function set_per_page($selected_index) {
        /* $this->module('trongate_security');
          $this->trongate_security->_make_sure_allowed(); */

        if (!is_numeric($selected_index)) {
            $selected_index = $this->per_page_options[1];
        }

        $_SESSION['selected_per_page'] = $selected_index;
        redirect('authors/manage');
    }

    function _get_limit() {
        if (isset($_SESSION['selected_per_page'])) {
            $limit = $this->per_page_options[$_SESSION['selected_per_page']];
        } else {
            $limit = $this->default_limit;
        }

        return $limit;
    }

    function _get_offset() {
        $page_num = segment(3);

        if (!is_numeric($page_num)) {
            $page_num = 0;
        }

        if ($page_num > 1) {
            $offset = ($page_num - 1) * $this->_get_limit();
        } else {
            $offset = 0;
        }

        return $offset;
    }

    function _get_data_from_db($update_id) {
        $record_obj = $this->model->get_where($update_id, 'publishers');

        if ($record_obj == false) {
            $this->template('error_404');
            die();
        } else {
            $data = (array) $record_obj;
            return $data;
        }
    }

    function _get_data_from_post() {
        $data['publisher_name'] = post('publisher_name', TRUE);
        $data['publisher_status'] = post('publisher_status', TRUE);

        return $data;
    }

    function show($update_id) {
        $data = $this->_get_data_from_db($update_id);
        $data['update_id'] = $update_id;
        $data['view_module'] = 'publishers';
        $data['view_file'] = 'show';
        $this->template('admin', $data);
    }

    function submit() {
        /* $this->module('trongate_security');
          $this->trongate_security->_make_sure_allowed(); */

        $submit = post('submit', true);

        if ($submit == 'Submit') {

            $this->validation_helper->set_rules('publisher_name', 'Publisher Name', 'required|min_length[2]|max_length[255]');

            $result = $this->validation_helper->run();

            if ($result == true) {

                $update_id = segment(3);
                $data = $this->_get_data_from_post();
                $data['publisher_status'] = ($data['publisher_status'] == 1 ? 1 : 0);

                if (is_numeric($update_id)) {
                    //update an existing record
                    $this->model->update($update_id, $data, 'publishers');
                    $flash_msg = 'The record was successfully updated';
                } else {
                    //insert the new record
                    $update_id = $this->model->insert($data, 'publishers');
                    $flash_msg = 'The record was successfully created';
                }

                set_flashdata($flash_msg);
                redirect('publishers/show/' . $update_id);
            } else {
                //form submission error
                $this->create();
            }
        }
    }

    function create() {
        /* $this->module('trongate_security');
          $this->trongate_security->_make_sure_allowed(); */
        $update_id = segment(3);
        $submit = post('submit');

        if (($submit == '') && (is_numeric($update_id))) {
            $data = $this->_get_data_from_db($update_id);
        } else {
            $data = $this->_get_data_from_post();
        }

        if (is_numeric($update_id)) {
            $data['headline'] = 'Update Publisher Record';
            $data['cancel_url'] = BASE_URL . 'publishers/show/' . $update_id;
        } else {
            $data['headline'] = 'Create New Publisher Record';
            $data['cancel_url'] = BASE_URL . 'publishers/manage';
        }
        $data['update_id'] = $update_id;
        $data['form_location'] = BASE_URL . 'publishers/submit/' . $update_id;
        $data['view_file'] = 'create';
        $this->template('admin', $data);
    }

    function submit_delete() {
        $update_id = segment(3, 'int');
        $this->model->delete($update_id);
        set_flashdata('The record was successfully deleted');
        redirect('publishers/manage');
    }

    function manage() {
        $sql = 'SELECT * FROM publishers';
        $all_rows = $this->model->query($sql, 'object');
        //json($all_rows);
        $pagination_data['total_rows'] = count($all_rows);
        $pagination_data['page_num_segment'] = 3;
        $pagination_data['limit'] = $this->_get_limit();
        $pagination_data['pagination_root'] = 'publishers/manage';
        $pagination_data['record_name_plural'] = 'publishers';
        $pagination_data['include_showing_statement'] = true;
        $data['pagination_data'] = $pagination_data;

        $data['rows'] = $this->_reduce_rows($all_rows);
        $data['view_module'] = 'publishers';
        $data['view_file'] = 'manage';
        $this->template('admin', $data);
    }

}
