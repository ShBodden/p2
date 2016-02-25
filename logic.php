<?php

$password = "";
$rand_nums = "0123456789";
$symbols = "!@#$%^&*=+";
$error = "";
$case = "lowercase";
$seperator_char = "-";
$num_words = 3;

//Word list courtsey of http://xpo6.com/list-of-english-stop-words/
$word_list = array("a", "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", "amongst", "amoungst", "amount",  "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as",  "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves");


//Get users password criteria and data validation
if(isset($_GET['wordtotal']) && !empty($_GET['wordtotal']))

{
   $num_words = $_GET['wordtotal'];

   if(!is_numeric($num_words)){
        $error = "Invalid password size. 3-8 word limit";
        $num_words =3;

   }

   else if ($num_words < 3 OR $num_words > 8)

   {

        $error = "Invalid password size. 3-8 word limit";
        $num_words = 3;

   }
}

if(isset($_GET['case']) && !empty($_GET['case']))

{

   $case = $_GET['case'];

}

if(isset($_GET['case']) && !empty($_GET['case']))

{

   $case_mode = $_GET['case'];

}

if(isset($_GET['seperator']) && !empty($_GET['seperator']))

{
    if ($_GET['seperator'] == "Hyphen")
    {

        $seperator_char = "-";

    }

    else if ($_GET['seperator'] == "Space")
    {

        $seperator_char = " ";

    }

    else if ($_GET['seperator'] == "None")
    {

        $seperator_char = "";

    }
}


$rand_keys = array_rand($word_list,$num_words);
$word_count = count($word_list);

for($i = 0; $i<$num_words; $i++)
{
    if ($case == 'CamalCase')

    {

        $current_word = ucfirst($word_list[$rand_keys[$i]]);

    }

    else if ($case == 'lowercase')

    {

        $current_word = strtolower($word_list[$rand_keys[$i]]);

    }

    else
    {

        $current_word = strtoupper($word_list[$rand_keys[$i]]);

    }
    $password .= $current_word . $seperator_char;
}

$password = rtrim($password,$seperator_char);


//Concatenation of all data returning password to user
function add_num_symb($string)

{

   $i = mt_rand(0, strlen($string)-1);
   return $string[$i];

}

if (isset($_GET['add_number']))

{

   $random_number = add_num_symb($rand_nums);
   $password .= $seperator . $random_number;

}
if (isset($_GET['add_symbol']))

{

   $random_symbol = add_num_symb($symbols);
   $password .= $seperator . $random_symbol;


}

?>
