<?php

class MyComponent
{
  private $content;

  public function __construct($content)
  {
    $this->content = $content;
  }

  public function render()
  {
    echo "<p>{$this->content}</p>";
  }
}
