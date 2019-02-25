<?php
/**
 * PHP Class To Generate Super Mario Text Phrases
 * 
 * TYPE: PARAGRAPH or SENTENCE
 * MODE: SHORT, MEDIUM or LONG (MODE is optional to deffine whether text would be shortest or longest, default value is set as MEDIUM)
 * LENGTH: LENGTH OF THE PARAGRAPH or SENTENSE YOU WANT
 * 
 * @author Kelvin Biffi (https://github.com/kelvinbiffi)
 * 
 */

class MarioIpsum {
  
  // PROPERTIES
  
  /** 
   * @var $string $type
   */
  private $type = 'PARAGRAPH';
  
  /** 
   * @var $string $mode
   */
  private $mode = 'MEDIUM';
  
  /** 
   * @var $int $length
   */
  private $length = 2;
  
  /** 
   * @var $string types
   */
  private $types = [
    'PARAGRAPH' => '0',
    'SENTENCE' => '1'
  ];
  
  /**
   * @var $Array $modes
   */
  private $modes = [
    'SHORT' => 1.0,
    'MEDIUM' => 1.5,
    'LONG' => 2
  ];
  
  /**
   * @var $Array $words
   */
  private $words;
  
  // FUNCTIONS
  
  /**
   * Construct function
   */
  public function __construct() {
    $this->words = array(
      "Mario","is","Missing!","Yoshi","Super","Sunshine","Advance","Hotel","vs.","Donkey","Kong",
      "New","Bros.","3D","World","Kart","Kart","Double","Dash!!","Wii","Party","Luigi's","Mansion",
      "Fortune","Street","Golf","Toadstool","Tour","Strikers","Charged","&","Sonic","at","the","Olympic",
      "Games","Saturday","Supercade","The","Show!","Mario","Manga","Adventures","Sports","Mix","Huh!?",
      "Why?","Ugh,","what","irresponsible","guy...","C'est","toi","Wario?!?","you've","ever","seen?","Go,",
      "little","man,","go!","Yeah,","does!","Oh.","Uh-oh,","now","he's","red!","Oh...","It's","cycle!","Oh,",
      "swingcycle!","like","that!","yeah!","'Keep","off","grass'...","seriously,","heeheeheeheehee!","Makes",
      "think,","doesn't","it?","Mm-hmm!","That's,","it...","it-it-it's","cow!","Nononono,","that's","llama!",
      "hello,","Is","your","mama","llama?","I,","bet","she","is!","Yeah!","Can","say,","'chorizo'?","Chorizo!",
      "I'm","glad","could!","Ho-ho!","yeah...","hot","tamale!",".......why?","Look","He's","CRAB!","looks","grumpy!",
      "mean","'crabby',","right?","Now,","Wait,","wait.","Did","'Banano'?","don't","know.","Mama mia...","Look,",
      "a-a-a-a","Bambi!","Hello,","Huh,","so","cute!","Cute!","cow...","No,","albino","alligator.",
      "Mmm-hmm!","hibiscus!","'biscus!","Oh!","hi!","Hi!","bathtub?","soup.","Mmm!","soup!","Hello!","not",
      "bathtub.","no.","soupy.","soupy!","Mmmmm...","And","that,","my","bro,","udon","was","delicious","udon.",
      "Way,","go,","bro!"
    );
  }
  
  /**
   * Validate whether all plugin parameters
   * 
   * @param string $type Opitional
   * @param integer $length Opitional
   * @param string $mode Opitional
   * 
   * @return Boolean
   */
  private function validateDataQuery($type, $length, $mode = 'MEDIUM') {
    
    try {
        if (!isset($type) && !isset($length)) {
            throw new Exception('TYPE and LENGTH must be inform to generate the text.');
        }
        
        if ($type != 'SENTENCE' && $type != 'PARAGRAPH') {
            throw new Exception('First parameter TYPE must be PARAGRAPH or SENTENCE.');
        }
        
        if (!is_int($length)) {
            throw new Exception('Second parameter LENGTH must be a integer number.');
        } else if ($length == 0) {
            throw new Exception('Second parameter LENGTH must be a integer number over then 0.');
        }
        
        if (isset($mode)) {
            if ($mode != 'SHORT' && $mode != 'MEDIUM' && $mode != 'LONG') {
                throw new Exception('third parameter MODE must be SHORT or MEDIUM or LONG.');
            }
            $this->mode = $mode;
        } else {
            $this->mode = 'MEDIUM';
        }
        
        $this->type = $type;
        $this->length = $length;
        
        return true;
    } catch (Exception $e) {
        echo 'Error: ',  $e->getMessage(), "\n";
        return false;
    }
    
  }
  
  /**
   * Get a Word
   */
  private function getWord() {
    $words = count($this->words)-1;
    $word = $this->words[rand(0, $words)];
    return $word;
  }
  
  /**
   * Generate a Paragraph
   */
  private function getParagrath() {
    $variant = $this->modes[$this->mode];
    $max = 100*$variant; $min = 70*$variant;
    $lengthParagrath = rand($min, $max);
    $i = 0;
    $paragrath = [];
    for (; $i < $lengthParagrath; $i++) {
      array_push($paragrath, $this->getWord());
    }
    return implode(" ", $paragrath);
  }
  
  /**
   * Generate a Sentence
   */
  private function getSentence() {
    $variant = $this->modes[$this->mode];
    $lengthSentence = $this->length*$variant;
    $i = 0;
    $sentence = [];
    for (; $i < $lengthSentence; $i++) {
      array_push($sentence, $this->getWord());
    }
    return implode(" ", $sentence);
  }
  
  /**
   * Create a text to the element informed
   * 
   * @param {String} type Opitional
   * @param {Integer} length Opitional
   * @param {String} mode Opitional
   * 
   * @return string
   */
  public function createText ($type = 'PARAGRAPH', $length = 2, $mode = 'MEDIUM') {
    if ($this->validateDataQuery($type, $length, $mode)) {
      $text = '';
      
      $i = 0;
      if ($this->types[$this->type] == 0) {
        //PARAGRAPH
        
        $paragraths = [];
        for (;$i < $this->length; $i++) {
          array_push($paragraths, $this->getParagrath());
        }
        
        $text = (count($paragraths) > 1 ? implode("<br><br>", $paragraths) : implode("", $paragraths));
      } else if ($this->types[$this->type] == 1) {
        // SENTENCE
        
        $text = $this->getSentence();
      }
      
      return $text;
    }
  }
}