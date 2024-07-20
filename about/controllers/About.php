<?php
class About extends Trongate {
 
    function index() {
        $data['view_module'] = 'about';
        $data['view_file'] = 'index';
        $this->template('public', $data);
    }

}