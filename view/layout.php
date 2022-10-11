<?php defined('APP_PATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?=MAFURA_URL?>mafura.css" rel="stylesheet">
    <link href="<?=APP_URL?>assets/katdo.css" rel="stylesheet">

    <title>@field(title) - Katdo</title>    
  </head>
  <body>
    <div>
      <div class="center-content">
        
        <header class="nav bg-danger-lighten color-white">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <h1>Katdo</h1>
                    </div>
                    <div class="col-3">
                        <?php
                            if(isset($ses['user_id']))
                            {
                            ?>
                                <div class="bg-light color-black p-1 text-right">
                                    <?=$ses['display_name'].' (@'.$ses['username'].')'?>
                                    <div>
                                        <a href="<?=APP_URL.'?page=logout'?>">Logout</a>
                                    </div>
                                </div>
                            <?php
                            }
                            else
                            {
                            ?>
                                <div class="bg-light color-black p-1 text-right">
                                    <div>
                                        <a href="<?=APP_URL.'user/login'?>">Login</a>
                                    </div>
                                </div>
                            <?php    
                            }
                        ?>
                        
                    </div>
                </div> 
            </div>
        </header>
        
        <div class="container">
            @field(content)
        </div>
        
      </div>
    </div>
    
    <script src="<?=MAFURA_URL?>mafura.js"></script>
  </body>
</html>