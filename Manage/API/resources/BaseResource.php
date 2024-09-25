<?php
// resources/BaseResource.php
abstract class BaseResource {
    protected $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    abstract public function get($id = null);
    abstract public function post($data);
    abstract public function put($id, $data);
    abstract public function delete($id);
}
?>
