<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP SECURITE Question 3 (Déchiffrement)</title>
</head>
<body>
    <form action="all_operations.php" method="post">
    <input type="hidden" name="contexte" value="q3">
        <label for="">Valeur de chiffée:</label>
            <input type="text" name="N">
        
        
            <label for="">Valeur de k1:</label>
            <input type="text" name="k1">
        
        
            <label for="">Valeur de k2:</label>
            <input type="text" name="k2">
        
        
            <label for="">Valeur de pi:</label>
            <input type="text" name="pi">
        
        
            <label for="">Valeur de p</label>
            <input type="text" name="p">
            <button type="submit">Procéder au dechiffrement</button>
    </form>
    <br>
    <a href="question1.php">Retourner à la question 1</a>
</body>
</html>