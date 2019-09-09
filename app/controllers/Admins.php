<?php

    class Admins extends Controller 
    {
        public function __construct()
        {
            if (!isLoggedIn()) {
                redirect('users/login');
            } elseif (!isAdmin()) {
                flash('no_access', 'Access Forbidden');
                redirect('quizzes');
            }
            $this->adminModel = $this->model('Admin');
            $this->userModel = $this->model('User');
        }

        public function index()
        {   
            redirect('admins/users');
        }

        public function users()
        {
            // Get Users
            $users = $this->adminModel->getUsers();
        
            $data = [
                'users' => $users
            ];

            $this->view('admin/users', $data);
        }

        public function edituser($id)
        {   
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init Data
                $data = [
                    'user_id' => $id,
                    'emp_no' => trim($_POST['emp_no']),
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'role' => trim($_POST['role']),
                    'emp_no_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'role_err' => ''
                ];

                $user = $this->adminModel->getUserById($id);

                // Validate Emp #
                if (empty($data['emp_no'])) {
                    $data['emp_no_err'] = 'Pleae enter employee #';
                } else {
                    // Check emp #
                    if ($data['emp_no'] != $user->emp_no && $this->userModel->findUserByEmpNo($data['emp_no'])){
                        $data['emp_no_err'] = 'Employee number is already taken';
                    }
                }

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Pleae enter email';
                } else {
                    // Check email
                    if($data['email'] != $user->email && $this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Name
                if (empty($data['name'])) {
                    $data['name_err'] = 'Pleae enter name';
                }
        
                // Make sure errors are empty
                if (empty($data['emp_no_err']) && empty($data['email_err']) && empty($data['name_err']) && empty($data['role_err'])) {                            
                    // Edit User                    
                    if ($this->adminModel->editUser($data)) {
                        flash('edit_user_success', 'User Edited Successfully');
                        redirect('admins/users');
                    } else {
                        die('Something went wrong');
                    }
        
                } else {
                    // Load view with errors
                    $this->view('admin/user' , $data);
                }

            } else {
                // Get User
                $user = $this->adminModel->getUserById($id);

                // Init Data
                $data = [
                    'user_id' => $id,
                    'emp_no' => $user->emp_no,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'emp_no_err' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'role_err' => '',
                ];

                // Load view
                $this->view('admin/user', $data);
            }
        }

        public function deleteuser($id)
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->adminModel->deleteUser($id)) {
                    flash('delete_user_success', 'User Deleted Successfully');
                    redirect('admins/users');
                } else {
                    die('Something went wrong');
                }
            } else {
                redirect('admins/users');
            }
        }

        public function attempts()
        {
            // Get Attempts
            $attempts = $this->adminModel->getAttempts();
        
            $data = [
                'attempts' => $attempts
            ];

            $this->view('admin/attempts', $data);
        }
    }
    