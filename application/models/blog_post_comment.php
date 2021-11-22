<?php

class blog_post_comment extends model{

    public function __construct()
    {
        parent::__construct("blog_post_comment");
    }
    function getInsertData($comment_data){
        $this->insert($comment_data);
    }
    function displayAllDataComment($id){
        //$commentData = $this->findAll();
        $commentData = $this->findByIdnTitle("blog_post_id",$id);
        return $commentData;
    }
}