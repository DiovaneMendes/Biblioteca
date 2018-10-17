<?php
    class PDOFactory{
        private static $pdo;

        $db = parse_url(getenv("DATABASE_URL"));

        $pdo = new PDO("pgsql:" . sprintf(
            "host=%s;port=%s;user=%s;password=%s;dbname=%s",
            $db["host"],
            $db["port"],
            $db["user"],
            $db["pass"],
            ltrim($db["path"], "/")
        ));


        public static function getConexao()
        {
            if(!isset($pdo)){
                //$pdo = new PDO("mysql:host=localhost;dbname=biblioteca;charset=UTF8","root", "");
                $pdo = new PDO("pgsql:host=localhost;dbname=biblioteca;user=postgres;password=postgres;");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		        $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES,false);
		        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }
            return $pdo;
        }
    }
?>