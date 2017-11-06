<?php

  class Account {

    private $con;
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function register($username, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword) {
      $this->validateUsername($username);
      $this->validateFirstName($firstName);
      $this->validateLastName($lastName);
      $this->validateEmails($email, $confirmEmail);
      $this->validatePasswords($password, $confirmPassword);

      if(empty($this->errorArray) == true) {
        // Insert into DB
        return $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
      }
      else {
        return false;
      }
    }

    public function getError($error) {
      if(!in_array($error, $this->errorArray)) {
        $error = "";
      }
      return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($username, $firstName, $lastName, $email, $password) {
          $encryptedPw = md5($password);
          $profilePic = "assets/images/profie-pics/aaron.png";
          $date = date("Y-m-d");

          $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$username', '$firstName', '$lastName', '$email', '$encryptedPw', '$date', '$profilePic')");

          return $result;
    }


    private function validateUsername($username) {
        if(strlen($username) > 25 || strlen($username) < 5){
          array_push($this->errorArray, Constants::$userNameLength);
          return;
        }
        // TODO: check that username has not already been used
    }

    private function validateFirstName($firstName) {
      if(strlen($firstName) > 25 || strlen($firstName) < 2){
        array_push($this->errorArray, Constants::$firstNameLength);
        return;
      }
    }

    private function validateLastName($lastName) {
      if(strlen($lastName) > 25 || strlen($lastName) < 2){
        array_push($this->errorArray, Constants::$lastNameLength);
        return;
      }
    }

    private function validateEmails($email, $confirmEmail) {
      if($email != $confirmEmail) {
        array_push($this->errorArray, Constants::$emailsDoNotMatch);
        return;
      }
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($this->errorArray, Constants::$emailsInvalid);
        return;
      }
      //TODO: Check that email has not already been used
    }

    private function validatePasswords($password, $confirmPassword) {
      if($password != $confirmPassword) {
        array_push($this->errorArray, Constants::$passwordsDoNotMatch);
        return;
    }
    if(preg_match('/[^A-Za-z0-9]/', $password)){
        array_push($this->errorArray, Constants::$passwordsNotAlphaNumeric);
        return;
    }
    if(strlen($password) > 25 || strlen($password) < 5){
        array_push($this->errorArray, Constants::$passwordsLength);
        return;
      }
    }
  }
?>
