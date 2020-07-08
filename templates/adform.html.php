<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ad</title>
    <link rel="stylesheet" href="css/ad.css">
</head>
<body>

<div class="adform">
    <form action="ADAG.php" method="post" enctype="multipart/form-data">
        <div class="day">
            <h3>giorno</h3>
            <label for="data/titolo">data/titolo</label>
            <input type="text" id="data/titolo" name="day[data_titolo]">
            <label for="data">Data</label>
            <input type="date" id="data" name="day[data]">
        </div>
        <div class="film">
            <h3>film</h3>
            <label for="title">Titolo</label>
            <input type="text" id="titolo" name="film[titolo]">
            <label for="locandina">Locandina</label>
            <input type="file" id="locandina" name="film[locandina]">
            <label for="descrizione">Descrizione</label>
            <textarea name="film[descrizione]" id="descrizione" cols="30" rows="3"></textarea>
            <label for="orario">Orario</label>
            <input type="time" id="orario" name="film[orario]">
            
        </div>
        <input type="submit" value="inserisci">
    </form>
</div>
</body>
</html>