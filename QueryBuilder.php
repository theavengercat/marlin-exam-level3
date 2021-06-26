<?php
/*
 * This component used pattern Singleton for use
 */
class QueryBuilder {
    private static $instance = null;
    protected $pdo, $query, $error = false, $count, $results;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=project;charset=utf8', 'root', 'root'); // Need change your passwords
        } catch(PDOException $exception) {
            die($exception->getMessage());
        }
    }
    // Get instance
    public static function getInstance() {
        if(!isset(self::$instance))
            self::$instance = new QueryBuilder();

        return self::$instance;
    }

    public function query($sql, $params = []) {
        $this->error = false;
        $this->query = $this->pdo->prepare($sql);

        if($params) {
            $i = 1;
            foreach ($params as $v) {
                $this->query->bindValue($i, $v);
                $i++;
            }

        }

        if($this->query->execute()) {
            $this->error = 0;
            $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
        }
        else
            $this->error = 1;
        $this->count = $this->query->rowCount();

        return $this;


    }

    /*
     * $table -> table which we need
     * $data -> may be null, or your select where
     */
    public function get($table, $data = []) {
        return $this->action("SELECT *", $table, $data);

    }
    /*
     * $table -> table where we delete
     * $data -> what we need delete
     */
    public function delete($table, $data = []) {
        return $this->action("DELETE", $table, $data);

    }

    /*
     * $table -> table where we insert
     * $data -> data
     */
    public function insert($table, $data = []) {
        return $this->action("INSERT", $table, $data);

    }
    /*
     * $table -> table where we update
     * $data -> data
     */
    public function update($table, $data = [], $id) {
        return $this->action("UPDATE", $table, $data, $id);

    }

    public function action($action, $table, $data = [], $id = NULL)
    {
        if (preg_match('/SELECT/', $action) or preg_match('/DELETE/', $action)) {

            if (count($data) === 3) {

                $operators = ["=", ">", "<", "<=", ">="];

                if (!in_array(operator, $operators)) {

                    $field = $data[0];
                    $operator = $data[1];
                    $value = $data[2];

                    $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";


                    if (!$this->query($sql, [$value])->getError())
                        return $this;
                    return false;
                }
            } else {
                $sql = "{$action} FROM {$table}";

            }
            if (!$this->query($sql)->getError())
                return $this;
            return false;

        } elseif(preg_match('/INSERT/', $action)){

            $str = '';
            $prep = array();
            foreach($data as $k => $v )
                $str .= '?,';

            $str = substr($str,0,-1);

            $sql = "INSERT INTO {$table} (" . implode(', ',array_keys($data)) . ") VALUES (" . $str . ")";
            if (!$this->query($sql, $data)->getError())
                return $this;

            return false;
        } elseif(preg_match('/UPDATE/', $action)){

            $str = '';
            $prep = array();
            foreach($data as $k => $v )
                $str .= "{$k} = ?,";

            $str = substr($str,0,-1);
            $data[] = $id;
            $sql = "UPDATE {$table} SET {$str} WHERE id = ?";
            if (!$this->query($sql, $data)->getError())
                return $this;

            return false;
        }
    }


    public function getError()
    {
        return $this->error;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getResults()
    {
        return $this->results;
    }

    public function getFirst()
    {
        return $this->results[0];
    }

}


