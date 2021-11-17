<?php
class article extends model
{

    function __construct()
    {
        parent::__construct("blog_post");
    }
    public function getIdBlog($id){
        $result = $this->findById($id);
        return $result;
    }
    
}
