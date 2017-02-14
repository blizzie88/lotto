<?php
// getallenkiezer class aanmaken
class GetallenKiezer {
    // aanmaken van de 6 winnende getallen
    public function getGetallenReeks() {
        //array $tab aanmaken
        $tab = array();
        // zolang de lengte van de array $tab onder 6 blijft, blijven loopen
        while (count($tab) < 6) {
            // steek een random getal tussen 1-42 in de variabele $getal
            $getal = rand(1, 42);
            // als $getal niet in de array $tab zit, dan zet hij het getal achteraan de array erbij
            if (!in_array($getal, $tab)) array_push($tab, $getal);
        }
        // array tab teruggeven
        return $tab;
    }

}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Lotto</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            .container {
                width: 750px;
                margin: 0 auto;
                text-align: center;
            }
            .container h1 {
                color: #424242;
            }    
            .table {
                margin-top: 100px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Quick pick number generator</h1>
            <h3>Press F5 to get a new set of numbers !</h3>
            <table class="table table-bordered">
                <tbody>
                    <?php
                    // nieuwe instantie van GetallenKiezer aanmaken
                    $kiezer = new GetallenKiezer();
                    // de methode getGetallenReeks aanspreken en de uitvoer hiervan ($tab array) opslaan in de $reeks var (array)
                    $reeks = $kiezer->getGetallenReeks();
                    // blijven loopen zolang i kleiner is of gelijk aan 42
                    for ($i=1; $i<=42; $i++) {
                        // als het getal i voorkomt in de array 
                        if (in_array($i, $reeks)) {
                            // geef een donkere achtergrondkleur aan deze cell
                            $bgcolor = "#49a135";
                        } else {
                            // als het getal niet voorkomt , geef lichte kleur aan achtergrond cell
                            $bgcolor = "#eee";
                        }
                        // Begin een rij bij getallen die 1 rest hebben bij deling door 7, dus 1ste getal nieuwe rij. 1,8,15,22,29,35
                        if ($i % 7 == 1) print("<tr>");
                        // print de individuele cellen met de getallen 1-42 uit de i variabele
                        print("<td style='text-align: center; background-color: " . 
                              $bgcolor . "'>" . $i . "</td>");
                        // Als i veelvoud van zeven is(modulo met uitkomst 0), dan print er een </tr> zodat er nieuwe rij komt 
                        if ($i % 7 == 0) print("</tr>");
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>