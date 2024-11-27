<?php
class Controller {

    private $users;

    public function __construct($users) {
        $this->users = $users;
    }

    public function showLoginForm() {
        $view = new LoginView();
        $view->generate();
    }

    public function doLogin() {
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";

        $user = $this->users->findByUsername($username);
        if($user != null) {
            if($user->check($username, $password)) {
                // was soll passieren wenn es stimmt...
                $_SESSION["authentificated"] = true;
                $view = new DefaultView();
                $view->generate();
            } else {
                // was soll passieren wenn es nicht stimmt
                $view = new LoginView();
                $view->generate("Nutzername od. Passwort stimmt nicht!");
            }
        } else {
            // was wenn nutzer nicht existiert...
            $view = new LoginView();
            $view->generate("Nutzername od. Passwort stimmt nicht!");
        }
    }

    public function showDefault() {
        $view = new DefaultView();
        $view->generate();
    }

    public function doLogout() {
        $_SESSION["authentificated"] = false;
        $view = new DefaultView();
        $view->generate();
    }

    public function run() {
        $action = $_REQUEST["action"]??"";
        if($action == "show-login") {
            $this->showLoginForm();
        } else if($action == "logout") {
            $this->doLogout();
        } else if($action == "login") {
            $this->doLogin();
        } else {
            $this->showDefault();
        }
    }
}
?>