<!DOCTYPE html>
<html>
<head>
	<title>EXAMEN UNIDAD 1</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


	<style>
        body{
            padding: 0;
            margin: 0;
            background:#D1DDE1;
        }
		header{
			position:relative;
			margin:auto;
			text-align:center;
			padding:5px;	
            }
            
            nav{
                position:relative;
                margin:auto;
                width:100%;
                height:auto;
                background:#3762A0;
            }

            nav ul{
                position:relative;
                margin:auto;
                width:100%;
                text-align: center;
            }

            nav ul li{
                display:inline-block;
                width:12%;
                line-height: 50px;
                list-style: none;
            }

            nav ul li a{
                color:white;
                text-decoration: none;
            }

            section{
                position:relative;
                padding:20px;
            }
	</style>

</head>
<body>


	<header>
		<h1>EXAMEN UNIDAD 1</h1>
	</header>

	<?php  
		//incluir el menu de navegacion
		include "navegacion.php";
	?>

	<section>
		<!-- contenedor donde se muestran las opciones del sistema-->

		<?php  
			//mostrar opciones
			$mvc = new MvcController();
			$mvc->enlacesPaginasController();
		?>
	</section>

	
</body>
</html>