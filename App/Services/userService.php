<?php

    namespace App\services;

    use App\models\User;

    class userService {

        public function get($id = null)
        {   

            if($id){

               return User::select($id);
            } else {
                return User::selectAll();
            }
            
        }

        public function post($id = null)
        {
            $data = $_POST;

            if($id){

                return User::update($id, $data); 
            } else {

                return User::insert($data); 
            }
        }

        public function delete($id)
        {
            return User::delete($id); 
        }
    }