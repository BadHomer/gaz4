<?
class Database {
    private $_host = 'localhost';
	private $_username = 'root';
	private $_password = 'root';
	private $_database = 'gazprom2';
	protected $connection = false;
	public function __construct() {
		if (!$this->connection) {
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database); 
			if ($this->connection->connect_errno) {
				printf("Соединение не удалось: %s\n", $this->connection->connect_error);
				exit;
			}
		}
	}
    public function redirect($_link) {
        header('Location:' .$_link .'.php');
    }
} 
?>