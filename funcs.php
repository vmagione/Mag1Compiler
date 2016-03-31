<?php

include("random.php");

function f1($x){
	$part1 = $x[0]*$x[0];
	$part2 = 2* ($x[1]*$x[1]);
	$part3 = 0.3* (cos(3*pi()*$x[0]));
	$part4 = 0.4* (cos(4*pi()*$x[1]));
	$f = $part1 + $part2 - $part3 - $part4 + 0.7;
	//return ($x[0]^2) + (2*($x[1]^2)) - (0.3*cos(3*pi()*$x[0])) - (0.4*cos(4*pi()*$x[1])) + 0.7;
	return $f;
}
function f2($x){
	$part1 = $x[0]*$x[0];
	$part2 = 2* ($x[1]*$x[1]);
	$part3 = 0.3* (cos(3*pi()*$x[0])) * (cos(4*pi()*$x[1]));
	$f = $part1 + $part2 - $part3 + 0.3;
	//return ($x[0]^2) + (2*($x[1]^2)) - (0.3*cos(3*pi()*$x[0]))*cos(4*pi()*$x[1]) + 0.3;
	return $f;
}
function f3($x){
	$part1 = $x[0]*$x[0];
	$part2 = 2* ($x[1]*$x[1]);
	$part3 = 0.3* (cos(3*pi()*$x[0]) + 4*pi()*$x[1]);
	$f = $part1 + $part2 - $part3  + 0.3;
	//return ($x[0]^2) + (2*($x[1]^2)) - (0.3*cos(3*pi()*$x[0] + 4*pi()*$x[1])) + 0.3;
	return $f;
}



//Retorna o numero de colisoes entre rainhas de um tabuleiro  linha/coluna, como numero de rainhas igual a coluna.
function numColisoes($gene, $linha, $coluna){
	
	$colisoes=0;
	//Colisoes horizontais 
	for($i=0;$i<$linha;$i++){
		for($j=0;$j<$linha; $j++){
			if($i!=$j && ($gene[$i] == $gene[$j])&& ($i!=$linha)){
				$colisoes++;
				//cout << "Colisao de: " << gene[i] << " com " << gene[j] << " \n";
			}
		}
	}
	
	//Calcula o numero de colisoes das digaonais
	
	//Calcula o numero de colisoes das diagonais a esquerda da rainha	
	for($i=0;$i<$linha;$i++){
		for($j=1;$j<=$i;$j++){
			if($i!=0 && $j!= $linha-1){
				if($gene[$i] == $gene[$i-$j]+$j){
					$colisoes++;
					//cout << "Colisao de: " << gene[i] << " com " << gene[i-j]<< " \n";
				}
				if($gene[$i] == $gene[$i-$j]-$j){
					$colisoes++;
					//cout << "Colisao de: " << gene[i] << " com " << gene[i-j]<< " \n";
				}
			}
		}
	}
	//Calcula o numero de colisoes das diagonais a direita da rainha	
	for($i=0;$i<$linha;$i++){
		for($j=1;$j<$linha-$i;$j++){
			if($i!=$linha){
				if($gene[$i] == $gene[$i+$j]+$j){
					$colisoes++;
					//cout << "Colisao de: " << gene[i] << " com " << gene[i+j]<< " \n";
				}
				if($gene[$i] == $gene[$i+$j]-$j){
					$colisoes++;
					//cout << "Colisao de: " << gene[i] << " com " << gene[i+j]<< " \n";
				}
			}
		}
	}
	
	return $colisoes;

}

function recombinacao($gene, $gene2, $linha){
	//gene = [io, i1, i2, i3]
	//gene2 = [jo, j1, j2, j3]

	//filho = [io, i1, jo, j1]
	//filho2 = [i2, i3, j2, j3]
	
	
	$mGene = array();
	$mGene2 = array();
	
	
	//salva metade esquerda dos genes em outros vectors
	
	for($i=0;$i<$linha/2;$i++){
		$mGene[$i] = $gene[$i];
		$mGene2[$i] = $gene2[$i];
	} 
	//salva metade direita dos genes em outros vectors
	
	for($i=$linha/2;$i<$linha;$i++){
		$mGene[$i] = $gene2[$i];
		$mGene2[$i] = $gene[$i];
	} 
	
	
	 
	//salva as metades salva nos vector para genes opostos
	
	for($i= 0;$i<$linha;$i++){
		$gene[$i] = $mGene2[$i];
		$gene2[$i] = $mGene[$i];
		
	}
	
	
	$reco = array( $gene2, $gene);
	
	return $reco;

}


function mutacao($gene, $linha){
	//$linhas = 2  $coluna = [-100,100]
	
	//gene = [io, i1, i2, i3] -> rand()
	//Escolhe uma linha aleatoria
	$r = rand(0,$linha-1);
	while($gene[$r] == 0){
		$r = rand(0,$linha-1);
		if($gene[0] == 0 && $gene[1] == 0){
			break;
		}
	}
	//Escolhe uma coluna aleatoria
	if($gene[$r] != 0){
		$r2 = rand(-100,100);
	}
		
	//Mudo o valor da linha aleatoria para o valor da coluna aleatoria 
	if($gene[$r] != 0){
		while($gene[$r] == $r2){
			$r2 = rand(-100,100);
		}
	}
	if($gene[$r] != 0){
		$gene[$r] = $r2;
	}
	
	//Retorna o gene mutante.
	return $gene;
}

function selecaoNatural($gene, $filhos, $linha,$pInicial){
	//$sele = $gene + $filhos
	$sele = array(array());
	for($i=0;$i<$pInicial;$i++){
		$sele[$i] = $gene[$i];
	}
	for($i=0;$i<$pInicial;$i++){
		$sele[$i+$pInicial] = $filhos[$i];
	}
	
	//numColisoes($gene[1], $linha, $coluna); // Metodo para calculo de colisões
	
	
	//Ordenação de vetor em ordem crescente -----------------------------------
	
	for($i=2*$pInicial-1; $i >= 1; $i--) {  
			
		for($j=0; $j < $i ; $j++) {
			  
			if(abs(f1($sele[$j], $linha)) > abs(f1($sele[$j+1], $linha))) {
					
				$aux = $sele[$j];
				$sele[$j] = $sele[$j+1];
				$sele[$j+1] = $aux;
			
			}
		}
	}
	//Seleciona apenas a primeira metade com os menores valores de colisões ---
	$sele2=array(array());
	$i=0;
	$cont=0;
	while($cont <$pInicial){
		if($cont != 0){
			//Verifica se existe outro gene identico a este gene.
			$ok=1;
			for($j=$i-1;$j>=0;$j--){
				if($sele[$i] == $sele[$j]){
					$ok=0;
				}
			}
			if($ok==1){
				$sele2[$cont] = $sele[$i];
				$cont++;
			}
		}else{
			$sele2[$cont] = $sele[$i];
			$cont++;
		}
		$i++;
		
		
	}
	
	
	//Retorna genes selecionados com menores valores de colisoes --------------
	return $sele2;
	
	
	
	return $sele;
}



?>
