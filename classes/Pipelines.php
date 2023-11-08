<?
include_once 'Main.php';
class Pipelines extends Main {
    public function __construct() {
    	parent::__construct();
    }
    public function getAllPipelines() {
      	$query = "SELECT * FROM `general` JOIN `pipelines` ON general.title_id=pipelines.id JOIN `divisions` ON general.division=divisions.id";
		$data = self::getDate($query);
		return $data ? $data : false;
    }
	public function getJoinPipelines($id) {
		$res = [];
		$data = self::checkJoin($id);
		if($data) $res[] = $data;
		if(isset($data["joinId"])) {
			$newData = self::checkJoin($data["joinId"]);
			if($newData) $res[] = $newData;
		}
		return $res[0] ? $res : false;
  	}
	public function checkJoin($id) {
		$query = "SELECT * FROM `general` JOIN `pipelines` ON general.title_id=pipelines.id JOIN `divisions` ON general.division=divisions.id WHERE id_pip=".$id;
		$data = self::getDate($query);
		return $data ? $data[0] : false;
	}
}
?>