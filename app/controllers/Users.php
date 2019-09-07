<?php

    class Users extends Controller  
    {
        public function __construct()
        {
            
        }

        public function register()
        {   
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
            } else {
                // Init Data
                $data = [
                    'emp_no' => '',
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'emp_no_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('users/register', $data);
            }
        }
        
        public function login()
        {   
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
            } else {
                // Init Data
                $data = [                    
                    'email' => '',
                    'password' => '',                    
                    'name_err' => '',
                    'email_err' => ''
                ];

                // Load view
                $this->view('users/login', $data);
            }
        }


    }
    