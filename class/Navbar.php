<?php

class Navbar
{
  private $navItems;

  public function __construct($navItems)
  {
    $this->navItems = $navItems;
  }

  public function render()
  {
?>
    <nav>
      <ul class="flex gap-2">
        <?php
        foreach ($this->navItems as $item) {
          echo '<li><a href="' . $item['link'] . '">' . $item['title'] . '</a></li>';
        }
        ?>
      </ul>
    </nav>
<?php
  }
}
