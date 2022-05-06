<?php
  class Pages extends Controller {
    public function __construct(){
      
    }
    
    public function index(){
      
      if(isLoggedIn()){
        redirect('contacts');
      }
      
      $data = [
        'title' => 'ContactManager',
        'description'=> 'Contact Management System buit on AchrMVC PHP framework'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }

  }