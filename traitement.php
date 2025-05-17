<?php
function texteVersEmoji($texte) {
    $lettreVersEmoji = array(
        'a' => '🍎', 'b' => '🍌', 'c' => '🍒', 'd' => '🍓', 'e' => '🍈',
        'f' => '🍉', 'g' => '🍊', 'h' => '🍋', 'i' => '🍌', 'j' => '🍍',
        'k' => '🥝', 'l' => '🍅', 'm' => '🍆', 'n' => '🥜', 'o' => '🍊',
        'p' => '🍐', 'q' => '🍑', 'r' => '🍒', 's' => '🍏', 't' => '🍎',
        'u' => '🥥', 'v' => '🍇', 'w' => '🍉', 'x' => '🍈', 'y' => '🍋',
        'z' => '🍌', ' ' => '⬜'
    );

    $texteEmoji = '';
    for ($i = 0; $i < strlen($texte); $i++) {
        $lettre = strtolower($texte[$i]);
        if (array_key_exists($lettre, $lettreVersEmoji)) {
            $texteEmoji .= $lettreVersEmoji[$lettre];
        } else {
            $texteEmoji .= $lettre; // Garde les caractères non mappés inchangés
        }
    }

    return $texteEmoji;
}

function emojiVersTexte($texteEmoji) {
    $emojiVersLettre = array(
        '🍎' => 'a', '🍌' => 'b', '🍒' => 'c', '🍓' => 'd', '🍈' => 'e',
        '🍉' => 'f', '🍊' => 'g', '🍋' => 'h', '🍌' => 'i', '🍍' => 'j',
        '🥝' => 'k', '🍅' => 'l', '🍆' => 'm', '🥜' => 'n', '🍊' => 'o',
        '🍐' => 'p', '🍑' => 'q', '🍒' => 'r', '🍏' => 's', '🍎' => 't',
        '🥥' => 'u', '🍇' => 'v', '🍉' => 'w', '🍈' => 'x', '🍋' => 'y',
        '🍌' => 'z', '⬜' => ' '
    );

    $texte = '';
    for ($i = 0; $i < strlen($texteEmoji); $i++) {
        $emoji = $texteEmoji[$i];
        if (array_key_exists($emoji, $emojiVersLettre)) {
            $texte .= $emojiVersLettre[$emoji];
        } else {
            $texte .= $emoji; // Garde les emojis non mappés inchangés
        }
    }

    return $texte;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texte = $_POST['texte'];
    $action = $_POST['action'];

    if ($action == "texte_vers_emoji") {
        $resultat = texteVersEmoji($texte);
        echo "Texte en Emoji: " . $resultat;
    } elseif ($action == "emoji_vers_texte") {
        $resultat = emojiVersTexte($texte);
        echo "Texte décodé: " . $resultat;
    }
}
?>
