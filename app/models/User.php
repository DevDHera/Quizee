<?php
    
    class User 
    {
        private $db;

        public function __construct() 
        {
            $this->db = new Database;
        }

        // Regsiter user
        public function register($data) 
        {
            $this->db->query('INSERT INTO users (emp_no, name, email, password) VALUES(:emp_no, :name, :email, :password)');
            // Bind values
            $this->db->bind(':emp_no', $data['emp_no']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // Login User
        public function login($email, $password)
        {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        // Find user by email
        public function findUserByEmail($email)
        {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            // Bind value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        // Find user by Emp #
        public function findUserByEmpNo($empNo)
        {
            $this->db->query('SELECT * FROM users WHERE emp_no = :emp_no');
            // Bind value
            $this->db->bind(':emp_no', $empNo);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
        
        // Get All results of User
        public function getResultsByUser($userId)
        {
            $this->db->query('SELECT *,
                            attempts.id as attemptId,
                            users.id as userId
                            FROM attempts
                            INNER JOIN users
                            ON attempts.user_id = users.id
                            WHERE attempts.user_id=:user_id
                            ORDER BY attempts.attempted_at ASC
                            ');

            // Bind value
            $this->db->bind(':user_id', $userId);

            $results = $this->db->resultSet();

            return $results;
        }
  }