<?php
class categories extends model
{

    function __construct()
    {
        parent::__construct("category_types");
    }

    public function displayCategories()
    {
        return $this->findAll();
    }
    public function displayCategoriesFiltered($data)
    {
        $catType = [];
        foreach($data as $value){
          echo  $catType = $value['name'] . ",";
         }
         return $catType;
    }      
}