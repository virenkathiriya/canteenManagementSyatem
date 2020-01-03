<?php
        session_start();
	if(!isset($_SESSION['id'])){
		header("Location:../signin.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
                .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 300px;
                margin: auto;
                text-align: center;
                }

                .title {
                color: grey;
                font-size: 18px;
                }
                button {
                        border: none;
                        outline: 0;
                        display: inline-block;
                        padding: 4px;
                        color: white;
                        background-color: #03021c;
                        text-align: center;
                        cursor: pointer;
                        width: 100%;
                        font-size: 16px;
                }
                button:hover, a:hover {
                        opacity: 0.6;
                }
                body {
			font-family: "Lato", sans-serif;
		}

		.sidenav {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #111;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 60px;
		}

		.sidenav a {
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: #818181;
			display: block;
			transition: 0.3s;
		}

                form a {
                        text-decoration: none;
                        font-size: 12px;
                        color: blue;
                }

		.sidenav a:hover {
			color: #f1f1f1;
		}

		.sidenav .closebtn {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
		}

		@media screen and (max-height: 450px) {
			.sidenav {padding-top: 15px;}
			.sidenav a {font-size: 18px;}
		}
                form {
                overflow: hidden;
                }
                .card h4 {
                        align: right;
                }
                input {
                        float: right;
                        clear: both;
                }

        </style>
</head>
<body>
        <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="../home.php">Home</a>
		<a href="./addfood.php">Add Food</a>
		<a href="./fetchfood.php">Fetch Food Info</a>
                <a href="./updatefood.php">Update Food Price</a>
                <a href="./removefood.php">Remove Item</a>
		<a href="../logout.php">logout</a>
	</div>
	<div><div style="width:100%; margin:0px auto;">
		<h2 align="center">Canteen Management System : Food<h2>
	</div>
	<hr />
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div style="width:400px; margin:50px auto; border:solid #03021c 1px">
                <h4 align="center">Update Price</h4>
                <form action="#" method="post" style="padding:20px 50px" label="Log In">
                        <label>Food Id:</label>
                        <input type="number" name="food_id" required>
                        <br />
                        <br />
                        <label>Food price :</label>
                        <input type="number" name="food_price" required>
                        <br />
                        <br />
                        <button type="submit">Update Price</button>
                        <br />
                        
                </form>
        </div>
        <script>
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}
	</script>
        <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $conn = mysqli_connect("localhost", "root", "root", "canteen");
                        if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM food WHERE food_id='" . $_POST["food_id"] . "'";
                        $result = $conn->query($sql);
                        $row  = mysqli_fetch_array($result);
                        if(is_array($row)) {
                                $sqlup = "UPDATE food SET food_price='".$_POST['food_price']."' WHERE food_id='" . $_POST["food_id"] . "'";
                                if( $conn->query($sqlup) === true ){
                                        echo "<h4 align='center'>Updated Successfully!<h4>";
                                }else{
                                        echo "<h4 align='center'>Unkonwn Error!<h4>";
                                }
                        } else {
                                        echo "<h4 align='center'>food Not Found!<h4>";
                        }
                }
        ?>
</body>
</html>