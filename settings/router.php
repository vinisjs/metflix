<?php

class Router
{
  private $header;
  private $main;
  private $footerPath;

  public function __construct($header, $main, $footerPath)
  {
    $this->header = $header;
    $this->main = $main;
    $this->footerPath = $footerPath;

    $this->handleRouting();
  }

  private function handleRouting()
  {
    $path = $_SERVER['REQUEST_URI'];

    switch ($path) {
      case '/':
      case '/index.php':
        $this->renderLayout();
        break;
      case '/about':
        $this->renderAboutPage();
        break;
      case '/films':
        $this->renderFilmsPage();
        break;
      default:
        if (preg_match('/\/films\/(\d+)/', $path, $matches)) {
          $filmId = $matches[1];
          $this->renderFilmPage($filmId);
        } else {
          $this->renderNotFound();
        }
        break;
    }
  }

  private function renderLayout()
  {
    $layout = new Layout($this->header, $this->main, $this->footerPath);
    $layout->render();
  }

  private function renderAboutPage()
  {
    $header = new Header("About Us", NAV_LINKS);
    $footerPath = './components/footer.php';

    $aboutComponent = new AboutComponent();
    $main = new Main();
    $main->addComponent($aboutComponent);

    $layout = new Layout($header, $main, $footerPath);
    $layout->render();
    exit();
  }

  private function renderFilmsPage()
  {
    $data = readJson("./db/films.json");
    $header = new Header("Films", NAV_LINKS);
    $footerPath = './components/footer.php';
    $main = new Main();

    foreach ($data as $filmData) {
      $movieComponent = new MovieListingComponent(
        $filmData->title,
        $filmData->director,
        $filmData->cast,
        $filmData->genres,
        $filmData->year,
        $filmData->country,
        $filmData->imageSrc,
        $filmData->readMoreLink,
      );

      $main->addComponent($movieComponent);
    }

    $layout = new Layout($header, $main, $footerPath);
    $layout->render();
    exit();
  }

  private function renderFilmPage($filmId)
  {
    $data = readJson("./db/films.json");
    $selectedFilm = $this->findFilmById($filmId, $data);

    if ($selectedFilm) {
      $header = new Header($selectedFilm->title, NAV_LINKS);
      $footerPath = './components/footer.php';

      $movieDetailComponent = new MovieDetailComponent(
        $selectedFilm->id,
        $selectedFilm->title,
        $selectedFilm->director,
        $selectedFilm->cast,
        $selectedFilm->genres,
        $selectedFilm->year,
        $selectedFilm->country,
        $selectedFilm->imageSrc,
        $selectedFilm->readMoreLink
      );

      $this->main->addComponent($movieDetailComponent);

      $layout = new Layout($header, $this->main, $footerPath);
      $layout->render();
    } else {
      $this->renderNotFound();
    }
  }

  private function renderNotFound()
  {
    $header = new Header("Not Found", NAV_LINKS);
    $footerPath = './components/footer.php';

    $notFoundComponent = new NotFoundComponent();
    $main = new Main();
    $main->addComponent($notFoundComponent);

    $layout = new Layout($header, $main, $footerPath);
    $layout->render();
    exit();
  }

  private function findFilmById($filmId, $films)
  {
    foreach ($films as $film) {
      if ($film->id == $filmId) {
        return $film;
      }
    }
    return null;
  }
}
