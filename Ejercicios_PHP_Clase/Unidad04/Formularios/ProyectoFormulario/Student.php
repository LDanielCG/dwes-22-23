<?php
    class Student{
        use input;

        private $name;
        private $surname;
        private $user;
        private $password;
        private $mail;
        private $phone;
        private $gender;
        private $grade;
        private $birthdate;

        function __construct($name,$surname,$user,$password,$mail,$phone,$gender,$birthdate){
            $this->name = $name;
            $this->surname = $surname;
            $this->user = $user;
            $this->password = $password;
            $this->mail = $mail;
            $this->phone = $phone;
            $this->gender = $gender;
            $this->birthdate = $birthdate;
        }

        function getName(){return $this->name;}
        function getSurname(){return $this->surname;}
        function getUser(){return $this->user;}
        function getPassword(){return $this->password;}
        function getMail(){return $this->mail;}
        function getPhone(){return $this->phone;}
        function getGender(){return $this->gender;}
        function getGrade(){return $this->grade;}
        function getBirthdate(){return $this->birthdate;}

        function setName($name){$this->name=$name;}
        function setSurname($surname){$this->surname=$surname;}
        function setUser($user){$this->user=$user;}
        function setPassword($password){$this->password=$password;}
        function setMail($mail){$this->mail=$mail;}
        function setPhone($phone){$this->phone=$phone;}
        function setGender($gender){$this->gender=$gender;}
        function setGrade($grade){$this->grade=$grade;}
        function setBirthdate($birthdate){$this->birthdate=$birthdate;}
    }
?>