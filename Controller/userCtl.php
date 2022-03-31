<?php
    class userCtl{



        public function __construct(){

            require('./Kernel/Database.php');

        }
        public function __selectUser(){

                // $arrayUser = $this->userC->__selectData('users',false,$this->userC->__whereDB('user_name','=','Khanh'),true);
                // var_dump($arrayUser);
                $Listrow = [
                    "user_id",
                    "user_name",
                    "user_phone"
                ];
                $ListUser = [
                
                        "user_phone" => 81297389712897312,
                        "user_name" => "khanh",
                        "user_password" => "khanh12312"
                    
                ];
                $Users =  DB::table('users')
                ->row($Listrow)
                ->where("user_name","=","khanh")
                ->limit(2)
                ->get();

                // var_dump($Users);

        }
    }
?>