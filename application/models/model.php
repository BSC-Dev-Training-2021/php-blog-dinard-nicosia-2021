<?php
class model
{
    private $id;
    private $conn;

    function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->id = 0;
        $this->connect();
    }

    private function connect()
    {
        // connection of database
        $this->conn = new mysqli(HOST, USER, PASSWORD, DB);
    }

    function findByUser($id)
    {
        $result = $this->conn->query("SELECT * FROM $this->tableName WHERE created_by = $id");
        $resultArr = [];
        foreach ($result as $row) {
            $resultArr[] = $row;
        }

        return $resultArr;
    }

    function findAll()
    {
        $result = $this->conn->query("SELECT * FROM $this->tableName");
        $resultArr = [];
        foreach ($result as $row) {
            $resultArr[] = $row;
        }

        return $resultArr;
    }

    function findById($id)
    {
        
        if(is_array($id)){
            $ids = implode(",", $id);
            $q = "SELECT * FROM " . $this->tableName . " WHERE id in (" . $ids . ")";
        } else {
            $q = "SELECT * FROM " . $this->tableName . " WHERE id = " . $id;
        }

        $result = $this->conn->query($q);
        $resultArr = [];
        foreach ($result as $row) {
            $resultArr[] = $row;
        }
        return $resultArr;
    }
    function findByIdnTitle($id, $title, $fields = '*')
    {
        $result = $this->conn->query("SELECT " . $fields . " FROM $this->tableName WHERE $title = $id");
        $resultArr = [];
        foreach ($result as $row) {
            $resultArr[] = $row;
        }
        return $resultArr;
    }


    function insert($data)
    {
        foreach ($data as $key => $data) {
            $columnArr[] = $key;
            $dataArr[] = $data;
        }
        $mysql = "INSERT INTO $this->tableName (" . implode(',', $columnArr) . ") VALUES ('" . implode("','", $dataArr) . "')";
        $this->conn->query($mysql);
        $myid= $this->conn->insert_id;
        return $myid;

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