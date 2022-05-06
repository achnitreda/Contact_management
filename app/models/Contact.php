<?php
    class Contact{
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getContact(){
            $this->db->query('SELECT *,
                                contacts.id as contactId,
                                users.id as userId,
                                contacts.created_at as contactCreated,
                                users.created_at as userCreated
                                FROM contacts
                                INNER JOIN users
                                ON contacts.user_id = users.id
                                ORDER BY contacts.created_at DESC
                                ');

            $results = $this->db->resultSet();

            return $results;
        }

        public function addContact($data){
            $this->db->query('INSERT INTO contacts (user_id, names, emails, phone, address) VALUES(:user_id, :names , :emails, :phone, :address)');
            // Bind values
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':names', $data['names']);
            $this->db->bind(':emails', $data['emails']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':address', $data['address']);
      
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

          public function updateContact($data){
            $this->db->query('UPDATE contacts SET names = :names, emails = :emails, phone = :phone , address = :address WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':names', $data['names']);
            $this->db->bind(':emails', $data['emails']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':address', $data['address']);
      
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

          public function getContactById($id){
            $this->db->query('SELECT * FROM contacts WHERE id = :id');
            $this->db->bind(':id', $id);
      
            $row = $this->db->single();
      
            return $row;
          }

          public function deleteContact($id){
            $this->db->query('DELETE FROM contacts WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);
      
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
    }