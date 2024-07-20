<?php

class Books extends Trongate {

    private $default_limit = 6;

    function index() {
        $sql = 'SELECT * FROM books ORDER BY date_added DESC';
        $all_rows = $this->model->query($sql, 'object');
        //json($all_rows);
        $pagination_data['total_rows'] = count($all_rows);
        $pagination_data['page_num_segment'] = 3;
        $pagination_data['limit'] = $this->_get_limit();
        $pagination_data['pagination_root'] = 'books/index';
        $pagination_data['record_name_plural'] = 'books';
        $pagination_data['include_showing_statement'] = true;
        $data['pagination_data'] = $pagination_data;

        $data['rows'] = $this->_reduce_rows($all_rows);
        $data['view_module'] = 'books';
        $data['view_file'] = 'index';
        $this->template('public', $data);
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
                $row->book_status = ($row->book_status == 1 ? 'yes' : 'no');
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
        redirect('booknotes/manage');
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
        $record_obj = $this->model->get_where($update_id, 'books');

        if ($record_obj == false) {
            $this->template('error_404');
            die();
        } else {
            $data = (array) $record_obj;
            return $data;
        }
    }

    function _get_data_from_post() {
        $data['book_title'] = post('book_title', TRUE);
        $data['book_subtitle'] = post('book_subtitle', TRUE);
        $data['book_edition'] = post('book_edition', TRUE);
        $data['author_id'] = post('author_id', TRUE);
        $data['publisher_id'] = post('publisher_id', TRUE);
        $data['category_id'] = post('category_id', TRUE);
        $data['publication_year'] = post('publication_year', TRUE);
        $data['book_isbn'] = post('book_isbn', TRUE);
        $data['book_url'] = post('book_url', TRUE);
        $data['book_cover_image'] = post('book_cover_image', TRUE);
        $data['date_read'] = post('date_read', TRUE);
        $data['book_notes'] = post('book_notes', TRUE);
        $data['book_status'] = post('book_status', TRUE);

        return $data;
    }

    function show($update_id) {
        $data = $this->_get_data_from_db($update_id);
        $data['update_id'] = $update_id;
        $data['view_module'] = 'books';
        $data['view_file'] = 'show';
        $this->template('public', $data);
    }

    function most_recent() {

        if (isset($_POST['most-recent'])) {
            //$submit = post('most-recent', true); // throws an array to string conversion error
            $sql = 'SELECT * FROM books ORDER BY date_read DESC';
            $all_rows = $this->model->query($sql, 'object');
            //json($all_rows);
            $pagination_data['total_rows'] = count($all_rows);
            $pagination_data['page_num_segment'] = 3;
            $pagination_data['limit'] = $this->_get_limit();
            $pagination_data['pagination_root'] = 'books/most_recent';
            $pagination_data['record_name_plural'] = 'books';
            $pagination_data['include_showing_statement'] = true;
            $data['pagination_data'] = $pagination_data;

            $data['rows'] = $this->_reduce_rows($all_rows);
            $data['view_module'] = 'books';
            $data['view_file'] = 'most_recent';
            $this->template('public', $data);
            //var_dump($data);
        }
    }

    function titles() {

        // $submit = post('book-titles', true); throws an array to string conversion error
        if (isset($_POST['book-titles'])) {
            $sql = 'SELECT * FROM books ORDER BY book_title ASC, date_added DESC';
            $all_rows = $this->model->query($sql, 'object');
            //json($all_rows);
            $pagination_data['total_rows'] = count($all_rows);
            $pagination_data['page_num_segment'] = 3;
            $pagination_data['limit'] = $this->_get_limit();
            $pagination_data['pagination_root'] = 'books/titles';
            $pagination_data['record_name_plural'] = 'books';
            $pagination_data['include_showing_statement'] = true;
            $data['pagination_data'] = $pagination_data;

            $data['rows'] = $this->_reduce_rows($all_rows);
            $data['view_module'] = 'books';
            $data['view_file'] = 'titles';
            $this->template('public', $data);
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
            $data['headline'] = 'Update BookNotes Record';
            $data['cancel_url'] = BASE_URL . 'books/show/' . $update_id;
        } else {
            $data['headline'] = 'Create New BookNotes Record';
            $data['cancel_url'] = BASE_URL . 'books/manage';
        }
        $data['update_id'] = $update_id;
        $data['form_location'] = BASE_URL . 'books/submit/' . $update_id;
        $data['author_options'] = $this->_get_author_options($data['author_id']);
        $data['publisher_options'] = $this->_get_publisher_options($data['publisher_id']);
        $data['category_options'] = $this->_get_category_options($data['category_id']);
        $data['view_file'] = 'create';
        $this->template('admin', $data);
    }

    function submit() {
        /* $this->module('trongate_security');
          $this->trongate_security->_make_sure_allowed(); */

        $submit = post('submit', true);

        if ($submit == 'Submit') {

            $this->validation_helper->set_rules('book_title', 'Book Title', 'required|min_length[2]|max_length[255]');
            $this->validation_helper->set_rules('book_cover_image', 'Link to Book Cover', 'required|min_length[2]|max_length[255]');
            $this->validation_helper->set_rules('book_notes', 'Book Notes', 'required|min_length[2]');

            $result = $this->validation_helper->run();

            if ($result == true) {

                $update_id = segment(3);
                $data = $this->_get_data_from_post();
                //$data['url_string'] = strtolower(url_title($data['item_title']));
                $data['book_status'] = ($data['book_status'] == 1 ? 1 : 0);

                if (is_numeric($update_id)) {
                    //update an existing record
                    $this->model->update($update_id, $data, 'books');
                    $flash_msg = 'The record was successfully updated';
                } else {
                    //insert the new record
                    $update_id = $this->model->insert($data, 'books');
                    $flash_msg = 'The record was successfully created';
                }

                set_flashdata($flash_msg);
                redirect('books/show/' . $update_id);
            } else {
                //form submission error
                $this->create();
            }
        }
    }

    function submit_delete() {
        $update_id = segment(3, 'int');
        $this->model->delete($update_id);
        set_flashdata('The record was successfully deleted');
        redirect('books/manage');
    }

    function _get_author_options($selected_author_id) {
        //$rows = $this->model->get('last_name', 'authors');
        $rows = $this->model->get('author_name', 'authors');
        if ($selected_author_id = '') {
            $options[''] = 'Select author...';
        }


        foreach ($rows as $row) {
            //$options[$row->id] = $row->first_name.' '.$row->last_name;
            $options[$row->id] = $row->author_name;
        }

        return $options;
    }

    function _get_publisher_options($selected_publisher_id) {
        $rows = $this->model->get('publisher_name', 'publishers');
        if ($selected_publisher_id = '') {
            $options[''] = 'Select publisher...';
        }


        foreach ($rows as $row) {
            $options[$row->id] = $row->publisher_name;
        }

        return $options;
    }

    function _get_category_options($selected_category_id) {
        $rows = $this->model->get('category_name', 'categories');
        if ($selected_category_id = '') {
            $options[''] = 'Select publisher...';
        }


        foreach ($rows as $row) {
            $options[$row->id] = $row->category_name;
        }

        return $options;
    }

    function manage() {
        $update_id = segment(3);
        $sql = 'SELECT books.*, authors.author_name, publishers.publisher_name, categories.category_name FROM books INNER JOIN authors ON books.author_id = authors.id INNER JOIN publishers ON books.publisher_id = publishers.id INNER JOIN categories ON books.category_id = categories.id ORDER BY books.id ASC';
        $all_rows = $this->model->query($sql, 'object');
        //json($all_rows);
        $pagination_data['total_rows'] = count($all_rows);
        $pagination_data['page_num_segment'] = 3;
        $pagination_data['limit'] = $this->_get_limit();
        $pagination_data['pagination_root'] = 'books/manage';
        $pagination_data['record_name_plural'] = 'books';
        $pagination_data['include_showing_statement'] = true;
        $data['pagination_data'] = $pagination_data;
        $data['update_id'] = $update_id;
        $data['rows'] = $this->_reduce_rows($all_rows);
        $data['view_module'] = 'books';
        $data['view_file'] = 'manage';
        $this->template('admin', $data);
    }

}
