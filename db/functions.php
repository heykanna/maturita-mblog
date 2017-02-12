<?php

    function array_sanitize(&$item) {
        $item = mysql_real_escape_string($item);
    }

    function sanitize($data) {
        return mysql_real_escape_string($data);
    }

    function error_output($errors) {
        return '<div class="message"></div><ul><li>' . implode('</li><li>', $errors) . '</li></ul></div>';
    }

?>