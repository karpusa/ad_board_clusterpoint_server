<?php
namespace App\Core;

class Request {
    public function __construct() {

    }

    public function get($keys, $filter = array()) {
        $keys = is_array($keys) ? $keys: array();
        $results = [];
        $validation = [];
        $success = true;

        foreach ($keys as $key=>$name)
        {

            if (isset($_GET[$name])) {
            if (isset($filter[$name])) {
                $validation[$name] = $this->validate($_GET[$name], $filter[$name]);
                $success = !$success ? false: ($validation[$name] ? true: false);
            }
                $results[$name] = $_GET[$name];
            }
        }

        return [
                'result' => $results,
                'validation' => $validation,
                'success' => $results ? $success : false
            ];
    }

    public function post($keys, $filter = array()) {
        $keys = is_array($keys) ? $keys: array();
        $results = [];
        $validation = [];
        $success = true;

        foreach ($keys as $key=>$name)
        {

            if (isset($_POST[$name])) {
            if (isset($filter[$name])) {
                $validation[$name] = $this->validate($_POST[$name], $filter[$name]);
                $success = !$success ? false: ($validation[$name] ? true: false);
            }
                $results[$name] = $_POST[$name];
            }
        }

        return [
                'result' => $results,
                'validation' => $validation,
                'success' => $results ? $success : false
            ];
    }

    public function validate($value, $filter) {
        switch ($filter) {
            case 'required':
                    return !empty($value);
                break;
            case 'price':
                    return (boolean)preg_match("/^-?[0-9]+(?:\.[0-9]{1,2})?$/", $value);
                break;
            case 'int':
                    return (boolean)filter_var( $value, FILTER_VALIDATE_INT);
                break;
            default:
                return false;
        }
        return false;
    }
}