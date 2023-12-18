<?php

class MovieDetailComponent
{
  private $id;
  private $title;
  private $director;
  private $cast;
  private $genres;
  private $year;
  private $country;
  private $imageSrc;
  private $readMoreLink;

  public function __construct($id, $title, $director, $cast, $genres, $year, $country, $imageSrc, $readMoreLink)
  {
    $this->id = $id;
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
    <article class="bg-zinc-800 text-zinc-50 p-4 rounded-md">
      <h1 class="text-3xl font-bold mb-2"><?php echo $this->title; ?></h1>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <img class="w-full rounded-md" src="<?php echo $this->imageSrc; ?>" alt="">
        <div>
          <p><strong>Diretor:</strong> <?php echo $this->director; ?></p>
          <p><strong>Elenco:</strong> <?php echo implode(', ', $this->cast); ?></p>
          <p><strong>Gêneros:</strong> <?php echo implode(', ', $this->genres); ?></p>
          <p><strong>Ano:</strong> <?php echo $this->year; ?></p>
          <p><strong>País:</strong> <?php echo $this->country; ?></p>
          <a href="<?php echo $this->readMoreLink; ?>" class="text-sky-400 hover:underline">Leia mais</a>
        </div>
      </div>
    </article>
<?php
  }
}
?>