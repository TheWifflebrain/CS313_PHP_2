<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="homepage.css">
    <title>Super Smash Bros. Ultimate</title>
</head>
<body>
    <div>
        <?php 
            date_default_timezone_set('America/Denver');
            echo date("D M d, Y G:i a"); 
        ?>
    </div>
    
    <p class="jumbotron text-center bg-dark title display-1">Super Smash Bros. Ultimate</p>
    <?php
        require("navbar.php");
    ?>

    <div>
        <p class="display-4">About</p>
        <p>
            Super Smash Bros. Ultimate is a 2018 crossover fighting game developed by Bandai Namco Studios and Sora Ltd., 
            and published by Nintendo for the Nintendo Switch. It is the fifth installment in the Super Smash Bros. series, 
            succeeding Super Smash Bros. for Nintendo 3DS and Wii U. The game follows the series' traditional style of gameplay: 
            controlling one of various characters, players must use differing attacks to weaken their opponents and knock them out 
            of an arena. It features a wide variety of game modes, including a campaign for single-player and multiplayer versus modes. 
            Ultimate includes every playable character from previous Super Smash Bros. games—ranging from Nintendo's mascots to characters 
            from third-party franchises—and several newcomers, reaching a total of over 70.
        </p>
    </div>

    <div>
        <p class="display-4">My Favorite Characters</p>
    </div>
        <div>
            <p class="display-4">King Dedede</p>
            <p>
                King Dedede is a fictional character and the main antagonist in Nintendo's Kirby video game series created by Masahiro Sakurai and 
                developed by HAL Laboratory. Dedede first appeared in the 1992 video game Kirby's Dream Land as the main antagonist, and has returned 
                for all other games of the series except Kirby & the Amazing Mirror (2004) and Kirby and the Rainbow Curse (2015). He has also appeared 
                in several Kirby comic books, the 2001 anime series Kirby: Right Back at Ya!, and the Super Smash Bros. video game series (specifically 
                Super Smash Bros. Brawl and all subsequent installments.
            </p>
            <img class="mx-auto d-block" src="KingDedede.jpg" alt="King Dedede image">
        </div>

        <div>
            <p class="display-5">Ike</p>
            <p>
                Ike is a fictional character from the Fire Emblem series of video games. More specifically, he is the central protagonist and Lord-class 
                character of the ninth game in the series, Fire Emblem: Path of Radiance and one of the central characters in Fire Emblem: Radiant Dawn. 
                Ike's premiere game, Path of Radiance, was the first console Fire Emblem game released internationally, was the first console Fire Emblem 
                game released since the Super Famicom game, Fire Emblem: Thracia 776, and was the first to have three-dimensional, cel-shaded graphics. His 
                raw personality and blue hair are derived from Hector, the protagonist of the first Fire Emblem released to Europe and North America, when 
                Ike's creators discovered that he was one of the most popular characters in the series.
            </p>
            <img id="ikeImage" class="mx-auto d-block" src="ike.jpg" alt="Ike image">
        </div>

        <div>
            <p class="display-5">Sheik</p>
            <p>
                In The Legend of Zelda: Ocarina of Time, Zelda disguises herself as a surviving member of the Sheikah clan under the name of Sheik. With voice
                muffled and face concealed, as well as wearing a form-fitting blue unitard with the red Sheikah eye in the center, Sheik is unrecognizable as Zelda.
                Sheik plays the lyre and teaches Link new songs to help him on his quest. When Link arrives at the Temple of Time near the end of the game, she uses 
                the Triforce of Wisdom and reverts to Zelda. It is revealed by the character's trophy in the North American translation of Super Smash Bros. Melee 
                that Zelda used her magical skills to change her skin tone, hair length, eye color, and clothing; in the noncanonical officially licensed manga for 
                The Legend of Zelda: Ocarina of Time, following changing her appearance, Zelda orders Impa to seal her consciousness away for seven years, so that 
                she may become Sheik and live incognito.[15] Sheik also returned in Hyrule Warriors, using a harp and shortsword in her attacks.
            </p>
            <img id="sheikImage" class="mx-auto d-block" src="sheik.jpg" alt="Sheik image">
        </div>

</body>
</html>