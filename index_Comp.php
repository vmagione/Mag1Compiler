<?php
	
	
	include("classes.php");
	
	/*
	if ($_FILES["file"]["error"] > 0) {
		echo "Erro: " . $_FILES["file"]["error"] . "<br />";
	}	else {
		echo "Arquivo enviado: " . $_FILES["file"]["name"] . "<br />";
		echo "Tipo: " . $_FILES["file"]["type"]."<br />";
		echo "Tamanho: ". ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		echo "Guardado em: " . $_FILES["file"]["tmp_name"];
	}
	*/
	$uploaddir = 'uploads/';
	/*
	$uploadfile = $uploaddir . basename($_FILES['file']['name']);
	
	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
		echo "Arquivo válido e enviado com sucesso.\n";
		echo "<script type='javascript'> alert('Arquivo válido e enviado com sucesso.\n');";
	} else {
		echo "Possível ataque de upload de arquivo!\n";
		echo "<script type='javascript'> alert('Possível ataque de upload de arquivo!\n');";
	}
	*/
	
	
	/*
	str_split — Converte uma string para um array
	array str_split ( string $string [, int $split_length ] )
	
	*/
	$codeS = array();
	//$codeS = str_split($_POST['codeS']);
	
	
		
	
?>(


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mag1's PythonToJavaScript</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Mag1's Python to JavaScript Compiler</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="index.php></a>
                    </li>
                   <li class="page-scroll">
                        <a href="#formI">Specifications</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <!-- <img class="img-responsive" src="img/movie.png" alt=""> -->
                    <div class="intro-text">
                        <span class="name">Mag1's Compiler</span>
                        <hr class="star-light">
                        <span class="skills">Python to JavaScript </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="formI">
		<div class="container" >
			 <div class="row" >
                <div class="col-lg-12  text-center">
					<form action="index.php" method="post" enctype="multipart/form-data">
						<fieldset>
							<div  class="row control-group">
								<div class="col-lg-12 text-center">
									<h3>Lexical Analyzer: </h3>
									<hr class="star-primary">
								</div>
								<div class="row control-group col-lg-4"  align="left">
									
									<label for="nome">Upload log:</label>
									<br>
									<?php 
									
										if ((($_FILES["file"]["type"] == "image/gif")
											|| ($_FILES["file"]["type"] == "image/jpeg")
											|| ($_FILES["file"]["type"] == "text/plain"))
											&& ($_FILES["file"]["size"] < 20000)) {
									  
											  if ($_FILES["file"]["error"] > 0) {
												  echo "Código de retorno: ".
													  $_FILES["file"]["error"].
													  "<br />";
											  }
											  else {
												  
												  echo "Arquivo: "
													  .$_FILES["file"]["name"]."<br />";
												  echo "Tipo: ".
													  $_FILES["file"]["type"]."<br />";
												  echo "Tamanho: ".
													  ($_FILES["file"]["size"] / 1024).
													  " Kb<br />";
												  echo "Arquivo temporário: ".
													  $_FILES["file"]["tmp_name"]."<br />";
												 
												  if (file_exists("uploads/" .$_FILES["file"]["name"])){
													  echo $_FILES["file"]["name"] ." já existe.";
												  }
												  else {
													
														echo "\n\nGuardado em: uploads/".
														$_FILES["file"]["name"];
												  }
												    move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/".$_FILES["file"]["name"]);
													  $code = $uploaddir . basename($_FILES['file']['name']);
													 // Lê um arquivo em um array.  Nesse exemplo nós obteremos o código fonte de
													 // uma URL via HTTP
													 $codigo = file ($uploaddir . basename($_FILES['file']['name']));
													
													// Percorre o array, mostrando o fonte HTML com numeração de linhas.
													/*
													foreach ($codigo as $line_num => $line) {
														echo "{$line_num}</b> : " . htmlspecialchars($line) . "<br>\n";
													
													}
													*/
											  }
									  }else {
										  echo "Invalid file";
									  }
									//Codigo sem a parte de comentario
									$linhas = file($_FILES["file"]["name"]);
									

									?>
								</div>
								<div class="row control-group col-lg-4"  align="left">
									<label for="nome">File:</label>
									<br>
									
									<?php 
									//String do código é $codigo, onde cada foreach é uma linha
										//$codigo é um array
										//$noLines = verificaComentario($codigo);
										//$tempTag = new Tag();
										
										$lexer = new lexer($codigo);
										$tokens = array();
										
										
									?>
									
									
									
								</div>	
								<div class="row control-group col-lg-4"  align="left">
									<label for="nome">Tokens:</label>
									<br>
									
									<?php 
									//String do código é $codigo, onde cada foreach é uma linha
										//$codigo é um array
										//$noLines = verificaComentario($codigo);
										//$tempTag = new Tag();
										
										$lexer->getTokens();
										
										
										
									?>
									
									
									
								</div>	
								
								
								<br><br>
								<div  class="form-group col-xs-12"align="center">
									<button class="botao" type="submit" name="submit">Back</button>
								</div>
							</div>
						</fieldset>
					</form>  	
				</div>
			</div>					
		</div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Mag1's Python to JavaScript Compiler is a free open source website created by V. Magione. Its used to compile a Python code to JavaScript.</p>
                </div>
                <div class="col-lg-4">
                    <p>This website was developed for Compilers discipline of computer engineering course.</p>
                </div>
                <!--
				<div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Download Theme
                    </a>
                </div>
				-->
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>São Paulo 170, Alvorada<br>Timóteo, MG Brasil </p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Mag1's Python to JavaScript Compiler</h3>
                        <p>Mag1's Python to JavaScript Compiler is a free to use, open source website used to compile Python code to JavaScript created by <a href="#">VMagione</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; VMagione 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

  
	
	
	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
