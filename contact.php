<!DOCTYPE html>
<html>
<head>
	<title>Contactez-nous</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <link rel="icon" href="images/small_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

	<script src="js/index.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
	<script type="text/javascript">
	(function()
	{
		emailjs.init("QkV6GNfZmNoCyyynL");
	}
	)();
	</script>

    <style>
        *{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: Arial, Helvetica, sans-serif;
}

body{
	height: 100vh;
	width: 100%;
}

.container{
	position: relative;
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	padding: 20px 100px;
}

.container:after{
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	background: url("images/menu-burger.jpg") no-repeat center;
	background-size: cover;
	filter: blur(50px);
	z-index: -1;
}
.contact-box{
	max-width: 850px;
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	justify-content: center;
	align-items: center;
	text-align: center;
	background-color: #fff;
	box-shadow: 0px 0px 19px 5px rgba(0,0,0,0.19);
}

.left{
	background: url("images/burger.jpg") no-repeat center;
	background-size: cover;
	height: 100%;
}

.right{
	padding: 25px 40px;
}

h2{
	position: relative;
	padding: 0 0 10px;
	margin-bottom: 10px;
}

h2:after{
	content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    height: 4px;
    width: 50px;
    border-radius: 2px;
    background-color: #ffba08;
}

.field{
	width: 100%;
	border: 2px solid rgba(0, 0, 0, 0);
	outline: none;
	background-color: rgba(230, 230, 230, 0.6);
	padding: 0.5rem 1rem;
	font-size: 1.1rem;
	margin-bottom: 22px;
	transition: .3s;
}

.field:hover{
	background-color: rgba(0, 0, 0, 0.1);
}

textarea{
	min-height: 150px;
}

.btn{
	width: 100%;
	padding: 0.5rem 1rem;
	background-color: #ffba08;
	color: #fff;
	font-size: 1.1rem;
	border: none;
	outline: none;
	cursor: pointer;
	transition: .3s;
}

.btn:hover{
    background-color: #9d0208;
}

.field:focus{
    border: 2px solid #ffba08;
    background-color: #fff;
}

@media screen and (max-width: 880px){
	.contact-box{
		grid-template-columns: 1fr;
	}
	.left{
		height: 200px;
	}
}
    </style>
</head>
	<section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Contactez-nous</h2>
				<input type="text" autocomplete="off" id="full_name" class="field" required placeholder="Nom & Prenom">
				<input type="text" autocomplete="off" id="email" class="field" required placeholder="Email">
				<input type="text" autocomplete="off" id="tele" class="field" required placeholder="Tele">
				<textarea placeholder="Message" autocomplete="off" id="message" class="field"></textarea>
				<button class="btn" onclick="sendMail()">Envoyer</button>
			</div>
		</div>
	</div>
        
	<?php include('partials-front/footer.php'); ?>