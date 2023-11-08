<?
include_once 'DB.php';
class Main extends Database {
    public function __construct() {
		parent::__construct();
	}
    public function addDate($query) {
        $error = [];
        $result = $this->connection->query($query);
        if (!$result)
			$error[] =  'Не получилось добавить данные!';
        return isset($error[0]) ? $error[0] : true;
    }
    public function getDate($query) {
        $result = $this->connection->query($query);
		if (!$result) return false; 
		$rows = [];
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
    }
    public function addOptionOnTable ($option) {
        return '<span>'. $option .'</span>';
    }
}
?>