<?php

    class Quiz  
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getQuizzes()
        {
            $this->db->query('SELECT *,
                            quizzes.id as quizId,
                            users.id as userId,
                            quizzes.created_at as quizCreated,
                            users.created_at as userCreated 
                            FROM quizzes
                            INNER JOIN users
                            ON quizzes.created_by = users.id
                            ORDER BY quizzes.created_at DESC
                            ');

            $results = $this->db->resultSet();

            return $results;
        }

        public function addQuizBasic($data)
        {
            $this->db->query('INSERT INTO quizzes (title, created_by, questioncount) VALUES(:title, :created_by, :questioncount)');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':created_by', $data['created_by']);
            $this->db->bind(':questioncount', $data['questioncount']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getLastQuiz()
        {
            $this->db->query('SELECT * FROM quizzes ORDER BY id DESC LIMIT 1');

            $result = $this->db->single();

            return $result;
        }

        public function addQuizQuestion($data)
        {
            $this->db->query('INSERT INTO questions (quiz_id, question) VALUES(:quiz_id, :question)');
            // Bind values
            $this->db->bind(':quiz_id', $_SESSION['quiz_id']);
            $this->db->bind(':question', $data['question']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getLastQuestion()
        {
            $this->db->query('SELECT * FROM questions ORDER BY id DESC LIMIT 1');

            $result = $this->db->single();

            return $result;
        }
        
        public function addQuestionAnswers($data)
        {
            $this->db->query('INSERT INTO answers (question_id, answer, is_correct) VALUES
                                (:question_id, :answer_one, :answer_one_is_correct),
                                (:question_id, :answer_two, :answer_two_is_correct),
                                (:question_id, :answer_three, :answer_three_is_correct),
                                (:question_id, :answer_four, :answer_four_is_correct)
                                ');
            // Bind values
            $this->db->bind(':question_id', $data['question_id']);
            $this->db->bind(':answer_one', $data['answer_one']);
            $this->db->bind(':answer_one_is_correct', $data['answer_one_is_correct']);
            $this->db->bind(':answer_two', $data['answer_two']);
            $this->db->bind(':answer_two_is_correct', $data['answer_two_is_correct']);
            $this->db->bind(':answer_three', $data['answer_three']);
            $this->db->bind(':answer_three_is_correct', $data['answer_three_is_correct']);
            $this->db->bind(':answer_four', $data['answer_four']);
            $this->db->bind(':answer_four_is_correct', $data['answer_four_is_correct']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getQuiz($id)
        {
            $this->db->query('SELECT *,
                            quizzes.id as quizId,
                            questions.id as questionId,
                            answers.id as answerId
                            FROM questions
                            INNER JOIN quizzes
                            ON questions.quiz_id = quizzes.id
                            INNER JOIN answers
                            ON answers.question_id=questions.id
                            WHERE quizzes.id=:quiz_id
                            ORDER BY questions.id ASC
                            ');

            // Bind values
            $this->db->bind(':quiz_id', $id);

            $results = $this->db->resultSetArray();

            return $results;
        }

        public function getLastAttempt($userId, $quizId)
        {
            $this->db->query('SELECT * FROM attempts WHERE user_id=:user_id AND quiz_id=:quiz_id ORDER BY id DESC LIMIT 1');

            // Bind values
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':quiz_id', $quizId);

            $result = $this->db->single();

            return $result;
        }

        public function addAttempt($data)
        {
            $this->db->query('INSERT INTO attempts (user_id, attempt_count, result, quiz_id) VALUES(:user_id, :attempt_count, :result, :quiz_id)');
            
            // Bind values            
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':attempt_count', $data['attempt_count']);
            $this->db->bind(':result', $data['result']);
            $this->db->bind(':quiz_id', $data['quiz_id']);

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
    