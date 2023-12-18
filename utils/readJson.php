<?php
function readJson($filePath)
{
  $jsonContent = file_get_contents($filePath);

  $data = json_decode($jsonContent);

  if (json_last_error() !== JSON_ERROR_NONE) {
    throw new Exception("Erro ao ler o arquivo JSON: " . json_last_error_msg());
  }

  return $data;
}
