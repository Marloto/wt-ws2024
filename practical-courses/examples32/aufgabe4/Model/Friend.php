<?php
namespace Model;
use JsonSerializable;
class Friend implements JsonSerializable {
    private $username;
    private $status;
    private $unread;
    public function __construct($username = "", $status = "") {
        $this->username = $username;
        $this->status = $status;
    }

    public function getUsername() {
        return $this->username;
    }
    public function getStatus() {
        return $this->status;
    }
    public function setStatus($value) {
        $this->status = $value;
    }
    public function getUnread() {
        return $this->unread;
    }
    public function setUnread($value) {
        $this->unread = $value;
    }
    public function jsonSerialize():mixed {
        return get_object_vars($this);
    }
    public static function fromJson($data) {
        // $data ist stdClass, hat alle Informationen als Attribute
        // und muss zu einem echten user umgewandelt werden
        $friend = new Friend();
        foreach ($data as $key => $value) {
            $friend->{$key} = $value;
        }
        return $friend;
    }
}
?>