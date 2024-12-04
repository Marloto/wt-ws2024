<?php
$mailClass = "";
if(strpos($_GET["email"]??"", "@") === false) {
    $mailClass = "is-invalid";
} else {
    $mailClass = "is-valid";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <form>
            <div>
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control <?= $mailClass ?>" id="exampleInputEmail1" name="email" value="<?= $_GET["email"]??"" ?>">
                <div class="invalid-feedback">Something is wrong!</div>
                <div class="valid-feedback">Something is good!</div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <script>
            const el = document.getElementById('exampleInputEmail1');
            el.addEventListener('input', () => {
                // indexof sucht eine zeichenkette und deren position
                // >= 0 wenn position existiert für suchstr.
                // == -1 wenn nichts existiert
                el.classList.remove('is-valid', 'is-invalid');
                if(el.value.indexOf('@') >= 0) {
                    el.classList.add('is-valid');
                } else {
                    el.classList.add('is-invalid');
                }
            })
        </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>