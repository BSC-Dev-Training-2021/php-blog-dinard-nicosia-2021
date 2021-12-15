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
    public function getDataDisplay($data){
        $this->insert($data);
    }
    public function getDataEdit($data){
        $this->update($data);
    }

    public function getDataDelete($data){
        $dataArr = array(
            'id' => $data
        );
        $this->delete($dataArr);
    }
}
