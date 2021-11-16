<?php
class blogpost extends model
{

    function __construct()
    {
        parent::__construct("blog_post");
    }
    public function get_data($data)
    {
        $this->insert($data);
    }
    
}
