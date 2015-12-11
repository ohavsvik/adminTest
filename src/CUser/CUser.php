<?php
/**
 * A class which handles user data from a database
 *
 * @category
 * @package
 * @author
 * @license
 * @link
 */
class CUser
{
    private $acronym;
    private $name;
    private $database;


    /**
     * Constructor
     *
     * @param CDatabase $database The database object that should be used
     *                      Should have a table named 'User' which should have
     *                      'acronym', 'name' and 'password' columns.
     */
    public function __construct($database)
    {
        if ($this->isAuthenticated()) {
            $this->acronym = $_SESSION['user']->acronym;
            $this->name = $_SESSION['user']->name;
        }
        $this->database = $database;
    }


    /**
     * Tries to log in a user, sets $_SESSION['user'] if successful
     *
     * @param  string $user     The username to compare
     * @param  string $password The password to compare
     * @return boolean           If the login was successful or not
     */
    public function login($user, $password)
    {
        $success = false; //if the login was successful

        if (!$this->isAuthenticated()) {
            //Don't want to store the password in the SESSION
            $sql = "SELECT acronym, name FROM User WHERE acronym = ? AND password = md5(concat(?, salt))";
            $params = array($user, $password);
            $res = $this->database->executeQueryAndFetchAll($sql, $params);

            if (isset($res[0])) {
                $_SESSION['user'] = $res[0];
                $success = true;
            }
        }

        return $success;
    }

    /**
     * Logs out the user by unsetting the $_SESSION['user']
     *
     * @return boolean If the logout-attempt was successful or not
     */
    public function logout()
    {
        $success = false;

        if ($this->isAuthenticated()) {
            unset($_SESSION['user']);
            $this->acronym = null;
            $this->name = null;
            $success =true;
        }

        return $success;
    }


    /**
     * Creates a login form if the user is not logged in
     * @return string A HTML form
     */
    public function generateLoginForm()
    {
        $form = "Du är inloggad.";
        if (!$this->isAuthenticated()) {
            $form = <<<EOD
            <form method="post" action="">
                <p><input type="text" name="acronym" value="" placeholder="Användarnamn"></p>
                <p><input type="password" name="password" value="" placeholder="Lösenord"></p>
                <p class="submit"><input type="submit" name="login" value="Logga in"></p>
            </form>
EOD;
        }
        return $form;
    }


    /**
     * Generates a logout form if the user is logged in
     *
     * @return string A string with the HTML form
     */
    public function generateLogoutForm()
    {
        $form = "Du är inte inloggad.";
        if ($this->isAuthenticated()) {
            $form = <<<EOD
            <form method="post" action="">
                <p class="submit"><input type="submit" name="logout" value="Logga ut"></p>
            </form>
EOD;
            return $form;
        }
        return $form;
    }


    /**
     * Checks if the a user is logged in
     *
     * @return boolean If the user is logged in
     */
    public function isAuthenticated()
    {
        return isset($_SESSION['user']);
    }


    /**
     * @return string Returns the current users name
     */
    public function getName()
    {
        return $this->isAuthenticated() ? $this->name : null;
    }


    /**
     * @return string Returns the current users acronym
     */
    public function getAcronym()
    {
        return $this->isAuthenticated() ? $this->acronym : null;
    }
}
