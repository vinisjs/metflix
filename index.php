<?php
require_once("./test/MyComponent.php");
require("./settings/constants.php");
require("./settings/router.php");
require("./class/index.php");
require("./utils/readJson.php");

$myComponent = new MyComponent("This is a custom component.");
$data = readJson("./db/films.json");

$header = new Header(TITLE_SERVICE, NAV_LINKS);
$main = new Main();
// $main->addComponent($myComponent);

$footerPath = './components/footer.php';
?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo TITLE_SERVICE ?></title>
  <link rel="stylesheet" href="<?php echo STYLE ?>">
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <!-- erro de estilos em páginas dinamicas -->
</head>

<body class="flex flex-col h-screen w-full bg-zinc-900 text-stone-50">

  <?php new Router($header, $main, $footerPath) ?>

</body>

</html>