<?php
$word = "Computer";  

$vowels = "";
$consonants = "";

$word = strtolower($word); 

for ($i = 0; $i < strlen($word); $i++) 
    {
        $ch = $word[$i];
        if (ctype_alpha($ch)) 
            { 
                if (in_array($ch, ['a','e','i','o','u'])) 
                    {
                        $vowels .= $ch . " ";
                    } 
                else 
                    {
                        $consonants .= $ch . " ";
                    }
            }
}

echo "Vowels: " . trim($vowels) . "<br>";
echo "Consonants: " . trim($consonants);
?>
