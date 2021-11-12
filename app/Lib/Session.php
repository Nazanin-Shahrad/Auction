<?php
namespace App\Lib;
use App\Models\User;
use PDO;
use PDOException;
use SessionHandlerInterface;

class Session implements SessionHandlerInterface{

    private  static $dbConnection;

    public function __construct()
    {
        session_set_save_handler($this, true);
        session_start();

    }
    public function __destructor(){
        session_write_close();
    }



    public function open ($save_path , $session_name): bool {

        try {
            self::$dbConnection = new PDO("mysql:host=" . DB_HOST .
                ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
      self::$dbConnection->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            Logger::getLogger()->critical("could not create DB connection: ", ['exception' => $e]);
            die();

        }
        if (isset(self::$dbConnection)){
            return true;
        }
        else {
            return false;
        }

    }

    public function close(): bool{
        self::$dbConnection = null;
        return true;
    }

    public function read($id): string{
        try{
            $sql = "SELECT data FROM sessions WHERE id= :id";
            $statement = self::$dbConnection->prepare($sql);
            $statement->execute(compact("id"));
            if($statement->rowCount() == 1){
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                return $result['data'];
            }else {
                return "";
            }
        } catch(PDOException $e){
            Logger::getLogger()->critical("could not execute query: ", ['exception' => $e]);
            die();
        }
    }

    public function write($id,$data){
        try{
            $sql ="REPLACE INTO sessions (id,data)
                    VALUES (:id, :data)";
            $statement = self::$dbConnection->prepare($sql);
            $result = $statement->execute(compact("id","data"));
            return $result ? true : false;


        }catch (PDOException $e){
            Logger::getLogger()->critical("could not execute query: ",['exception'=>$e]);
            die();
        }
    }

    public function destroy($id){
        try {
            $sql = "SELECT FROM sessions WHERE id = :id";
            $statement = self::$dbConnection->prepare($sql);
            $result = $statement->execute(compact("id"));
            return $result ? true : false ;
        } catch (PDOException $e){
            Logger::getLogger()->critical("could not execute query: ",['exception'=>$e]);
            die();
        }
    }

    public function gc($expire){
        try {
            $sql = "DELETE FROM sessions WHERE DATE_ADD(last_accessed , INTERVAL $expire SECOND) < NOW()";
            $statement =  self::$dbconnection->prepare($sql);
            $result = $statement->execute();
            return $result ? true : false;
        } catch(PDOException $e){
            Logger::getLogger()->critical("could not execute query: ",['exception'=>$e]);
            return false;
        }
    }



}



