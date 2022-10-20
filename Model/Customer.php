<?php
namespace Phppot;

class Member
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../Controller/DataSource.php';
        $this->ds = new DataSource();
    }

    // this is for checkcing if the email already exists

    public function isEmailExists($email)
    {
        $query = 'SELECT * FROM customer where customer_email = ?';
        $paramType = 's';
        $paramValue = array(
            $email
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    //to signup and  register a user
    public function registerMember()
    {
        $isEmailExists = $this->isEmailExists($_POST["email"]);
        if ($isEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "Email already exists."
            );
        } else {
            if (! empty($_POST["signup-password"])) {

                // storing the password_hash for safety 
                $hashedPassword = password_hash($_POST["signup-password"], PASSWORD_DEFAULT);
            }
            $query = 'INSERT INTO customer(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact) VALUES (?, ?, ?, ?, ?, ?)';
            $paramType = 'ssssss';
            $paramValue = array(
                $_POST["fullname"],
                $_POST["email"],
                $hashedPassword,
                $_POST["country"],
                $_POST["city"],
                $_POST["phone"]
            );
            $memberId = $this->ds->insert($query, $paramType, $paramValue);
            if (! empty($memberId)) {
                $response = array(
                    "status" => "success",
                    "message" => "You have registered successfully."
                );
            }
        }
        return $response;
    }

    public function getMember($email)
    {
        $query = 'SELECT * FROM customer where customer_email = ?';
        $paramType = 's';
        $paramValue = array(
            $email
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }

    // to login a customer
    public function loginMember()
    {
        $memberRecord = $this->getMember($_POST["email"]);
        $loginPassword = 0;
        if (! empty($memberRecord)) {
            if (! empty($_POST["login-password"])) {
                $password = $_POST["login-password"];
            }
            $hashedPassword = $memberRecord[0]["customer_pass"];
            $loginPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
        } else {
            $loginPassword = 0;
        }
        if ($loginPassword == 1) {
            
            
            // if the login works, then store the customer's email in the session
            session_start();
            $_SESSION["email"] = $memberRecord[0]["email"];
            session_write_close();
            $url = "./home.php";
            header("Location: $url");
        } else if ($loginPassword == 0) {
            $loginStatus = "Invalid email or password.";
            return $loginStatus;
        }
    }
}
