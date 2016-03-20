<?php 
	include("funcs.php");
	
	class Token { //A
		public  $tag; //Int
		public function Token($t){ //Int
			$this->tag = $t; 
		}
		public function getTag(){
			return $this->tag;
		}
	}
	
	class Tag{  
		public $lexemas = array();
		public $alfabeto = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q',
		'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 
		'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',
		'=', '>', '<', '+', '-', '*', '/', '%', '?', ':', ';',',','(', ')','&',
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',' ', '\n','\t', '\r', '\0', '\x0B',' ',' ');
		public $letras = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q',
		'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 
		'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z');
		public $numeros = array(
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		public $delimitadores = array(
		' ', '=', '>', '<', '+', '-', '.','*', '/', '%', '?', ':', ';',',','(', ')','&','\t','\n','\r','\0','\x0B',' ',' ',' ');
		
		public 
		//Aritmeticos
		$plusT   = 256, $minusT    = 257, $multT      = 258, $divT   = 259, $divInT       = 260, $potenT = 261,	
		//Lógicos
		$higherT = 262, $heT       = 263, $lessT      = 264, $leT    = 265, $eqT          = 266, $difeT  = 267,
		$notT    = 268, $orT       = 269, $andT       = 270,
		//Condicionais
		$ifT     = 271, $elseT     = 272, $elif       = 273, $forT    = 274, $whileT      = 275, $breakT  = 276,
		$doT     = 277, $betwT     = 278,
		//Outros
		$classT  = 280, $newT      = 281, $tryT       = 282, $beginT  = 283, $endT        = 284,
		$indexT  = 285, $tempT     = 286, $delT       = 287,
		//Delimitadores
		$barraET = 288, $doublebET = 289, $plusET     = 290, $porcET  = 291, $minusET     = 292, $astET   = 293,
		$travET  = 294, $elevET    = 295, $doublmaET  = 296, $doublmeET= 297, $doublastET = 298,
		//Outros outros
		$raiseT = 299,  $assertT   = 300, $lambdaT    = 301, $returnT  = 302, $globalT  = 303, $exceptT  = 304,
		$continueT = 305, $execT   = 306, $importT    = 307, $passT    = 308, $yieldT   = 309, $finallyT = 310,
		$printT  = 311,   $isT     = 312, $eolT       = 313, $equalT   = 314, $doublmaT = 315, $doublmeT = 316,
		$modT    = 317,   $chapeuT = 318, $tiuT       = 319, $travT    = 320, $hashT    = 321, $doisPT   = 322,
		$virgT   = 323,   $dotT    = 324, $hileT      = 325, $opParT   = 326, $clParT   = 327, $opChaveT = 328,
		$clChaveT= 329,   $opColchT= 330, $clColchT   = 331, $eComT    = 332, $dotCollT = 333, $barraIT   = 334,
		$idT = 335;
		
		
	
		
		//retorna alfabeto
		public function getAlfabeto(){
			return $alfabeto;
		}
		public function Tag(){
		// Lexemas ----------------------------------
		// [python] = javascript
		
		//Aritmeticos
		$lexemas['+'] = '+';
		$lexemas['-'] = '-';
		$lexemas['*'] = '*';
		$lexemas['/'] = '/';
		$lexemas['//'] = '/';
		$lexemas['**'] = '^'; 
		
		//Logicos
		$lexemas['>'] = '>';
		$lexemas['>='] = '>=';
		$lexemas['<'] = '<';
		$lexemas['<='] = '<=';
		$lexemas['=='] = '==';
		$lexemas['!='] = '!=';
		$lexemas['not'] = '!';
		$lexemas['or'] = '||';
		$lexemas['and'] = '&&';
		
		//
		$lexemas['if'] = 'if';
		$lexemas['else'] = 'else';
		$lexemas['for'] = 'for';
		$lexemas['elif'] = 'else if';
		$lexemas['for'] = 'for';
		$lexemas['while'] = 'while';
		$lexemas['break'] = 'break';
		$lexemas['do'] = 'do';
		$lexemas['in'] = 'between';
		
		//
		$lexemas['class'] = 'class';
		$lexemas['try'] = 'try';
		$lexemas['\t'] = 'begin';
		$lexemas['\t'] = 'end';
		
		
		}
		// Funcoes Lexemas
		function getLexemas(){
			return $lexemas;
		}
		function getLexema($lexPy){
			return $lexemas[$lexPy];
		}
		function reserveLexema($lexPy,$lexJS){
			$lexemas[$lexPy] = $lexJS;
		}
		
		
	}
	//
	class Num extends Token{  //B
		public $value; //Int
		public function  Num($v){ //int v
			parent::Token($tempTag->NUM); //super();
			$this->value = $v; 
		}
	}
	// Gerencia lexemas para palavras reservadas, identificadores e tokes compostos.
	class Word extends Token{
		public $lexeme; //String
		public function Word($t, $s){  //int t, string s
			parent::Token($t); //super();
			$this->lexeme = $s;
		}
		public function toString(){
			return $this->lexeme;
		}

	}
	
	// Para numeros de ponto flutuante
	class RealC extends Token{
		public $value; //float
		public function RealC($v){ //float v
			$tempTag = new Tag();
			parent::Token($tempTag->NUM); //super();
			$this->value = $v;
		}
		public function toString(){
			return ' '. $value;
		}
	}
	
	class Lexer {
		public $line = 1;
		public $words = array(); //Hashtable do tipo words(word.lexeme, word)
		public $tokens = array();
		public $tokensLinhas = array();
		public $erros = array(); //array de erros
		
		public function getWords(){
			foreach($this->words as $word){
				echo '[Word,Tag]: '. $word->toString() . ', '.  $word->tag .'<br>';
			}
		}
		public function reserve(){ //salve um novo word (salve uma nova palavra reservada)
			$tempTag = new Tag();
			//Operadores
			$this->words['+'] = new Word($tempTag->plusT, '+');
			$this->words['-'] = new Word($tempTag->minusT, '-');
			$this->words['*'] = new Word($tempTag->multT, '*');
			$this->words['/'] = new Word($tempTag->divT, '/');
			$this->words['//'] = new Word($tempTag->divInT, '//');
			$this->words['\ '] = new Word($tempTag->barraIT,'\ ');
			$this->words['^'] = new Word($tempTag->potenT, '**');
			$this->words['='] = new Word($tempTag->equalT, '=');
			$this->words['>>'] = new Word($tempTag->doublmaT, '>>');
			$this->words['<<'] = new Word($tempTag->doublmeT, '<<');
			$this->words['%'] = new Word($tempTag->modT, '%');
			$this->words['^'] = new Word($tempTag->chapeuT, '^');
			$this->words['~'] = new Word($tempTag->tiuT, '~');
			$this->words['|'] = new Word($tempTag->travT, '|');
			$this->words['#'] = new Word($tempTag->hashT, '#');
			$this->words[';'] = new Word($tempTag->dotCollT, ';');
			$this->words[':'] = new Word($tempTag->doisPT, ':');
			$this->words[','] = new Word($tempTag->virgT, ',');
			$this->words['.'] = new Word($tempTag->dotT, '.');
			//Logicos
			$this->words['>'] = new Word($tempTag->higherT, '>');
			$this->words['>='] = new Word($tempTag->heT, '>=');
			$this->words['<'] = new Word($tempTag->lessT, '<');
			$this->words['<='] = new Word($tempTag->leT, '<=');
			$this->words['<>'] = new Word($tempTag->hileT, '<>');
			$this->words['=='] = new Word($tempTag->eqT, '==');
			$this->words['!='] = new Word($tempTag->difeT, '!=');
			$this->words['not'] = new Word($tempTag->notT, '!');
			$this->words['or'] = new Word($tempTag->orT, '||');
			$this->words['and'] = new Word($tempTag->andT, '&&');
			$this->words['&'] = new Word($tempTag->eComT, '&');
			//Condicionais
			$this->words['if'] = new Word($tempTag->ifT, 'if');
			$this->words['else'] = new Word($tempTag->elseT, 'else');
			$this->words['elif'] = new Word($tempTag->elif, 'else if');
			$this->words['for'] = new Word($tempTag->forT, 'for');
			$this->words['while'] = new Word($tempTag->whileT, 'while');
			$this->words['break'] = new Word($tempTag->breakT, 'break');
			$this->words['do'] = new Word($tempTag->doT, 'do');
			$this->words['in'] = new Word($tempTag->betwT, 'in');
			//Delimitadores
			$this->words['/='] = new Word($tempTag->barraET, '/=');
			$this->words['//='] = new Word($tempTag->doublebET, '//=');
			$this->words['+='] = new Word($tempTag->plusET, '+=');
			$this->words['%='] = new Word($tempTag->porcET, '%=');
			$this->words['-='] = new Word($tempTag->minusET, '-=');
			$this->words['*='] = new Word($tempTag->astET, '*=');
			$this->words['|='] = new Word($tempTag->travET, '|=');
			$this->words['^='] = new Word($tempTag->elevET, '^=');
			$this->words['>>='] = new Word($tempTag->doublmaET, '>>=');
			$this->words['<<='] = new Word($tempTag->doublmeET, '<<=');
			$this->words['**='] = new Word($tempTag->doublastET, '**=');
			
			$this->words['('] = new Word($tempTag->opParT, '(');
			$this->words[')'] = new Word($tempTag->clParT, ')');
			$this->words['['] = new Word($tempTag->opChaveT, '[');
			$this->words[']'] = new Word($tempTag->clChaveT, ']');
			$this->words['{'] = new Word($tempTag->opColchT, '{');
			$this->words['}'] = new Word($tempTag->clColchT, '}');
			
			//Palavras
			$this->words['class'] = new Word($tempTag->classT, 'class');
			$this->words['new'] = new Word($tempTag->newT, 'new');
			$this->words['try'] = new Word($tempTag->tryT, 'try');
			$this->words['indent'] = new Word($tempTag->beginT, 'begin');
			$this->words['dedent'] = new Word($tempTag->endT, 'end');
			$this->words['is'] = new Word($tempTag->isT, 'is');
			$this->words['raise'] = new Word($tempTag->raiseT, 'raise');
			$this->words['assert'] = new Word($tempTag->assertT, 'assert');
			$this->words['lambda'] = new Word($tempTag->lambdaT, 'lambda');
			$this->words['return'] = new Word($tempTag->returnT, 'return');
			$this->words['global'] = new Word($tempTag->globalT, 'global');
			$this->words['except'] = new Word($tempTag->exceptT, 'except');
			$this->words['continue'] = new Word($tempTag->continueT, 'continue');
			$this->words['exec'] = new Word($tempTag->execT, 'exec');
			$this->words['import'] = new Word($tempTag->importT, 'import');
			$this->words['pass'] = new Word($tempTag->passT, 'pass');
			$this->words['yield'] = new Word($tempTag->endT, 'yield');
			$this->words['finally'] = new Word($tempTag->finallyT, 'finally');
			$this->words['print'] = new Word($tempTag->printT, 'print');
			$this->words['eol'] = new Word($tempTag->eolT, 'eol');
			
			
			
		}
		
		public function ehLetra($c){
			$tag = new Tag();
			$ehLetra = 0;
			foreach($tag->letras as $letra){
				if($c==$letra){
					$ehLetra=1;
				}
			}
			return $ehLetra;
		}
		public function ehNum($c){
			$tag = new Tag();
			$ehNum = 0;
			foreach($tag->numeros as $num){
				if($c==$num){
					$ehNum=1;
				}
			}
			return $ehNum;
		}
		//Construtor Lexer
		public function Lexer($codigo){
			$tempTag = new Tag();
			$this->reserve();
			//Inicializando tabela de palavras reservadas
			

			//remove comentarios
			$cod = verificaComentario($codigo);
			//echo '<br><br><label>Vetor: </label><br>';
			//Salvar tokens
			$contLinhas =0;
			
			foreach($cod as $c){ 
				//cod = codigo, c = linha
				//$c = ltrim($c, ' ');
				$c = ltrim($c, "\x00..\x1F");
				
				$stringC = str_split($c);
				
				
					
				
				//ccS = string de linha com todos caracteres e sem espaços
				$ccS = $stringC;
				//Percorre linha para salvar cada token
				$numC=0; //Numero de caracteres de cada linha
				foreach($ccS as $cc){
					$numC++;
				}
				$char=0;
				while($char<$numC){	
					
					//$ccS[$char] = ltrim($ccS[$char], "\x00..\x1F"); //String limpa de espaços
					//echo '['.$cc . ']  ';
					
					//Verifica se caractere pertence ao alfabeto
					$caracterExistente = 0;
					$tag = new Tag();
					foreach($tag->alfabeto as $alf){
						if($alf == $ccS[$char]){
							$caracterExistente = 1;
						}
						if('\n' == ord($ccS[$char]) || '0x0A' == ord($ccS[$char])){
							$caracterExistente = 1;
						}
					}
					//Se caractere existe
					if($caracterExistente ==1){
						//Começo da parte de salvar token (Caso caractere existente)
						//---------------------------------------------------------------------------
							
							
							if($char<$numC-1){
							//Reconhecimento de tokens compostos de 2 caracteres
								switch($ccS[$char]){
									case '=':
										if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['==']);
											$char++;
										}else{
											$this->tokens[] = ($this->words['=']);
										}
										break;	
									case '<':
										if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['<=']);
											$char++;
										}else if($ccS[$char+1] == '<'){
											if($char<$numC-2){
												if($ccS[$char+2] == '='){
													$this->tokens[] = ($this->words['<<=']);
													$char = $char+2;
												}else{
													$this->tokens[] = ($this->words['<<']);
													$char++;
												}
											}else{
												$this->tokens[] = ($this->words['<<']);
												$char++;	
											}
											
										}else if($ccS[$char+1] == '>'){
											$this->tokens[] = ($this->words['<>']);
											$char++;
										}else{
											$this->tokens[] = ($this->words['<']);
											
										}
										break;
									case '>':
										if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['>=']);
											$char++;
										}else if($ccS[$char+1] == '>'){
											if($char<$numC-2){
												if($ccS[$char+2] == '='){
													$this->tokens[] = ($this->words['>>=']);
													$char = $char+2;
												}else{
													$this->tokens[] = ($this->words['>>']);
													$char++;
												}
											}else{
												$this->tokens[] = ($this->words['>>']);
												$char++;	
											}
											
										}else{
											$this->tokens[] = ($this->words['>']);
										}
										break;
									case '!':
										if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['!=']);
											$char++;
										}
										break;	
									
									case '&':
										$this->tokens[] = ($this->words['&']);
										break;	
									case '^':
										if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['^=']);
											$char++;
										}else{
											$this->tokens[] = ($this->words['^']);
										}
										break;	
										
									case '%':
										if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['%=']);
											$char++;
										}else{
											$this->tokens[] = ($this->words['%']);
										}
										break;	
									
									case '|':
										if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['|=']);
											$char++;
										}else{
											$this->tokens[] = ($this->words['|']);
										}
										break;	

									case '~':
										if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['~=']);
											$char++;
										}else{
											$this->tokens[] = ($this->words['~']);
										}
										break;	

										
									case '*':
										if($ccS[$char+1] == '*'){
											if($char<$numC-2){
												if($ccS[$char+2] == '='){
													$this->tokens[] = ($this->words['**=']);
													$char = $char+2;
												}else{
													$this->tokens[] = ($this->words['**']);
													$char++;
												}
											}else{
												$this->tokens[] = ($this->words['**']);
												$char++;	
											}
										}else if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['*=']);
											$char++;
										}else{
											$this->tokens[] = ($this->words['*']);
										}
										break;		
									case '/':
										if($ccS[$char+1] == '/'){
											if($char<$numC-2){
												if($ccS[$char+2] == '='){
													$this->tokens[] = ($this->words['//=']);
													$char = $char+2;
												}else{
													$this->tokens[] = ($this->words['//']);
													$char++;
												}
											}else{
												$this->tokens[] = ($this->words['//']);
												$char++;
											}
										}else if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['/=']);
											$char++;
										}else{
											$this->tokens[] = ($this->words['/']);
										}
										break;	
									
									case '\ ':
										$this->tokens[] = ($this->words['\ ']);
										break;	
									
									case '+':
										if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['+=']);
											$char++;
										}else{
											$this->tokens[] = ($this->words['+']);
										}
										break;	
									
									case '-':
										if($ccS[$char+1] == '='){
											$this->tokens[] = ($this->words['-=']);
											$char++;
										}else{
											$this->tokens[] = ($this->words['-']);
										}
										break;	
									case '#':
										$this->tokens[] = ($this->words['#']);
										break;	
									case ':':
										$this->tokens[] = ($this->words[':']);
										break;	
									case ';':
										$this->tokens[] = ($this->words[';']);
										break;	
											
									case '(':
										$this->tokens[] = ($this->words['(']);
										break;	
										
									case ')':
										$this->tokens[] = ($this->words[')']);
										break;	
											
									case '[':
										$this->tokens[] = ($this->words['[']);
										break;	
										
									case ']':
										$this->tokens[] = ($this->words[']']);
										break;	
											
									case '{':
										$this->tokens[] = ($this->words['{']);
										break;	
										
									case '}':
										$this->tokens[] = ($this->words['}']);
										break;	
									case ',':
										$this->tokens[] = ($this->words[',']);
										break;	
									
									
									case '"':
										if(isset($char+1)){
											$auxString =$char+1;
										}
										
										$contString=0;
										$string ='';
										while($auxString<$numC){
											if($ccS[$auxString] == '"' ){
												
												$string = $string.$ccS[$auxString];
												$contString++;
												break;
											}else{
												
												$string = $string.$ccS[$auxString];
												$contString++;
												
											}
											
											$auxString++;
										}
										//$string = '"'.$string;
										$word = new Word($tag->idT,$string);
										$this->tokens[] = ($word);
										$char = $char + $contString;
										break;	
										
									
									
									
									//-------------------------------
									default:
										//$this->tokens[] = $ccS[$char];
										
									
								}
								//Reconhece strings
								
								
								
								
								//Reconhecimento de tokens palavras
								$ehLetra= $this->ehLetra($ccS[$char]);
								/*
								$antes ='';
								if(isset($ccS[$char-1])){
									$antes = $ccS[$char-1];
								}
								&& ($antes != '"')
								*/
								if($ehLetra ==1){
									$pulos =0;
									$auxChar=$char;
									$auxDelimitado=0; 
									$palavra=''; //palavra que salva os caracteres do token
									while($auxChar<$numC && $auxDelimitado ==0){
										foreach($tag->delimitadores as $deli){
											//Se for algum delimitador
											if($deli == $ccS[$auxChar]){
												$auxDelimitado=1; 
											}
										}
										//Se caracter não for delimitador, concatena caractere na palavra
										if($auxDelimitado!= 1){
											//A cada novo caractere na palavra, aumenta o numero de pulos para proximo caractere
											$pulos++;
											$palavra = $palavra.$ccS[$auxChar];
										}
										
										$auxChar++;
									}
									//Verifica se palavra ja existe como alguma palavra reservada
									$ehReservada =0;
									foreach($this->words as $w){
										if($w->toString() == $palavra){
											$ehReservada = 1;
											$this->tokens[] = ($w);
										}
									}
									//Se não for uma palavra reservada, salva token como id
									if($ehReservada ==0){
										$word = new Word($tag->idT,$palavra);
										$this->tokens[] = ($word);
									}
									/*
									$word = new Word($tag->idT,$palavra);
									$this->tokens[] = ($word);
									*/
									$char = $char + $pulos-1; 
								}
								//Reconhecimento se token é numero
								$ehNum= $this->ehNum($ccS[$char]);
								if($char>0){
									$anterior = $this->ehLetra($ccS[$char-1]);
									$anterior = $anterior + $this->ehNum($ccS[$char-1]);
									
								}
								if($ehNum ==1 && $anterior == 0){
									$pulos =0;
									$auxChar=$char;
									$auxDelimitado=0;
									$ptFlutuante = 0; //verificador se é numero com ponto flutuante									
									$palavra=''; //palavra que salva os caracteres do token
									while($auxChar<$numC && $auxDelimitado ==0){
										$proxNum =0;
										foreach($tag->delimitadores as $deli){
											//Se for algum delimitador
											if($deli == $ccS[$auxChar]){
												$auxDelimitado=1;
												if($ccS[$auxChar] == '.'){
													$auxDelimitado=0;
													$ptFlutuante = 1;
													$palavra = $palavra.$ccS[$auxChar];
													
												}
											}
										}
										//Se caracter não for delimitador, concatena caractere na palavra
										$ehNum = $this->ehNum($ccS[$auxChar]);
										if($auxDelimitado!= 1 && $ehNum == 1){
											
											//A cada novo caractere na palavra, aumenta o numero de pulos para proximo caractere
											$pulos++;
											$palavra = $palavra.$ccS[$auxChar];
										}
										
										$auxChar++;
									}
									//Verifica se palavra ja existe como alguma palavra reservada
									$ehReservada =0;
									foreach($this->words as $w){
										if($w->toString() == $palavra){
											$ehReservada = 1;
											$this->tokens[] = ($w);
										}
									}
									//Se não for uma palavra reservada, salva token como id
									if($ehReservada ==0){
										
										$word = new Word($tag->idT,$palavra);
										$this->tokens[] = ($word);
									}
									/*
									$word = new Word($tag->idT,$palavra);
									$this->tokens[] = ($word);
									*/
									$char = $char + $pulos-1; 
								}
								
								$char++;
							 //Ultimo caracter. Se for uma palavra sozinha, salvar como token		
							}else {
								//Se ultimo caracter da linha for ID
								$ehLetra= $this->ehLetra($ccS[$char]);
								if($ehLetra==1){
									$word = new Word($tag->idT,$ccS[$char]);
									$this->tokens[] = ($word);
								}
								//Se ultimo caracter da linha for palavra reservada
								$ehReservada =0;
								foreach($this->words as $w){
									if($w->toString() == $ccS[$char]){
										$ehReservada = 1;
										$this->tokens[] = ($w);
									}
								}
								//Se ultimo caracter da linha for NUM
								$ehNum= $this->ehNum($ccS[$char]);
								if($ehLetra==1){
									$word = new Num($ccS[$char]);
									$this->tokens[] = ($word);
								}
								//Ultimo caractere
								//$this->tokens[] = $ccS[$char];
								$char++;
							}
						
					//Se caractere não existe	
					}else{
						if($ccS[$char] != '' && ($ccS[$char]) != '\n' && ($ccS[$char]) != ' '&& ($ccS[$char]) != ' ' && ($ccS[$char]) != null){
							//echo 'Warning: Caractere inexistente. Linha '. $contLinhas . ' , posicao '.$char.' => ['.$ccS[$char].']<br>';
							$erros[] =  'Warning: Caractere inexistente na linha '. $contLinhas . '=> ['.$ccS[$char].']';
							
						}
						$char++;

					}
					
				}
					
				echo '<br>';
				$contLinhas++;	
				$this->tokens[] = ($this->words['eol']);
			}
			
			
		}
		//Retorna lista de tokens, e exibe tokens quando pedido
		public function getTokens(){
			$contToken=0;
			//Variavel auxiliar para imprimir de 10 em 10
			$de10 =1;
			foreach($this->tokens as $c => $t){
					//Exibir tag e lexeme
					//echo '{'.$t->tag.','.$t->toString().'} ,    ';
					//Exibir apenas lexeme
					echo $t->toString().' ,  ';
					//Quebrar linha a cada eol (a cada quebra de linha do codigo)
					if($t->toString() == 'eol'){
						echo '<br>';
					}
					
				$de10++;	
				}
			return $this->tokens;
		}
		
	}
	
?>
