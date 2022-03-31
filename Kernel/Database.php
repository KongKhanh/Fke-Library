<?php

    class DB{
        private static $conn;
        private $table_name;

        private $where;

        private $row;

        private $inner;

        private $order;

        private $limit;
        function __construct(){

            /**
            *  Kernel/Database/PDO/Connection;
            */
            self::$conn  = require_once('./ConnectDb/connectDatabase.php');

            $this->table_name = null;

            $this->where = [];

            $this->row = null;

            $this->inner = null;

            $this->order = "";

            $this->limit = "";

        }


        // SELECT
        public static function table($table_name = null) {

            return (new self)->tablevir($table_name);
        }

        public function tablevir($table_name = null){

            if(is_null($table_name) || !is_string($table_name)) return false;

            $this->table_name = $table_name;

            return $this;
        }

        public function where($column, $operator = "=", $value = null){

            if(isset($column) && isset($operator) && isset($value)){

                $subWhere = [$column, $operator, $value, "AND"];

                array_push($this->where, $subWhere);

                return $this;
    
            }
        }

        public function row($arrayVale = null){

            if(!is_null($arrayVale) && is_array($arrayVale)){

                $value = $arrayVale;
                
            }
            $this->row = $value;
            return $this;

        }

        public function whereMultiple($arrayWhere = null){
            
            $where = " WHERE ";

            if(!is_null($arrayWhere) && is_array($arrayWhere)){
                
                for($i = 0; $i < count($arrayWhere); $i++){

                    $WhereItem = '';
                    
                    if(is_string($arrayWhere[$i][2])){

                        $arrayWhere[$i][2] = "'{$arrayWhere[$i][2]}'";

                    }
                    if(isset($arrayWhere[$i][3]) && $i != (count($arrayWhere) - 1)){

                        $WhereItem .= "{$arrayWhere[$i][0]} {$arrayWhere[$i][1]} {$arrayWhere[$i][2]} {$arrayWhere[$i][3]} ";

                    }
                    else {

                        $WhereItem .= "{$arrayWhere[$i][0]} {$arrayWhere[$i][1]} {$arrayWhere[$i][2]}";

                    }

                    $where .= $WhereItem;
                }
        
                return $where;
            }
        }

        public function get(){

            if($this->where != null){
             return $this->selectData(true);
            }
            else{
                return $this->selectData(false);
            }

        }
  
        public function selectData($mro = true){

            $select = 'SELECT ';

            if($this->row && is_array($this->row) && count($this->row) != 0){
                $handle = "";
                
                foreach($this->row as $rowKey => $rowValue){

                    $handle .= "$rowValue, ";

                }

                $handle = substr_replace($handle, "", -2);
            }
            else {
                $handle = "*";
            }

            $form = ' FROM ' .$this->table_name;

            $sql = $select . $handle .$form;

            $sql .=  $this->inner .$this->whereMultiple($this->where) .$this->order .$this->limit;
      
            return $sql;

            $stmt = self::$conn->prepare($sql);
    
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt->execute();

            if($mro){

                return $stmt->fetchAll();

            }
            else{

                return $stmt->fetch();

            }
        }

        // UPDATE
        public function update($arrayUpdate){
            $sql = "UPDATE ";
            $blockItem = "";
            try {   

                $numberItem = count($arrayUpdate);
                $i = 0;

                foreach($arrayUpdate as $rowKey => $rowValue){


                    if(!is_null($rowValue)){
                        if(is_string($rowValue)){
                            $rowValue = "'$rowValue'";
                        }
                        else{
                            $rowValue = $rowValue;
                        }
                        if($numberItem == ++$i){
                            $blockItem .= $rowKey ." = " .$rowValue;
                        }
                        else{
                            $blockItem .= $rowKey ." = " .$rowValue .", ";
                        }
                    }
                }
                $sql .= $this->table_name . " SET " . $blockItem . $this->whereMultiple($this->where);
                // Prepare statement
                $stmt = self::$conn->prepare($sql);
              
                // execute the query
                $stmt->execute();
              
                // echo a message to say the UPDATE succeeded
                return $stmt->rowCount();
              } 
            catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        //INSERT
        public function insert($arrayIsert){
            $sql = "INSERT INTO " .$this->table_name  ;
            try
            {
                    $blockItem = "";
                    $blockItemValue = "";
                    $numberItem = count($arrayIsert);
                    $i = 0;
    
                    foreach($arrayIsert as $rowKey => $rowValue){
                        

                        $rowKey = $rowKey;
                        $rowValue = "'$rowValue'";

                        if($numberItem == ++$i){
                            $blockItem .= $rowKey;
                            $blockItemValue .= $rowValue;
                        }
                        else{
                            $blockItem .= $rowKey .", ";
                            $blockItemValue .= $rowValue .", ";
                        }
                    }
                    $sql .= " (".$blockItem.")" ." VALUES " ."(".$blockItemValue .")";
                    return $sql;
                self::$conn->exec($sql);
                echo "New record created successfully";
            }
            catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        public function delete(){
            try
            {
            $sql = "DELETE FROM " .$this->table_name .$this->whereMultiple($this->where);
            self::$conn->exec($sql);
            echo "Record deleted successfully";
            } 
            catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        public function join($table, $first, $operator = null, $second = null, $inner = "INNER JOIN"){

            $sql =" " .$inner ." " .$table ." ON " .$this->table_name.".".$first . " ".$operator ." " .$table.".".$second;
            $this->inner .= $sql;

            return $this;
            
        }

        public function leftjoin($table, $first, $operator, $second ){

            return $this->join($table, $first, $operator, $second, "LEFT JOIN");
            
        }

        public function rightjoin($table, $first, $operator, $second ){

            return $this->join($table, $first, $operator, $second, "RIGHT JOIN");
            
        }

        public function orderby($roworder, $value = ""){

            $sql = " ORDER BY ". $roworder ." " .$value;

            $this->order = $sql;

            return $this;
        }

        public function limit($limit){

            $sql = " LIMIT ".$limit;

            $this->limit = $sql;

            return $this;
        }

    }
?>