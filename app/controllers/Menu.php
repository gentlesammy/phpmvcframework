<?php
class Menu extends Controller{
    public function index(){

        $menucategory = [
            'Fiction', 'Article', 'Journals', 
        ];

        $this->view('menu/menu', $menucategory);
    }


    public function fiction(){
        $this->view('menu/about');
    }








}//end of menu class




?>