<?php

class DBConnection
{
    var $conn;
    
    function DBConnection()
    {
        $this->conn = pg_connect("host='localhost' port='5432' dbname='hoteldb' user='hoteladmin' password='ataliahotel'") or die("unable to connect database");
    }
}

?>