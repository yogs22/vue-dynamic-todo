<?php  
header('Content-type: application/json');

$conn = mysqli_connect('localhost', 'root', 'password', 'mylab');
$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
	case 'GET':
		$sql = "SELECT * FROM todo";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
			http_response_code(200);
			die();
		}
		
		break;

	case 'POST':
		$text = $_POST['text'];
		$done = $_POST['done'];
		$id_date = $_POST['id_date'];

		if (!isset($text)) {
			http_response_code(400);
			echo "Error !";
			die();
		}

		$sql = "INSERT INTO todo (text, done, id_date) VALUES ('$text', $done, $id_date)";
		$process = mysqli_query($conn, $sql);
		http_response_code(200);
		echo "Sukses !";
		die();

		break;

	case 'DELETE':
		$id_date = $_GET['id'];
		$sql = "DELETE FROM todo WHERE id_date = '$id_date'";
		$process = mysqli_query($conn, $sql);
		http_response_code(200);
		echo "Sukses !";
		die();

		break;

	case 'PUT':
		$id_date = $_GET['id'];
		$done = $_GET['done'];
		$sql = "UPDATE todo SET done = $done WHERE id_date = $id_date";
		$process = mysqli_query($conn, $sql);
		http_response_code(200);
		echo "Sukses";
		die();
		
		break;
	
	default:
		# code...
		break;
}

?>