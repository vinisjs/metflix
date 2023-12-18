<?php

class Header
{
  private $title;
  private $nav_items;

  public function __construct($title, $nav_items)
  {
    $this->title = $title;
    $this->nav_items = new Navbar($nav_items);
  }

  public function render()
  {
?>
    <header class=" py-4 px-4">
      <div class="mx-auto max-w-5xl flex justify-between items-center">
        <h1 class="text-2xl font-bold sm:text-4xl "><a href="/"><?php echo $this->title ?></a></h1>
        <?php $this->nav_items->render(); ?>
      </div>
    </header>
<?php
  }
}
