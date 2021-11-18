<?php
class blog_post_categories extends model
{

    function __construct()
    {
        parent::__construct("blog_post_categories");
    }
    public function blog_post_categories_insert($id,$category_data){
        $data=[];
        foreach($category_data as $categoryId){
            //$categoryData['blog_post_id']= $id;
            //$categoryData['category_id'] = $categoryId;
            $data = array(
                'blog_post_id' => $id,
                'category_id'=> $categoryId
            );
            $this->insert($data);
        }
    }
    
    public function displayCategoriesById($id)
    {
        $resultss = $this->findByIdnTitle("blog_post_id", $id, "category_id");

        $categories = [];
        foreach ($resultss as $catId) {
            $categories[] = $catId['category_id'];
        }
        return $categories;
    }
    // function displayCategoriesName($data){
    //     echo "new";
    //     xdebug($data);
    // }



    
}