<?php 
    class Database extends PDO{

        public function __construct($connect, $user, $pass)
        {
            parent::__construct($connect, $user, $pass);
            // $db = new PDO($connect, $user, $pass);
        }
        public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC){
            $statement = $this->prepare($sql);
            foreach($data as $key => $value){
                $statement->bindValue($key, $value);
            }
            $statement->execute();
            return $statement->fetchAll($fetchStyle);
        }
        public function insert($table, $data = array()){
            $key = implode(', ',array_keys($data));
            $value = ":".implode(', :', array_keys($data));
            $sql = "INSERT INTO $table($key) VALUES ($value) ";
            $statement = $this->prepare($sql);
            foreach($data as $x_key => $value){
                $statement->bindValue(":".$x_key, $value);
            }
            return $statement->execute();
        }
        public function update($table, $data = array(), $cond){
            $updateKey="";
            foreach( $data as $key => $value ){
                $updateKey= $updateKey."$key=:$key,";
             }
            $updateKey = rtrim($updateKey, ',');
            $sql = "UPDATE $table SET $updateKey WHERE $cond";
            $statement = $this->prepare($sql);
            foreach($data as $x_key => $value){
                $statement->bindValue(":".$x_key, $value);
            }
            return $statement->execute();
        }
        public function delete($table, $cond, $limit = 1){
            $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
            $statement = $this->prepare($sql);
            return $statement->execute();
        }
        public function affectedRows($sql, $username, $password){
            $statement = $this->prepare($sql);
            $statement->execute(array($username, $password));
            return $statement->rowCount();
        }
        public function selectUser($sql, $username, $password){
            $statement = $this->prepare($sql);
            $statement->execute(array($username, $password));
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }


?>