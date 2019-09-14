<?php


//this class connects to the database
class abstractDAO
{
    /* Host address for the database */
    protected static $DB_HOST = "127.0.0.1";
    /* Database username */
    protected static $DB_USERNAME = "root";
    /* Database password */
    protected static $DB_PASSWORD = "";
    /* Name of database */
    protected static $DB_DATABASE = "wp_eatery";

    // protected static $DB_ADMIN = "adminusers";
    private $username;
    private $password;
    protected $mysqli;
    private $dbError;
    private $authenticated = false;

    function __construct()
    { //inserts the connection properties variables into mysqli
        try {
            $this->mysqli = new mysqli(
                self::$DB_HOST,
                self::$DB_USERNAME,
                self::$DB_PASSWORD,
                self::$DB_DATABASE,

            );
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    public function getMysqli()
    {
        return $this->mysqli;
    }
    public function authenticate($username, $password)
    {
        $loginQuery = "SELECT * FROM adminusers WHERE Username = ? AND Password = ?";
        $stmt = $this->mysqli->prepare($loginQuery);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $this->Username = $username;
            $this->Password = $password;
            $this->authenticated = true;
        }
        $stmt->free_result();
    }
    public function isAuthenticated()
    {
        return $this->authenticated;
    }
    public function hasDbError()
    {
        return $this->dbError;
    }
    public function getUsername()
    {
        return $this->username;
    }
}
