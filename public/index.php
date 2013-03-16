<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php define('APP_ROOT', getcwd()); ?>
<?php define('DS', DIRECTORY_SEPARATOR); ?>
<?php set_include_path("..".DS.'lib'); ?>
<?php include_once '../lib/Autoloader.php'; ?>
<?php Autoloader::register(); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HillSong London - Guest Entry</title>
        <link type="text/css" rel="stylesheet" href="../css/style.css">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="">
        <meta name="author" content="Bolaji Olubajo">
        <script type="text/javascript" src="../js/prototype.js"></script>
        <script type="text/javascript" src="../js/validation.js"></script>
        <script type="text/javascript" src="../js/form.js"></script>
        <script type="text/javascript" src="../js/effects.js"></script>
        <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    </head>
    <body>
        <div class="entry-center">
            <div class="main">
                <div class="left">
                    <img src="../images/logo-gray.gif" alt="HillSong London" title="HillSong London"/>
                </div>
                <div class="custom-form right">
                    <h2>New Christians Application Form </h2>
                    <form style="display: inline-block"id="addPerson" name="addPerson" method="post" enctype="multipart/form-data" action="register.php">
                        <select class="validate-select" style="width:100%;margin-bottom:10px" name="num_of_new">
                            <option value="">Please select number of people</option>
                            <?php for ($i = 1; $i < 20; $i++) { ?>
                                <option value="<?php echo $i ?>" ><?php echo $i ?></option>
                            <?php } ?>
                        </select>

                        <button style="float:right;" class="button white" type="submit">Next</button>
                    </form> 
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var addPerson = new VarienForm('addPerson');
        </script>
        <?php
        // put your code here
        ?>
    </body>
</html>
