<?php

class createConnection
{
    var $host="localhost";
    var $username="root";
    Var $password="";
    var $database="Vipath";

    var $myconn;



    function connectToDatabase()
    {
        $conn= mysqli_connect($this->host,$this->username,$this->password, $this->database);

        if(!$conn)
        {
            die ("Connection error connecting to the database");
        }

        else
        {

            $this->myconn = $conn;



        }

        return $this->myconn;

    }

    function selectDatabase()
    {
        mysql_select_db($this->database);

        if(mysql_error())
        {

            echo "Database not found".$this->database;

        }

    }

    function closeConnection()
    {
        mysql_close($this->myconn);


    }

}

?>
