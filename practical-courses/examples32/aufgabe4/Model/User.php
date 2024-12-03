<?php
namespace Model;
use JsonSerializable;
class User implements JsonSerializable {
    private $username;
    private $foo;
    public function __construct($username = "", $foo = "") {
        $this->username = $username;
        $this->foo = $foo;
    }

    public function getUsername() {
        return $this->username;
    }
    public function getFoo() {
        return $this->foo;
    }
    public function setFoo($value) {
        $this->foo = $value;
    }
    public function jsonSerialize():mixed {
        return get_object_vars($this);
    }
    public static function fromJson($data) {
        // $data ist stdClass, hat alle Informationen als Attribute
        // und muss zu einem echten user umgewandelt werden
        $user = new User();
        foreach ($data as $key => $value) {
            $user->{$key} = $value;
        }
        return $user;
    }
}
?>