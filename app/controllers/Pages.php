<?php
  class Pages extends Controller {
    public function __construct(){
      
    }
    
    public function index(){
      
      $data = [
        'title' => 'CMS',
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