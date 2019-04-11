<?php
class Mysql{
         private static $host="localhost";
         private static $user="admin";
         private static $password="12345678";
         private static $dbName="my_company";               //database name
         private static $charset="utf8";                    //char encode
        // private static $port="3306";                     //port number
         private  $conn=null;
         function __construct(){
            // $this->conn=new mysqli(self::$host,self::$user,self::$password,self::$dbName,self::$port);
             $this->conn=new mysqli(self::$host,self::$user,self::$password,self::$dbName);
             if(!$this->conn)
             {
                   die("Connection to Database Failed! \n".$this->conn->connect_error);
             }else{
                 echo "Connect to Database! &nbsp \n";
             }
             $this->conn->query("set names ".self::$charset);
         }
         
         //execute sql query
         function sql($sql){
             $res=$this->conn->query($sql);
         if(!$res)
              {
                   echo "Database Query Failed! \n";
              }
              else
              {
                   if($this->conn->affected_rows>0)
                   {
                         return $res;
                   }
                   else
                   {
                        echo "0 row affected! \n";
                   }
              }
              
         }
         
         //return # of rows affected
         function getResultNum($sql){
	           $res=$this->conn->query($sql);
	           return mysqli_num_rows($res);
           }
         
         //close database
         public function close()
         {
             @mysqli_close($this->conn);
         }
}
?>