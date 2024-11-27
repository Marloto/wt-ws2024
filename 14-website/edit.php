<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors', 1);

require("articles.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error-msg {
            color: red;
        }

        .is-invalid {
            border-color: red;
        }
    </style>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="container edit">
        <h1>Edit Blog Post</h1>
        <form method="post">
            <p>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="">
            </p>
            <p>
                <label for="content">Content:</label>
                <textarea name="content" id="content"></textarea>
            </p>
            <p>
                <label for="published-at">Published At:</label>
                <input type="date" id="published-at" name="published-at" value="">
            </p>
            <p>
                <label for="author">Author:</label>
                <input type="email" name="author" id="author" value="">
            </p>
            <p>
                <input type="checkbox" name="all-rights-reserved" id="all-rights-reserved" value="1">
                <label for="all-rights-reserved">All Image Rights are available?</label>
            </p>
            <p>
                <input type="radio" id="a" value="1" name="foo">
                <label for="a">A</label><br>
                <input type="radio" id="b" value="2" name="foo">
                <label for="b">B</label><br>
                <input type="radio" id="c" value="3" name="foo">
                <label for="c">C</label><br>
            </p>
            <p>
                <label for="state">Status:</label>
                <select name="state">
                    <?php
                    $states = array("Published", "Review", "New");
                    for ($i = 0; $i < count($states); $i++) { ?>
                        <option><?= $states[$i] ?></option>
                    <?php } ?>
                    ?>
                </select>
            </p>
            <p class="buttons">
                <button name="action" type="submit" value="delete">Delete</button>
                <button name="action" type="submit" value="save" class="primary">Save</button>
            </p>
        </form>
        <h2>Select Blog Post</h2>
        <ul>
        </ul>
    </div>
</body>

</html>