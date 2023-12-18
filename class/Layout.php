<?php

class Layout
{
  private $header;
  private $main;
  private $footerPath;

  public function __construct($headerPath, $main, $footerPath)
  {
    $this->header = $headerPath;
    $this->main = $main;
    $this->footerPath = $footerPath;
  }

  public function render()
  {
?>

    <body class="flex flex-col h-screen w-full bg-zinc-900 text-stone-50">
      <?php
      $this->header->render();
      $this->main->render();
      include $this->footerPath;
      ?>
    </body>
<?php
  }
}

?>