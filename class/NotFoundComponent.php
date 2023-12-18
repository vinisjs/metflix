<?php

class NotFoundComponent
{
  public function render()
  {
?>
    <div class="flex flex-col justify-center items-center flex-1">
      <h2 class="text-4xl font-bold">404</h2>
      <a href="/" class="text-sky-700 hover:text-sky-500">Back Home</a>
    </div>
<?php
  }
}
?>