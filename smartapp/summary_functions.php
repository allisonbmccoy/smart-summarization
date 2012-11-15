<?php
	
	function get_problems($medication) {
		$db = new PDO("sqlite:sqlite/summary.db");

		$query = $db->prepare("SELECT problem from ndfrt WHERE medication = ?");
		$query->execute(array($medication));
		
		$results = $query->fetchAll();
		$problems = array();
		foreach ($results as $r) {
			$problems[] = $r['problem'];
		}
		return $problems;
	}
	
	$function = $_GET['function'];
	if ($function == "get_problems") {
 		$medication = $_GET['scui'];

        	if (strlen($medication) > 0) {
                	echo implode(",", get_problems($medication));
        	} else {
                	echo json_encode(array());
		}
	}
	

?>
