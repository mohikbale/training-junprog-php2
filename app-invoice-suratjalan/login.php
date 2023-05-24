<head>
	<title>Login | @ran-Multimedia</title>
	<link rel="stylesheet" type="text/css" href="skin/style_login.css"/>
</head>

<?php  
	session_start();
	require 'modul/config.php';

	// cek cookie
	if(isset($_COOKIE['login']) && isset($_COOKIE['key'])){
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		//ambil username berdasarkan id
		$result = mysql_query($conn, "SELECT username FROM user WHERE id = $id");
		$row = mysqli_fetch_assoc($result);

		// cek cookie dan username
		if($key === hash('sha256', $row['username'])){
			$_SESSION['login'] = true;
		}
	}

	if(isset($_SESSION["login"])){
		header("Location: index.php");
	}

if(isset($_POST["login"])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$login = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");
	$cek = mysqli_num_rows($login);

		if($cek > 0){
			$data = mysqli_fetch_assoc($login);

			if($data['level']=="Super Admin"){
				$_SESSION['username']	= $username;
				$_SESSION['level'] 		= "Super Admin";
				header("location: admin/index.php?x=dashboard&Id=$username");

			}elseif($data['level']=="Administrator"){
				$_SESSION['username'] 	= $username;
				$_SESSION['level'] 		= "Administrator";
				header("location: index.php?x=dashboard&Id=$username");

			}else{
				header("location:login.php?pesan=gagal");
				$error = true;
			}

		}else{
			header("location:login.php?pesan=gagal");
			$error = true;
		}
	}
?>

<script type="text/javascript" language="JavaScript">
    function konfirmasi(){
        tanya = confirm("Logout?");
        if (tanya == true) return true;
        else return false;
    }
</script>

<body>
	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
				echo "
					<script>
						window.alert('Periksa kembali Username / Password Anda!');
					</script>>
				";
			}
		}
	?>
	<div id='login'>
		<form action='' method='POST'>
			<div id='log-logo'><img src='img/logo_login.png'></div>
			<input type='text' name='username' placeholder='Username' autocomplete='off' required>
			<input type='password' name='password' placeholder='Password' required>
			<input type='submit' name='login' value=' Login '>

			<?php if(isset($error)) : ?>
				<p style="color: red; font-style: italic; text-align: center; margin-top: 7px;">Username / Password salah!</p>
		<?php endif; ?>
		</form>
	</div>
</body>