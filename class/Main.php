<?php

class Main
{
  private $components = [];

  public function addComponent($component)
  {
    $this->components[] = $component;
  }

  public function render()
  {
?>
    <main class="bg-zinc-800 flex-1">
      <div class="mx-auto max-w-5xl px-4 lg:px-0">
        <div class="grid gap-2 sm:grid-cols-2 my-2">
          <?php
          foreach ($this->components as $component) {
            $component->render();
          }
          ?>
        </div>
      </div>
    </main>
<?php
  }

  public function clearComponents()
  {
    $this->components = [];
  }
}

?>