<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="text" name="text-field" value="<?= $_GET['text-field'] ?>"><br>
        <textarea name="area-field"><?= $_GET['area-field']; ?></textarea><br>
        <select name="select-field">
            <?php
            $optionen = array("A", "B", "C");
            foreach($optionen as $option) {
                if($_GET['select-field'] == $option) {
                    echo "<option selected>$option</option>";
                } else {
                    echo "<option>$option</option>";
                }
            }
            ?>
        </select><br>

        <input name="check-field" type="checkbox" value="1" <?= $_GET['check-field'] == '1' ? "checked" : "" ?>><br>

        <input name="radio-field" type="radio" value="1" <?= $_GET['radio-field'] == '1' ? "checked" : "" ?>>
        <input name="radio-field" type="radio" value="2" <?= $_GET['radio-field'] == '2' ? "checked" : "" ?>><br>
        
        <button>Absenden</button>
    </form>

    <?php var_dump($_GET); ?>
</body>
</html>



