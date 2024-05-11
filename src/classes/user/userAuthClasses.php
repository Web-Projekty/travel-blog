<?php
class Auth
{
    public $Session;
    public $Database;
    public function __construct()
    {
        $this->Session = new Session;
        $this->Database = new Database;
    }
    ### automated login method, returns true or false of based on status ###

    public function login($username, $password)
    {
        $loginResult['status'] = false;
        $sql = "SELECT password, idUsers FROM `Users` WHERE `userName` = '$username'";
        $result = $this->Database->query($sql);
        $row = $result->fetch_row();

        if (isset($row)) {
            $hash = $row[0];
            $uid = $row[1];
            if (password_verify($password, $hash)) {
                $loginResult['status'] = true;
                $loginResult['msg'] = "Přihlášení proběhlo úspěšně";
                $this->Session->setSession($uid);
                return $loginResult;
            } else {
                $loginResult['msg'] = "Špatné heslo";
                return $loginResult;
            }
        } else {
            $loginResult['msg'] = "Uživatel neexistuje";
            return $loginResult;
        }
    }

    ### registration function ###
    public function register($password, $cpassword, $name, $email)
    {
        // sets basic variables
        $registerResult['status'] = false;
        // tests if email is in correct format
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // extracts username from email
            $emailParts = explode("@", $email);
            $username = $emailParts[0];

            if ($this->Database->rowExists("Users", "userName", $username)) {
                $registerResult['msg'] =  "Uživatel s tímto uživatelským jménem již existuje";
            } elseif ($this->Database->rowExists("Users", "userEmail", $email)) {
                $registerResult['msg'] =  "Někdo už používá tento e-mail";
            } else {
                if ($password == $cpassword) {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO `Users` (`idUsers`, `userName`, `user`, `userEmail`, `password`, `role`) VALUES (NULL, '$username', '$name', '$email', '$hashedPassword', 'delegate');";
                    $this->Database->query($sql);
                    $registerResult['status'] = true;
                    $registerResult['msg'] = "Registrace proběhla úspěšně";
                } else {
                    $registerResult['msg'] =  "Zadaná hesla nesouhlasí";
                }
            }
        } else {
            $registerResult['msg'] =  "Zadaný e-mail není validní";
        }
        return $registerResult;
    }
    public function getUserRole($uid)
    {
        $sql = "SELECT role FROM Users WHERE idUsers = $uid";
        $this->Database->query($sql);
    }
    # note: přesunout do Session a rozdělit na dvě metody
    public function getAuthDetail()
    {
        if ($uid = $this->Session->getUid()) {
            $uid = $this->Session->getUid();
        }
        $sql = "SELECT user FROM Users WHERE idUsers = $uid";
        $username = $this->Database->query($sql)->fetch_column();

        $status = $this->Session->getAuthStatus();

        return [$status, $username];
    }
    public function logout()
    {
        $this->Session->logout();
    }
}
