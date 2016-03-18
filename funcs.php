<?php
	
	//Função que pega um código e retorna sem comentarios nem espaços nem linhas em branco
	function verificaComentario($codigo){
		$contCS=0; 
		$comentario=0;
		$noLines = array();
		//Remove espaços, tabulaçoes e entre outros da string
		foreach($codigo as $cS){
			//trim the ASCII control characters at the beginning of $binary 
			//(from 0 to 31 inclusive)
			$clean = $cS;
			$clean = ltrim($cS, "\x00..\x1F"); //String limpa de espaços
			$cleanAux = ''; //String Auxiliar
			$cleanArray = str_split($clean); //Array da String Limpa
			$tamCA=0;
			
			//Busca tamanho de array (numero de caracteres da string)
			foreach($cleanArray as $cA){
												
				$tamCA++; //tamanho
	
			}
			
			//Percorre array em busca de comentarios, salva codigo não comentado em array auxiliar
			$i=0;
			while($i<$tamCA){
				if($i<$tamCA-2){
					$conq = $cleanArray[$i].$cleanArray[$i+1].$cleanArray[$i+2];
				}
				if($conq =='"""' && $comentario ==1){
					$comentario =0;
					//echo 'Encontrou um comentario';
					break;
				}
				if($cleanArray[$i]=='#'){
					//echo 'Encontrou um comentario';
					break;
				}
				if($conq =='"""'){
					$comentario =1;
					//echo 'Encontrou um comentario';
					//Caso o final do comentario seja na mesma linha
					$j = $i;
					while($j<$tamCA){
						if($j<$tamCA-2){
							$conq = $cleanArray[$j].$cleanArray[$j+1].$cleanArray[$j+2];
						}
						if($conq =='"""'){
							$comentario =0;
							//echo 'Encontrou um comentario';
							break;
						}
						$j++;
					}
					break;
				}
				if($comentario==0){
					$cleanAux = $cleanAux. $cleanArray[$i];
				}
				$i++;
			}
			$contCS++; //Cont de linhas	do codigo								
			$noLines[] = $cleanAux;
		}
		$auxNoLines = array();
		//Remove as linhas que não possue nada
		foreach($noLines as $cS){
			//$cs =ltrim($cS, "\n");
			if($cS != ''){
				$auxNoLines[] = $cS;
			}
		}
		$cont2=0;
		//Exibe o codigo resultante
		foreach($auxNoLines as $cS){
			echo '<code>'. $cont2.': '. $cS .'</code><br>';
			$cont2++;
		}
		return $auxNoLines;
	}



?>
