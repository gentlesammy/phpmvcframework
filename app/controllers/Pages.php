
<?php
    class Pages extends Controller{

        public function __construct(){
            $this->model = $this->model('page');

        }

        public function index(){
            $data = [
                'name' => 'samuel',
                'age'  => 23,
                'food' => 'amala and abula'
            ];
            $this->view('pages/index', $data);
        }//home function 


        public function about(){
            $this->view('pages/about');
        }


        public function talktalk(){
            $this->view('talktalk');
        }








        
    }//pages controller ends here
