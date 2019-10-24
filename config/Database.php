<?php
namespace Core\Config;


class Database
{
    /////////////////////////////////////////////////////
    ///             Database parameters               ///
    /// --------------------------------------------- ///
    private $host       = "localhost";
    private $db_name    = "elearningdb";
    private $username   = "root";
    private $password   = "";
    /// -------------------------------------------- ///
    ////////////////////////////////////////////////////

    private $db = null; // Database odject

    private $error_msg = "";

    public function __construct()
    {
        if (is_null($this->db)){
            $this->initDb();
        }
    }

    /**
     * Initiliaze database object
     * @return array
     */
    private function initDb()
    {
        try {
            $this->db = new \PDO('mysql:host='.$this->host.';dbname='.$this->db_name.';charset=utf8', $this->username, $this->password);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        }catch (\PDOException $e){
            $this->setErrorMsg($e->getMessage());
            exit("Connexion error");
        }
    }

    /**
     * Get database connexion
     * @return Database Object
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @return string
     */
    public function getErrorMsg()
    {
        return $this->error_msg;
    }

    /**
     * @param string $error_msg
     */
    public function setErrorMsg($error_msg)
    {
        $this->error_msg = $error_msg;
    }
}