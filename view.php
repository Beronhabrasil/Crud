<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daten</title>

       
        <script src="js/jquery-3.1.0.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Agenda</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="main" class="container-fluid" style="margin-top: 50px">

            <div id="top" class="row">
                <div class="col-sm-3">
                    <h2></h2>
                </div>

               
            </div><!-- /#top -->

            <?php
include_once 'DB.php';
$id = $_GET['id'];

$db = new DB();
$ergebnis = $db->query("select * from tblkunden where id ='$id'");?>

<?php while ($row = $ergebnis->fetch_object()) { ?>


  <div id="list" class="row">

                <div class="table-responsive " style="width: 100%; height: 100%;">
                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>

                                <th>Kundenname</th>
                                <th>KundenNachname</th>
                                <th>Strasse</th>
                                <th>PLZ</th>
                                <th>Orte</th>
                                 <th>Berufe</th>
                                  <th>Ausweiß</th>
                                   <th>Fahrerlaubnis</th>
                                  
                             
                            </tr>
                        </thead>
                        <tbody>

                           
                            <tr>



                                <td><?php echo $row->kdname; ?></td>
                                <td><?php echo $row->kdvname; ?></td>
                                <td><?php echo $row->kdstrasse; ?></td>
                                <td><?php echo $row->kdplz; ?></td>
                                <td><?php echo $row->kdort; ?></td>
                               
                           


<?php }?>

                            </tbody>            
                    </table>






