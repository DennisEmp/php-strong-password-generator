<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    

    <?php
        $length = $_GET["passwordLength"];
        // Caratteri disponibili per la password
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=?";
        // Sstringa vuota per memorizzare la password generata
        $password = "";
    ?>

    <div class="container">
        <h1>Random Password Generator</h1>
        <form method="get" class="form">
            <label for="passwordLength">Lunghezza Password:</label>
            <input type="number" name="passwordLength">
            <input type="submit" value="Genera">

            <?php
                if (!empty($length) && is_numeric($length)) {
                // Ciclo for per generare la password
                for ($i = 0; $i < $length; $i++) {
                    // Numero casuale tra 0 e la lunghezza dei caratteri disponibili
                    $randomIndex = rand(0, strlen($chars) - 1);
                    // Carattere alla password
                    $password .= $chars[$randomIndex];
                }
                // Mix dei caratteri della password
                $password = str_shuffle($password);
                // Print
                echo "La tua password è: " . $password;
                } else {
                    echo "Inserisci un numero valido per la lunghezza della password.";
                }
            ?>
            
        </form>
    </div>
    
</body>
</html>

<style>
    * {
        margin: 0 auto;
    }
    .container {
        width: 400px;
        height: 250px;
        background-color: darkslategray;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 25px;
        flex-direction: column;
        margin-top: 200px;
    }

    .form {
        display: grid;
        gap: 20px;
    }
    h1 {
        font-size: 30px;
        margin-bottom: 50px;
        color: #fff;
    }
</style>



<!-- Repo
php-strong-password-generator

Todo
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password sicure. L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale da restituire all’utente. La password dovra' essere composta da lettere minuscole e maiuscole, numeri e simboli
Scriviamo tutto (logica e layout) in un unico file index.php.

Milestone 2
Verificato il corretto funzionamento del nostro codice. Spostiamo poi la logica in un file helper.php che includeremo poi nella pagina principale. -->

<!-- 
### Bonus
#### Milestone 3
Invece di visualizzare la password nella `index.php`, effettuare un *redirect* ad una pagina dedicata che tramite `$_SESSION` recupererà la password da mostrare all’utente.

#### Milestone 4
Gestire ulteriori parametri per la *password*: quali caratteri attivare fra numeri, lettere e simboli per la generazione di *password causale*. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
Dare all’utente anche la possibilità ottenere *password* contenenti caratteri ripetuti o meno. -->