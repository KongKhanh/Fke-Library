<?php 
    class PostmanagerCtrl{

        public function __construct(){

            require('./Kernel/Database.php');

        }
        public function __getPostManager(){

           $postList = DB::table("Post")->get();

           require("./resources/views/postmanager.view.php");

        }
    }
?>