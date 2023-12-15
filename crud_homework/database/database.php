<?php
/**
 * Connect to database
 */
function db() {
    $host     = 'localhost'; // Because MySQL is running on the same computer as the web server
    $database = 'st'; // Name of the database you use (you need first to CREATE DATABASE in MySQL)
    $user     = 'root'; // Default username to connect to MySQL is root
    $password = 'mysql'; // Default password to connect to MySQL is empty
    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
      return $db;
}

/**
 * Create new student record
 */
function createStudent($value) {
    $db = db();
    $stmt = $db->prepare("INSERT INTO student (name, age, email, profile) VALUES (:name, :age, :email, :profile)");
    $stmt->bindParam(':name', $value['name']);
    $stmt->bindParam(':age', $value['age']);
    $stmt->bindParam(':email', $value['email']);
    $stmt->bindParam(':profile', $value['profile']);
    $stmt->execute();
}

/**
 * Get all data from table student
 */
function selectAllStudents() {
    $db = db();
    $stmt = $db->prepare("SELECT * FROM student");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
    $db = db();
    $stmt = $db->prepare("SELECT * FROM student WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Delete student by id
 */
function deleteStudent($id) {
    $db = db();
    $stmt = $db->prepare("DELETE FROM student WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


/**
 * Update students
 *
 * @param array $studentData Thông tin sinh viên
 */
function updateStudent($studentData) {
    $db = db();
    $stmt = $db->prepare("UPDATE student SET name = :name, age = :age, email = :email, profile = :profile WHERE id = :id");
    $stmt->bindValue(':name', $studentData['name']);
    $stmt->bindValue(':age', $studentData['age']);
    $stmt->bindValue(':email', $studentData['email']);
    $stmt->bindValue(':profile', $studentData['profile']);
    $stmt->bindValue(':id', $studentData['id']);
    $stmt->execute();
}

