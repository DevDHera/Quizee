<?php

    class Quizzes extends Controller 
    {
        public function __construct()
        {
            if (!isLoggedIn()) {
                redirect('users/login');
            }

            $this->quizModel = $this->model('Quiz');
        }

        public function index()
        {
            // Get Quizzes
            $quizzes = $this->quizModel->getQuizzes();
        
            $data = [
                'quizzes' => $quizzes
            ];

            $this->view('quizzes/index', $data);
        }
        
        public function addbasic()
        {
            if (isAdmin()) {             
                if ($_SERVER['REQUEST_METHOD']  == 'POST') {
                    // Sanitize POST
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    $data = [
                        'title' => trim($_POST['title']),
                        'questioncount' => trim($_POST['questioncount']),
                        'created_by' => $_SESSION['user_id'],
                        'title_err' => '',
                        'questioncount_err' => ''
                    ]; 
                    
                    // Validate data
                    if (empty($data['title'])) {
                        $data['title_err'] = 'Please enter title';
                    }

                    if (empty($data['questioncount'])) {
                        $data['questioncount_err'] = 'Please enter question count';
                    }elseif (!filter_var($data['questioncount'], FILTER_VALIDATE_INT)) {
                        $data['questioncount_err'] = 'Question count should be a number';
                    }

                    // Make sure no erros
                    if (empty($data['title_err']) && empty($data['questioncount_err'])) {
                        if ($this->quizModel->addQuizBasic($data)) {
                            flash('quiz_added', 'Basic Quiz data added'); 
                            
                            $quiz = $this->quizModel->getLastQuiz();

                            $_SESSION['quiz_id'] = $quiz->id;
                            $_SESSION['question_count'] = $quiz->questioncount;
                    
                            if (!isset($_SESSION['current_question_count'])) {
                                $_SESSION['current_question_count'] = 1;
                            }

                            redirect('quizzes/addquestions');
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // Load the view with errors
                        $this->view('quizzes/add/basic', $data);
                    }

                } else {
                    $data = [
                        'title' => '',
                        'questioncount' => ''
                    ];
        
                    $this->view('quizzes/add/basic', $data);
                }  
            } else {
                redirect('quizzes');
            }         
        }
        
        public function addquestions()
        {
            if ($_SERVER['REQUEST_METHOD']  == 'POST') {
                // Sanitize POST
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'question' => trim($_POST['question']),                    
                    'answer_one' => trim($_POST['answer_one']),
                    'answer_one_err' => trim($_POST['answer_one']),
                    'answer_one_is_correct' => false,
                    'answer_two' => trim($_POST['answer_two']),
                    'answer_two_is_correct' => false,
                    'answer_three' => trim($_POST['answer_three']),
                    'answer_three_is_correct' => false,
                    'answer_four' => trim($_POST['answer_four']),
                    'answer_four_is_correct' => false,
                    'correct_answer' => $_POST['correct_answer'],
                    'question_err' => '',
                    'answer_one_err' => '',
                    'answer_two_err' => '',
                    'answer_three_err' => '',
                    'answer_four_err' => '',
                    'correct_answer_err' => '',
                    'question_id' => '',
                ];

                // $data[$_POST['correct_answer']] = true;                
                
                // Validate data
                if (empty($data['question'])) {
                    $data['question_err'] = 'Please enter question';
                }
                
                if (empty($data['answer_one'])) {
                    $data['answer_one_err'] = 'Please enter answer one';
                }
                
                if (empty($data['answer_two'])) {
                    $data['answer_two_err'] = 'Please enter answer two';
                }
                
                if (empty($data['answer_three'])) {
                    $data['answer_three_err'] = 'Please enter answer three';
                }
                
                if (empty($data['answer_four'])) {
                    $data['answer_four_err'] = 'Please enter answer four';
                }
                
                if (empty($data['correct_answer']) || $data['correct_answer'] == 'null') {
                    $data['correct_answer_err'] = 'Please select a correct answer';
                }

                // Make sure no erros
                if (empty($data['question_err']) && empty($data['answer_one_err']) && empty($data['answer_two_err']) && empty($data['answer_three_err']) && empty($data['answer_four_err']) && empty($data['correct_answer_err'])) {
                    $data[$data['correct_answer'] . '_is_correct'] = true;
                    if ($this->quizModel->addQuizQuestion($data)) {
                        // flash('quiz_question_added', 'Question added');
                        // redirect('quizzes');
                        $question = $this->quizModel->getLastQuestion();
                        $data['question_id'] = $question->id;

                        if($this->quizModel->addQuestionAnswers($data)) {
                            flash('quiz_question_added', 'Question added');
                            $_SESSION['current_question_count'] = $_SESSION['current_question_count'] + 1;

                            if ($_SESSION['current_question_count'] > $_SESSION['question_count']) {
                                unset($_SESSION['quiz_id']);
                                unset($_SESSION['question_count']);
                                unset($_SESSION['current_question_count']);
                                unset($$_SESSION['quiz_added']);
                                redirect('quizzes');
                            } else {
                                redirect('quizzes/addquestions');
                            }
                        } else {
                            die('Something went wrong');    
                        }
                    } else {
                        die('Something went wrong');
                    }
                    // die('Okay');
                } else {
                    // Load the view with errors
                    $this->view('quizzes/add/questions', $data);
                }

            } else {
                // $quiz = $this->quizModel->getLastQuiz();

                // $_SESSION['quiz_id'] = $quiz->id;
                // $_SESSION['question_count'] = $quiz->questioncount;
                
                // if (!isset($_SESSION['current_question_count'])) {
                //     $_SESSION['current_question_count'] = 1;
                // }                
                if (isset($_SESSION['quiz_id'])) {
                    $data = [
                        'question' => '',
                        'answer_one' => '',
                        'answer_one_is_correct' => false,
                        'answer_two' => '',
                        'answer_two_is_correct' => false,
                        'answer_three' => '',
                        'answer_three_is_correct' => false,
                        'answer_four' => '',
                        'answer_four_is_correct' => false,
                        'correct_answer' => ''
                    ];
        
                    $this->view('quizzes/add/questions', $data);
                } else {
                    flash('no_quiz_added', 'Please add a quiz first');
                    redirect('quizzes/addbasic');
                }
                
            }            
        }

        public function attempt($id)
        {
            // Get last attempt
            $lastAttempt = $this->quizModel->getLastAttempt($_SESSION['user_id'], $id);
            $attemptCount = 0;

            if(!empty($lastAttempt)) {
                $attemptCount = $lastAttempt->attempt_count;
            }
            
            $attemptCount++;

            if ($attemptCount <= 3) {
                // Get Quiz
                $quiz = $this->quizModel->getQuiz($id);

                // die(print_r($quiz));
                // die(print_r(_group_by($quiz, 'questionId')));
                $questions = _group_by($quiz, 'questionId');
                
                // die(print_r($questions));
                // die(print_r($questions[6][0]['question']));

                $data = [
                    'quiz' => $quiz,
                    'quiz_id' => $quiz[0]['quiz_id'],
                    'quiz_title' => $quiz[0]['title'],
                    'quiz_question_count' => $quiz[0]['questioncount'],
                    'questions' => $questions,
                    'question_ids' => array_keys($questions)
                ];

                $this->view('quizzes/attempt/index', $data);
            } else {
                flash('attempt_count_exceeded', 'Your attempt count for this quiz has been exceeded');
                redirect('quizzes');
            }            
            
        }

        public function submitattempt($id)
        {
            if ($_SERVER['REQUEST_METHOD']  == 'POST') {
                
                // Get last attempt
                $lastAttempt = $this->quizModel->getLastAttempt($_SESSION['user_id'], $id);
                $attemptCount = 0;

                if(!empty($lastAttempt)) {
                    $attemptCount = $lastAttempt->attempt_count;
                }

                $attemptCount++;
                
                if ($attemptCount <= 3) {
                    // Get Quiz
                    $quiz = $this->quizModel->getQuiz($id);

                    $questions = _group_by($quiz, 'questionId');

                    $answers = _group_by($quiz, 'answerId');

                    $question_count = $quiz[0]['questioncount'];
                    $correct_answers = 0;

                    // die(print_r(_group_by($quiz, 'answerId')));

                    // Sanitize POST
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    foreach(array_keys($questions) as $question_id) {
                        if(!empty($_POST[$question_id])) {
                            
                            if ($answers[$_POST[$question_id]][0]['is_correct']) {                            
                                $correct_answers++;
                            } 
                            
                        }
                    }

                    $result = ($correct_answers / $question_count) * 100;

                    $data = [
                        'user_id' => $_SESSION['user_id'],
                        'attempt_count' => $attemptCount,
                        'result' => $result,
                        'quiz_id' => $quiz[0]['quiz_id']
                    ];

                    if ($this->quizModel->addAttempt($data)) { 
                        $redirectData = [
                            'quiz_id' => $quiz[0]['quiz_id'],
                            'quiz_title' => $quiz[0]['title'],
                            'user_emp_no' => $_SESSION['user_emp_no'],
                            'user_name' => $_SESSION['user_name'],
                            'attempt' => $attemptCount,
                            'result' => $result
                        ];


                        $_SESSION['user_result'] = $redirectData;
                        redirect('quizzes/result');
                        // $this->view('quizzes/attempt/result', $redirectData);
                    } else {
                        die('Something went wrong');
                    }

                } else {
                    flash('attempt_count_exceeded', 'Your attempt count has been exceeded');
                    redirect('quizzes');
                }
            }
        }

        public function result()
        {
            if (isset($_SESSION['user_result'])) {
                $data = [
                    'quiz_id' => $_SESSION['user_result']['quiz_id'],
                    'quiz_title' => $_SESSION['user_result']['quiz_title'],
                    'user_emp_no' => $_SESSION['user_result']['user_emp_no'],
                    'user_name' => $_SESSION['user_result']['user_name'],
                    'attempt' => $_SESSION['user_result']['attempt'],
                    'result' => $_SESSION['user_result']['result']
                ];
    
                $this->view('quizzes/attempt/result', $data);
            } else {
                redirect('quizzes');                
            }   
        }
    }
    