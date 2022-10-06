<?php defined('APP_PATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?=MAFURA_URL?>mafura.css" rel="stylesheet">

    <title>@field(title) - Katdo</title>
  </head>
  <body>
    @field(content)
    <script src="<?=MAFURA_URL?>mafura.js"></script>
  </body>
</html>