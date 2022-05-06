<?php
class Contacts extends Controller{
    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }

        $this->contactModel = $this->model('Contact');
    }

    public function index(){
        // get contacts
        $contacts = $this->contactModel->getContact();

        $data = [
            'contacts' => $contacts
        ];

        $this->view('contacts/index',$data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          $data = [
            'user_id' => $_SESSION['user_id'],
            'names' => trim($_POST['names']),
            'emails' => trim($_POST['emails']),
            'phone' => trim($_POST['phone']),
            'address' => trim($_POST['address']),
            'names_err' => '',
            'emails_err' => '',
            'phone_err' => '',
            'address_err' => ''
          ];
  
          // Validate data
          if(empty($data['names'])){
            $data['names_err'] = 'Please enter name';
          }
          if(empty($data['emails'])){
            $data['emails_err'] = 'Please enter email';
          }
          if(empty($data['phone'])){
            $data['phone_err'] = 'Please enter phone number';
          }
          if(empty($data['address'])){
            $data['address_err'] = 'Please enter address';
          }
  
          // Make sure no errors
          if(empty($data['names_err']) && empty($data['emails_err']) && empty($data['phone_err']) && empty($data['address_err'])){
            // Validated
            if($this->contactModel->addContact($data)){
              flash('contact_message', 'Contact Added');
              redirect('contacts');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('contacts/add', $data);
          }
  
        } else {
          $data = [
            'names' => '',
            'emails' => '',
            'phone' => '',
            'address' => ''
          ];
    
          $this->view('contacts/add', $data);
        }
      }

      public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          $data = [
            'id'=> $id,
            'user_id' => $_SESSION['user_id'],
            'names' => trim($_POST['names']),
            'emails' => trim($_POST['emails']),
            'phone' => trim($_POST['phone']),
            'address' => trim($_POST['address']),
            'names_err' => '',
            'emails_err' => '',
            'phone_err' => '',
            'address_err' => ''
          ];
  
          // Validate data
          if(empty($data['names'])){
            $data['names_err'] = 'Please enter name';
          }
          if(empty($data['emails'])){
            $data['emails_err'] = 'Please enter email';
          }
          if(empty($data['phone'])){
            $data['phone_err'] = 'Please enter phone number';
          }
          if(empty($data['address'])){
            $data['address_err'] = 'Please enter address';
          }
  
          // Make sure no errors
          if(empty($data['names_err']) && empty($data['emails_err']) && empty($data['phone_err']) && empty($data['address_err'])){
            // Validated
            if($this->contactModel->updateContact($data)){
              flash('contact_message', 'Contact Updated');
              redirect('contacts');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('contacts/edit', $data);
          }
  
        } else {
          // Get existing contact from model
           $contact = $this->contactModel->getContactById($id);

          // check the owner id
          if($contact->user_id != $_SESSION['user_id']){
            redirect('contacts');
          }

          $data = [
            'id'=> $id,
            'names' => $contact->names,
            'emails' => $contact->emails,
            'phone' => $contact->phone,
            'address' => $contact->address
          ];
    
          $this->view('contacts/edit', $data);
        }
      }

      public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Get existing contact from model
          $contact = $this->contactModel->getContactById($id);
          
          // Check for owner
          if($contact->user_id != $_SESSION['user_id']){
            redirect('contacts');
          }
  
          if($this->contactModel->deleteContact($id)){
            flash('contact_message', 'contact Removed');
            redirect('contacts');
          } else {
            die('Something went wrong');
          }
        } else {
          redirect('contacts');
        }
      } 
}