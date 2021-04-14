<?php
    class Model extends SQLQuery {
        protected $_model;

        function __construct() {
            $this->connect(DB_HOSt, DB_USER, DB_PASSOWRD, DB_NAME);
            $this->_model = get_class($this);
            $this->_table = strtolower($this->_model)."s";

        }
        function __destruct() {
        }
    }