<?php
class Validator {
    private $errors = [];
    private $data;
    
    public function __construct($data) {
        $this->data = $data;
    }
    
    public function required($field, $message = null) {
        if (empty($this->data[$field])) {
            $this->errors[$field] = $message ?? "$field is required";
        }
        return $this;
    }
    
    public function email($field, $message = null) {
        if (!empty($this->data[$field]) && !filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $message ?? "Invalid email format";
        }
        return $this;
    }
    
    public function min($field, $length, $message = null) {
        if (!empty($this->data[$field]) && strlen($this->data[$field]) < $length) {
            $this->errors[$field] = $message ?? "$field must be at least $length characters";
        }
        return $this;
    }
    
    public function max($field, $length, $message = null) {
        if (!empty($this->data[$field]) && strlen($this->data[$field]) > $length) {
            $this->errors[$field] = $message ?? "$field must not exceed $length characters";
        }
        return $this;
    }
    
    public function numeric($field, $message = null) {
        if (!empty($this->data[$field]) && !is_numeric($this->data[$field])) {
            $this->errors[$field] = $message ?? "$field must be numeric";
        }
        return $this;
    }
    
    public function phone($field, $message = null) {
        if (!empty($this->data[$field]) && !preg_match('/^[0-9+\-\s()]{10,15}$/', $this->data[$field])) {
            $this->errors[$field] = $message ?? "Invalid phone number";
        }
        return $this;
    }
    
    public function fails() {
        return !empty($this->errors);
    }
    
    public function passes() {
        return empty($this->errors);
    }
    
    public function errors() {
        return $this->errors;
    }
    
    public function firstError() {
        return reset($this->errors) ?: null;
    }
}
