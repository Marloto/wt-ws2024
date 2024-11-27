<?php
require 'Article.php';
require 'Cart.php';
require 'Item.php';

$articles = array();
$info = '';
if (!isset($_GET['owner'])) {
    // first call, initialize session
    $articles = array(
        new Article('1 Liter Milk', 1.20),
        new Article('Bread (1 Loaf)', 3.25),
        new Article('Tomatoes (500 gr.)', 3.10)
    );
    $cart = new Cart('Homer Simpson');
    $cart->addItem($articles[0], 1);
    $cart->addItem($articles[1], 2);
    $cart->addItem($articles[2], 3);
} else {
    $info = 'Stored counts: ';
    // Java konnte man statische Methoden mit <Klassenname>.<methode>(<parameter>) aufrufen
    $cart = Cart::fromQuery($articles);
    // store new item counts
    for ($i = 0; $i < count($cart->items); ++$i) {
        $cart->items[$i]->count = $_POST['count' . $i];
        $info .= $_POST['count' . $i] . ' ';
    }
}

// build action from cart
$action = 'uri-rewriting.php?' . http_build_query($cart, '', '&amp;');
?>
<html>

<head>
    <title>Session mit URI rewriting</title>
</head>

<body>
    <p>Die Session Information wird über die URI als Query String zwischen Client und Server transportiert. Beachte die URI in der Browser-Adresszeile sowie die action des Formulars!</p>
    <h3>Shopping Cart for <?= $cart->owner ?>, #<?= $cart->sequence ?></h3>
    <form method="post" action="<?= $action ?>">
        <table>
            <tr>
                <td>#</td>
                <td>Article</td>
                <td>Count</td>
            </tr>
            <?php for ($i = 0; $i < count($cart->items); ++$i) {
                $item = $cart->items[$i];
            ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $item->article->name ?></td>
                    <td><input type="number" name="count<?= $i ?>" value="<?= $item->count ?>"></td>
                </tr>
            <?php           } ?>
        </table>
        <button>save</button><br>
        <?= $info ?>
    </form>
</body>

</html>