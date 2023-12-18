<?php
// utils/renderFilms.php

function renderFilmComponents(array $data)
{
  $filmComponents = [];

  foreach ($data as $item_data) {
    $movieComponent = new MovieListingComponent(
      $item_data->title,
      $item_data->director,
      $item_data->cast,
      $item_data->genres,
      $item_data->year,
      $item_data->country,
      $item_data->imageSrc,
      $item_data->readMoreLink,
      $item_data->id
    );

    $filmComponents[] = $movieComponent;
  }

  return $filmComponents;
}
