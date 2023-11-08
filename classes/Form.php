<?
include_once 'DB.php';
include_once 'Main.php';
class Form extends Main {
    public function __construct() {
		parent::__construct();
	}
    public function getDivisions() {
        $query = "SELECT * FROM `divisions`";
        $data = self::getDate($query);
        return $data ? $data : false;
    }
    public function getPipelines() {
        $query = "SELECT * FROM `pipelines`";
        $data = self::getDate($query);
        return $data ? $data : false;
    }
    public function addString($params) {
        $query='INSERT INTO general ('.implode(',',array_keys($params)).') VALUES ("' . implode('", "', $params) . '")';
        $data = self::addDate($query);
        return $data ? $data : false;
    }
    public function getJoin($params) {
        $query = 'SELECT * FROM `general` JOIN `pipelines` ON general.title_id=pipelines.id JOIN `divisions` ON general.division=divisions.id WHERE `current` > '.$params["currentValueMin"].' AND  `current` < '.$params["currentValueMax"];
        $data = self::getDate($query);
        return $data ? $data : false;
    }
}
?>