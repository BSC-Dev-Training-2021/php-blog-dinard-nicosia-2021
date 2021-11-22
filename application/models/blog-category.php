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

        return $data;
    }
}
