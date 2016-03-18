<?php 
	include("funcs.php");
	
	class Token { //A
		public  $tag; //Int
		public function Token($t){ //Int
			$this->tag = $t; 
		}
	}
	
	class Tag{  
		public $lexemas = array();
		public $alfabeto = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q',
		'r', 's', 't', 'u', 'v', 'x', 'y', 'z',
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 
		'R', 'S', 'T', 'u', 'V', 'X', 'Y','Z',
		'=', '>', '<', '+', '-', '*', '/', '%', '?', ':', ';','(', ')',
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ' ','\n');
		
		
		public 
		//Aritmeticos
		$plusT   = 256, $minusT = 257, $multT = 258, $divT   = 259, $divInT  = 260, $potenT = 261,	
		//Lógicos
		$higherT = 262, $heT    = 263, $lessT = 264, $leT    = 265, $eqT     = 266, $difeT  = 267,
		$notT    = 268, $orT    = 269, $andT  = 270,
		//Condicionais
		$ifT     = 271, $elseT   = 272, $elif  = 273, $forT    = 274, $whileT   = 275, $breakT  = 276,
		$doT     = 277, $inT     = 278,
		//Outros
		$classT  = 280, $newT    = 281, $tryT  = 282, $beginT  = 283, $endT     = 284,
		$indexT = 285,  $$minusT = 286, $tempT = 287;
			
		
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
		public $peek = ' '; // char para espaço
		public $words = array(); //Hashtable do tipo words(word.lexeme, word)
		public $tokens = array();
		public $erros = array(); //array de erros
		
		public function getWords(){
			foreach($this->words as $word){
				echo '[Word,Tag]: '. $word->toString() . ', '.  $word->tag .'<br>';
			}
		}
		/*
		public function reserve(Word $word){ //salve um novo word (salve uma nova palavra reservada)
			$words[$word->lexeme] = $word;
		}
		*/
		public function reserve(){ //salve um novo word (salve uma nova palavra reservada)
			$tempTag = new Tag();
			//Aritmeticos
			$this->words['+'] = new Word($tempTag->plusT, '+');
			$this->words['-'] = new Word($tempTag->minusT, '-');
			$this->words['*'] = new Word($tempTag->multT, '*');
			$this->words['/'] = new Word($tempTag->divT, '/');
			$this->words['//'] = new Word($tempTag->divInT, '//');
			$this->words['^'] = new Word($tempTag->potenT, '**');
			//Logicos
			$this->words['>'] = new Word($tempTag->higherT, '>');
			$this->words['>='] = new Word($tempTag->heT, '>=');
			$this->words['<'] = new Word($tempTag->lessT, '<');
			$this->words['<='] = new Word($tempTag->leT, '<=');
			$this->words['=='] = new Word($tempTag->eqT, '==');
			$this->words['!='] = new Word($tempTag->difeT, '!=');
			$this->words['not'] = new Word($tempTag->notT, '!');
			$this->words['or'] = new Word($tempTag->orT, '||');
			$this->words['and'] = new Word($tempTag->andT, '&&');
			//Condicionais
			$this->words['if'] = new Word($tempTag->ifT, 'if');
			$this->words['else'] = new Word($tempTag->elseT, 'else');
			$this->words['elif'] = new Word($tempTag->elseifT, 'else if');
			$this->words['for'] = new Word($tempTag->forT, 'for');
			$this->words['while'] = new Word($tempTag->whileT, 'while');
			$this->words['break'] = new Word($tempTag->breakT, 'break');
			$this->words['do'] = new Word($tempTag->doT, 'do');
			$this->words['in'] = new Word($tempTag->betwT, 'in');
			//outros
			$this->words['class'] = new Word($tempTag->classT, 'class');
			$this->words['new'] = new Word($tempTag->newT, 'new');
			$this->words['try'] = new Word($tempTag->tryT, 'try');
			$this->words['\t'] = new Word($tempTag->beginT, 'begin');
			$this->words['/t'] = new Word($tempTag->endT, 'end');
			
			
		}
	
		
		public function Lexer($codigo){
			$tempTag = new Tag();
			$this->reserve();
			//Inicializando tabela de palavras reservadas
			

			//remove espaços em branco e linhas vazias
			$cod = verificaComentario($codigo);
			echo '<br><br><label>Vetor: </label><br>';
			//Salvar tokens
			$contLinhas =0;
			//cod = codigo
			//c = linha
			foreach($cod as $c){
				
				$ccS = str_split($c);
				foreach($ccS as $cc){
					
					$cc = ltrim($cc, "\x00..\x1F"); //String limpa de espaços
					//echo '['.$cc . ']  ';
					
					//Verifica se caractere pertence ao alfabeto
					$caracterExistente = 0;
					$tag = new Tag();
					foreach($tag->alfabeto as $alf){
						if($alf == $cc){
							$caracterExistente = 1;
						}
					}
						
					if($caracterExistente ==1){
						$this->tokens[] = $cc;
					}else{
						if($cc != ''){
							echo 'Warning: Caractere inexistente na linha '. $contLinhas . '=> ['.$cc.']<br>';
							$erros[] =  'Warning: Caractere inexistente na linha '. $contLinhas . '=> ['.$cc.']';
							
						}

					}
					
				}
					
				echo '<br>';
				$contLinhas++;	
			}
			
		}
		public function getTokens(){
			/*foreach($this->tokens as $t){
				echo $t . ' ';
			}
			*/
			return $this->tokens;
		}
		
	}
	
?>
