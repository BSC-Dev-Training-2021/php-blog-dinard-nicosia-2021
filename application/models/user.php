<?php
class user extends model
{

    public function __construct()
    {
        parent::__construct('user');
    }
    public function getDisplayUserCommentbyid($id)
    {
        $result = $this->findById($id);
        $username = "";
        foreach ($result as $value) {
            echo $value['username'];
        }
    }
}
