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
    <!-- Button trigger modal -->
    <div class="container">
        <?php
        if (!empty($_GET["info"] ?? "")) { ?>
            <div class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
            </div>
        <?php }
        ?>
        <a href="#" onclick="changeContent('abc')">
            Frage nach "abc"
        </a><br>
        <a href="#" onclick="changeContent('hello World')">
            Frage nach "hello world"
        </a>
    </div>

    <script>
        function changeContent(frage) {
            const el = document.getElementById("model-content-stuff");
            el.textContent = "..." + frage;
            const hiddenInput = document.getElementById("info");
            el.value = frage;
            const someButton = document.getElementById("some-button");
            el.setAttribute("href", "?info=" + frage);

            let myModalEl = document.getElementById('exampleModal');
            let modal = bootstrap.Modal.getOrCreateInstance(myModalEl)
            modal.show();
        }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Frage nach ...</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="model-content-stuff">
                        ...
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="info" id="info" value="abc">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes (1)</button>
                        <a href="modal.php?info=abc" id="some-button" class="btn btn-primary">Save changes (2)</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>