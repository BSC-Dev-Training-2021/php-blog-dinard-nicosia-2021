<?php
class blog extends model
{

    function __construct()
    {
        parent::__construct("blog_post");
    }
    public function getBlogByUser($id)
    {
        $result = $this->findByUser($id);
        return $result;
    }
    public function getBlogById($id)
    {
        $result = $this->findById($id);

        return $result;
    }
    public function displayAllBlogs()
    {
        $result = $this->findAll();
        return $result;
    }

    public function blogPostInsert($data, $selectedCategories)
    {
        $new_id = $this->insert($data);
        $blog_post_categories_obj = new blog_post_categories();
        $blog_post_categories_obj->blog_post_categories_insert($new_id, $selectedCategories);
    }
}
