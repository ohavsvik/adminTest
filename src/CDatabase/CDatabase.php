<?php

/**
 * Database wrapper, provides a database API for the framework but hides details of implementation.
 *
 * @category
 * @package
 * @author
 * @license
 * @link
 */
class CDatabase
{

    /**
    * Members
    */
    private $options;                   // Options used when creating the PDO object
    private $database   = null;               // The PDO object
    private $stmt = null;               // The latest statement used to execute a query
    private static $numQueries = 0;     // Count all queries made
    private static $queries = array();  // Save all queries for debugging purpose
    private static $params = array();   // Save all parameters for debugging purpose


    /**
    * Constructor creating a PDO object connecting to a choosen database.
    *
    * @param array $options containing details for connecting to the database.
    */
    public function __construct($options)
    {
        $default = array(
            'dsn' => null,
            'username' => null,
            'password' => null,
            'driver_options' => null,
            'fetch_style' => PDO::FETCH_OBJ
        );
        //The right array overrides values in the left
        $this->options = array_merge($default, $options);

        try {
            $this->database = new PDO(
                $this->options['dsn'],
                $this->options['username'],
                $this->options['password'],
                $this->options['driver_options']
            );
        } catch (Exception $e) {
            throw $e; // For debug purpose, shows all connection details
            // Hide connection details.
            //throw new PDOException('Could not connect to database, hiding connection details.');
        }

        // Get debug information from session if any.
        if (isset($_SESSION['CDatabase'])) {
            self::$numQueries = $_SESSION['CDatabase']['numQueries'];
            self::$queries    = $_SESSION['CDatabase']['queries'];
            self::$params     = $_SESSION['CDatabase']['params'];
            unset($_SESSION['CDatabase']);
        }

        $this->database->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->options['fetch_style']);
    }


    /**
     * Excecutes and returns the restult of a given query
     *
     * @param  string  $query  Query with ?
     * @param  array   $params Array with parameters to use in the wuery
     * @return array with the ressult
     */
    public function executeQueryAndFetchAll($query, $params = array())
    {
        //Updating statis
        self::$queries[] = $query;
        self::$params[] = $params;
        self::$numQueries++;

        $this->stmt = $this->database->prepare($query);
        $this->stmt->execute($params);

        return $this->stmt->fetchAll();
    }

    /**
    * Execute a SQL-query and ignore the resultset.
    *
    * @param  string  $query  the SQL query with ?.
    * @param  array   $params array which contains the argument to replace ?.
    * @return boolean returns TRUE on success or FALSE on failure.
    */
    public function executeQuery($query, $params = array())
    {
        //Updating statis
        self::$queries[] = $query;
        self::$params[] = $params;
        self::$numQueries++;

        $this->stmt = $this->database->prepare($query);
        return $this->stmt->execute($params);

        return null;
    }


    /**
    * Get a html representation of all queries made, for debugging and analysing purpose.
    *
    * @return string with html.
    */
    public function dump()
    {
        $html  = '<p><i>You have made ' . self::$numQueries . ' database queries.</i></p><pre>';

        // commennts for validation
        /*
        foreach (self::$queries as $key => $val) {
            $params = empty(self::$params[$key]) ? null : htmlentities(print_r(self::$params[$key], 1)) . '<br/></br>';
            $html .= $val . '<br/></br>' . $params;
        }
        */
        return $html . '</pre>';
    }


    /**
    * Return last insert id.
    */
    public function lastInsertId()
    {
        return $this->database->lastInsertid();
    }

    /**
    * Return rows affected of last INSERT, UPDATE, DELETE
    */
    public function rowCount()
    {
        return is_null($this->stmt) ? $this->stmt : $this->stmt->rowCount();
    }

    /**
     * Save debug information in session, useful as a flashmemory when redirecting to another page.
     *
     * @param string $debug enables to save some extra debug information.
     */
    public function saveDebug($debug = null)
    {
        if (!is_null($debug)) {
            self::$queries[] = $debug;
            self::$params[] = null;
        }

        self::$queries[] = 'Saved debuginformation to session.';
        self::$params[] = null;

        $_SESSION['CDatabase']['numQueries'] = self::$numQueries;
        $_SESSION['CDatabase']['queries']    = self::$queries;
        $_SESSION['CDatabase']['params']     = self::$params;
    }
}
