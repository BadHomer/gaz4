<?
class Validation {
	public function check_empty($data, $fields) {
		$msg = null;
		foreach ($fields as $value) {
			if (empty($data[$value])) {
				$msg .= "Поле $value не может быть пустым!";
			}
		} 
		return $msg;
	}
}
?>
