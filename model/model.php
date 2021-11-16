<?php
class model
{

    function __construct($tableName)
    {

        $this->tableName = $tableName;
        $this->connect();
    }


    private function connect()
    {
        // connection of database
        $this->db = new mysqli(HOST, USER, PASSWORD, DB);
        return $this->db;
    }

    function findAll($id)
    {
        $result = $this->db->query("SELECT * FROM $this->tbl_name WHERE id = $id");
        $resultArr = [];
        foreach ($result as $row) {
            $resultArr[] = $row;
        }
    }

    function findById($id)
    {
    }


    function insert($data)
    {
        foreach($data as $key => $data){
            $columnArr[] = $key;
            $dataArr[] = $data; 
        }
        
        $mysql = "INSERT INTO $this->tableName (".implode(',',$columnArr) .") VALUES ('". implode("','",$dataArr) ."')";
        var_dump(implode("','",$dataArr));
        $this->connect()->query($mysql);
    }


    function update($id, $fields)
    {
        /*
                put your generic UPDATE query here
            */
    }


    function delete()
    {
    }
}

