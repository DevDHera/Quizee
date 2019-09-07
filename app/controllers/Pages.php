<?php
    class Pages extends Controller  
    {
        public function __construct()
        {
            
        }

        public function index()
        {
            $data = [
                'title' => 'Quizee',
                'description' => 'Quizee is the Employee Assesment Portal of Ceylon Textile Suppliers'
            ];
            
            $this->view('pages/index', $data);
        }

        public function about()
        {
            $data = [
                'title' => 'About Us',
                'description' => 'A simple quiz automation platform'
            ];

            $this->view('pages/about', $data);
        }
    }
    