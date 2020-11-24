<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:13
 */

namespace app\core\Managers\DatabaseManager\API;

use \PDO;

/**
 * Class PDOFactory
 * @package app\core\Managers\DatabaseManager\API
 */
class PDOFactory
{
    /**
     * @param $host
     * @param $dbname
     * @param $user
     * @param $password
     * @return PDO
     */
    public static function getMysqlConnexion($host, $dbname, $user, $password)
    {
        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            die('Erreur lors de connexion à la base de données');
        }
        return $db;
    }

    /**
     *
     */
    public static function getPgSqlConnexion()
    {

    }

    /**
     *
     */
    public static function getOracleConnexion()
    {

    }

    /**
     *
     */
    public static function getSqlServerConnexion()
    {

    }

    /**
     *
     */
    public static function getNeoConnexion()
    {

    }

    /**
     *
     */
    public static function getMongoDbConnexion()
    {

    }
}