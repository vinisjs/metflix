<?php

class MovieListingComponent
{
  private $title;
  private $director;
  private $cast;
  private $genres;
  private $year;
  private $country;
  private $imageSrc;
  private $readMoreLink;

  public function __construct($title, $director, $cast, $genres, $year, $country, $imageSrc, $readMoreLink)
  {
    $this->title = $title;
    $this->director = $director;
    $this->cast = $cast;
    $this->genres = $genres;
    $this->year = $year;
    $this->country = $country;
    $this->imageSrc = $imageSrc;
    $this->readMoreLink = $readMoreLink;
  }

  public function render()
  {
?>
    <div class="bg-zinc-900 text-zinc-50 grid grid-cols-1 gap-2 sm:grid-cols-2 p-2 rounded-md">
      <div>
        <img class=" rounded-md" src="<?php echo $this->imageSrc; ?>" alt="" srcset="">
      </div>
      <div class="sm:flex flex-col justify-between">
        <div>
          <h1 class="text-2xl font-semibold"><?php echo $this->title; ?></h1>
          <div class="my-2 md:my-4">
            <p class="text-md font-medium">Diretor:</p>
            <span class="text-sm text-zinc-300"><?php echo $this->director; ?></span>
            <p class="text-md font-medium">Elenco:</p>
            <?php foreach ($this->cast as $actor) : ?>
              <span class="text-sm text-zinc-300"><?php echo $actor; ?></span>
            <?php endforeach; ?>
            <p class="text-md font-medium">Gêneros:</p>
            <?php foreach ($this->genres as $genre) : ?>
              <span class="text-sm text-zinc-300"><?php echo $genre; ?></span>
            <?php endforeach; ?>
            <div>
              <span class="text-sm text-zinc-300"><?php echo $this->year; ?></span>
              <span class="text-sm text-zinc-300"><?php echo $this->country; ?></span>
            </div>
          </div>
        </div>
        <div class="">
          <div>
            <a href="<?php echo $this->readMoreLink; ?>" class="text-zinc-50 bg-zinc-800 rounded-md  hover:text-sky-400 block text-right py-2 pr-4">Read More</a>
          </div>
        </div>
      </div>
    </div>
<?php
  }
}

?>