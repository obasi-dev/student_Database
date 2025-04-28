<?php

require __DIR__. "/../config/database.php";

class User extends Database {
    public function validate($firstname,$lastname,$email,$matric,$gender,$dob,$dept,$level,$address){
        $errors = [];
        if (empty($firstname)) {
            $errors[] = "First Name is required.";
        }
        if (empty($lastname)) {
            $errors[] = "Last Name is required.";
        }
        if (empty($email)) {
            $errors[] = "Email is required.";
        }elseif (!filter_var($email , FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format. ";
        }
        if (empty($matric)) {
            $errors[] = "Matric Number is required.";
        }
        if (empty($gender)) {
            $errors[] = "Gender is required.";
        }
        if (empty($dob)) {
            $errors[] = "Input Date of Birth";
        }
        if (empty($dept)) {
            $errors[] = "Select Department";
        }
        if (empty($level)) {
            $errors[] = "Level is required.";
        }
        if (empty($address)) {
            $errors[] = "Input address.";
        }
        
        return $errors;
    }

    public function view(){
      $result =  $this->conn->query("SELECT * FROM students");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function create($firstname,$lastname,$email,$matric,$gender,$dob,$dept,$level,$address){
        $stmt = $this->conn->prepare("INSERT INTO students (first_name,last_name,email,
        matric_no,gender,dob,department,level,address)VALUE(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssssss', $firstname,$lastname,$email,
        $matric,$gender,$dob,$dept,$level,$address);
        return $stmt->execute();

    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); 
    }
    

    public function update($id,$firstname,$lastname,$email,$matric,$gender,$dob,$dept,$level,$address){
        $stmt = $this->conn->prepare("UPDATE students SET first_name = ?, last_name = ?,email=?,
        matric_no=?,gender=?,dob=?,department=?,level=?,address=? WHERE id =?");
        $stmt->bind_param('sssssssssi', $firstname,$lastname,$email,
        $matric,$gender,$dob,$dept,$level,$address,$id);
        $result = $stmt->execute();
        if (!$result) {
            echo "Update failed: " . $stmt->error;
        }
        return $result;
        
    }
    
    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id=?");
        $stmt->bind_param('i',$id);
        return $stmt->execute();
    }
   
    public function search($query) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ?");
        $search = "%" . $query . "%";
        $stmt->bind_param("sss", $search, $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    
        return $users;
    }

   
    public function getPaginated($limit, $offset) {
        $stmt = $this->conn->prepare("SELECT * FROM students ORDER BY id LIMIT ? OFFSET ?");
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getTotalUsers() {
        $result = $this->conn->query("SELECT COUNT(*) AS total FROM students");
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    
    

}