<?php 
	
	class Token { //A
		public  $tag; //Int
		public function Token($t){ //Int
			$tag = $t; 
		}
	}
	
	class Tag{  
		const NUM = 256;
		const  ID = 257;
		const TRUE = 258;
		const FALSE = 259;
		
		public static function getNUM(){
			return self::NUM;
		}
		public static function getID(){
			return self::ID;
		} 
		public static function getTRUE(){
			return self::TRUE;
		} 
		public static function getFALSE(){
			return self::FALSE;
		} 
	}
	
	class Num extends Token{  //B
		public $value; //Int
		public function  Num($v){ //int v
			parent::Token(NUM); //super();
			$value = $v; 
		}
	}
	
	class Word extends Token{
		public $lexeme; //String
		public function Word($t, $s){  //int t, string s
			parent::Token($t); //super();
			$lexeme = $s;
		}
	}
	
	class Lexer {
		public $line = 1;
		public $peek = ' '; // char para espaço
		public $words = array(); //Hashtable do tipo words(word.lexeme, word)
		public function reserve(Word $word){ //salve um novo word (salve uma nova palavra reservada)
			$words[$word->lexeme] = $word;
		}
		public function Lexer($codigo){
			$tempTag = new Tag();
			//Inicializando tabela de palavras reservadas
			$this->reserve(new Word($tempTag->getTRUE(), 'true'));
			$this->reserve(new Word($tempTag->getFALSE(),'false'));
		}
		
		
	}
	
?>