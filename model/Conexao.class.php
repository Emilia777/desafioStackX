<?php  

	$conn = mysqli_connect('localhost', 'root', '', 'cadastrofunc');

	$user_id = 3;

	if (!$conn) {
		die("Erro ao conectar no banco de dados: " . mysqli_connect_error($conn));
		exit();
	}
	
		if (isset($_POST['action'])) {
		$func_id = $_POST['func_id'];
		$action = $_POST['action'];

		switch ($action) {
			case 'like':
				$sql = "INSERT INTO rating_info (func_id, user_id, rating_action) 
				VALUES ($func_id, $user_id, 'like')
				ON DUPLICATE KEY UPDATE rating_action= 'like'";
			break;

			case 'dislike':
				$sql = "INSERT INTO rating_info (func_id, user_id, rating_action) 
				VALUES ($func_id, $user_id, 'dislike')
				ON DUPLICATE KEY UPDATE rating_action= 'dislike'";
			break;

			case 'unlike':
				$sql = "DELETE FROM rating_info WHERE user_id=$user_id AND func_id=$func_id";
			break;

			case 'undislike':
				$sql = "DELETE FROM rating_info WHERE user_id=$user_id AND func_id=$func_id";
			break;

		default:

			break;
		}

		mysqli_query($conn, $sql);
		echo getRating($func_id);
		exit(0);
	}

	function getRating($id)
{
  global $conn;
  $rating = array();

  $likes_query = "SELECT COUNT(*) FROM rating_info WHERE func_id = $id AND rating_action='like'";

  $dislikes_query = "SELECT COUNT(*) FROM rating_info 
		  			WHERE func_id = $id AND rating_action='dislike'";

  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);

  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);

  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];

  return json_encode($rating);
}

function getLikes($id)
{
  global $conn;

  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE func_id = $id AND rating_action='like'";

  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);

  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $conn;

  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE func_id = $id AND rating_action='dislike'";

  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);

  return $result[0];
}


// Check if user already likes post or not
function userLiked($func_id)
{
  global $conn;
  global $user_id;

  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND func_id=$func_id AND rating_action='like'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($func_id)
{
  global $conn;
  global $user_id;

  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND func_id=$func_id AND rating_action='dislike'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}
	

$sql = "SELECT * FROM funcionalidades";
$result = mysqli_query($conn, $sql);
$funcionalidades = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
