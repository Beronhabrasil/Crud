
<!DOCTYPE html>
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

                <div class="col-sm-6">

                    <div class="input-group h2">





                        <form action="" id="search" method="POST">
                            <input type="text" name="key" />
                            <input type="submit" value="suche" />
                        </form>
                        <div id="result"> </div>
                        <div id="loadingimg"> <img src="img/tenor.gif " />
                            <p>ubertragen</p>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3">
                    <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#Insert">Hinzufügen</a>
                </div>
            </div> <!-- /#top -->


            <hr />
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
                                <th class="actions">Aktion</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include_once 'DB.php';




                            $db = new DB();







                            $result_per_page = 10;


                            $pages_nuw_rows = $db->query("select * from tblkunden ");
                            $number_of_results = $pages_nuw_rows->num_rows;

                            $number_of_pages = ceil($number_of_results / $result_per_page);


                            if (!isset($_GET['page'])) {
                                $page = 1;
                            } else {
                                $page = $_GET['page'];
                            }

                            $this_page_first_result = ($page - 1) * $result_per_page;
                            ?>
                        <div id="bottom" class="row">
                            <div class="col-md-12">

                                <ul class="pagination">


                                    <?php for ($page = 1; $page <= $number_of_pages; $page++) { ?>

                                        <?php echo ' <li><a href="index.php?page=' . $page . '">' . $page . '</a></li>';
                                        ?>
                                    <?php } ?>
                                </ul>      



                            </div> <!-- /#bottom -->
                        </div>

<?php
$result = $db->query('select * from tblkunden LIMIT ' . $this_page_first_result . ',' . $result_per_page);


$db->readtpage = $result;
?>



                        <?php foreach ($db->readtpage as $row) {
                            ?>


                            <tr>



                                <td><?php echo $row['kdname']; ?></td>
                                <td><?php echo $row['kdvname']; ?></td>
                                <td><?php echo $row['kdstrasse']; ?></td>
                                <td><?php echo $row['kdplz']; ?></td>
                                <td><?php echo $row['kdort']; ?></td>
                                <td>
                                    <a class="myview"  href="view.php? id=<?php echo $row['id'] ?>">  <button type="button" class="btn btn-success btn-xs "> View </button>  </a> 
                                </td>

                                <td>  <button type="button" class="btn btn-danger btn-xs" 
                                              data-toggle="modal" data-target="#<?php echo $row['id'] ?>">Bearbeiten</button>



                                </td> 
                                <td>   <form action="" method="POST" class="delete">           
                                        <input type="hidden"   name="id" value="<?php echo $row['id']; ?>"/>
                                        <input class="btn btn-danger btn-xs"  type="submit"value="löschen"/>
                                    </form>  
                                </td>
                            </tr>




                            </tbody>


                            <div class="modal fade" id="<?php echo $row['id'] ?>" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form  class="edit" action="" method="POST">

                                                <fieldset id="kunden">
                                                    <legend>Kundendaten</legend>
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>

                                                    <p>
                                                        <label>Name *:</label>
                                                        <input type="text" name="kdname" value="<?php echo $row['kdname']; ?>"/>
                                                    </p>
                                                    <p>
                                                        <label>Vorname *:</label>
                                                        <input type="text" name="kdvname" value="<?php echo $row['kdvname']; ?>"/>
                                                    </p>
                                                    <p>
                                                        <label>Strasse:</label>
                                                        <input type="text" name="kdstrasse" value="<?php echo $row['kdstrasse']; ?>"/>
                                                    </p>
                                                    <p>
                                                        <label>PLZ:</label>
                                                        <input type="text" name="kdplz" value="<?php echo $row['kdplz']; ?>"/>
                                                    </p>
                                                    <p>
                                                        <label>Ort:</label>
                                                        <input type="text" name="kdort" value="<?php echo $row['kdort']; ?>"/>
                                                    </p>
                                                    <p>
                                                        <input type="submit" value="Bearbeiten"/>
                                                    </p>
                                                </fieldset>


                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                                        </div>
                                    </div>

                                </div>
                            </div>     

<?php } ?>

                    </table>
                </div>

            </div> <!-- /#list -->


            <!-- /#main -->

            <!-- Modal  edit-->







            <!-- Modal  delete-->
            <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="X"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Ja?</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Insert" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-label="X"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalLabel">Kunden in die Datenbank aufnehmen</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="form-group">
                                    <style>label{display: block;}</style>       
                                    <form action=""  class="form" method="POST">

                                        <legend>Kundendaten</legend>


                                        <label>Name *: </label> <input type="text" name="kdname" value="Paul"/>

                                        <label>Vorname *:</label> <input type="text" name="kdvname" value="Panzer"/> 


                                        <label>Strasse:</label> <input type="text" name="kdstrasse" value="Panzerstr.13"/>


                                        <label>PLZ: </label>    <input type="text" name="kdplz" value="01213"/>


                                        <label>Ort:</label><input type="text" name="kdort" value="Entenhausen"/>


                                        <input class="btn btn-success" type="submit" value="Senden"/>





                                    </form>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                                </div>
                            </div>
                        </div>
                    </div>






                    <script>
                        $(function () {




                            $(".delete").submit(function ()
                            {

                                $.ajax(
                                        {
                                            url: "http://localhost/git/delete.php",
                                            type: "POST",
                                            data: $(this).serialize(),
                                            success: function () {
                                                location.reload();
                                            },
                                            error: function () {
                                                alert("Kein Daten");
                                            }

                                        });

                                return false;
                            });


                            $(".form").submit(function () {
                                alert("Data gespeicher");
                                $.ajax(
                                        {
                                            url: "http://localhost/git/query.php",
                                            type: "POST",
                                            data: $(this).serialize(),
                                            success: function ()
                                            {
                                                location.reload();
                                            },

                                            error: function () {
                                                alert("Kein Daten");
                                            }


                                        });

                                return false;

                            });


                            $("#loadingimg").hide(2000);
                            $("#search").submit(function () {
                                $("#loadingimg").show(2000);
                                var title = $("#search").val();
                                $.ajax(
                                        {
                                            url: "http://localhost/git/search.php",
                                            type: "POST",
                                            data: $(this).serialize(),
                                            success: function (data)
                                            {
                                                $("#result").html(data);
                                                $("#loadingimg").hide();

                                            },
                                            error: function () {
                                                alert("Kein Daten");
                                            }

                                        });

                                return false;

                            });

                            $(".edit").submit(function () {

                                //  e.preventDefault();
                                $.ajax(
                                        {
                                            url: "http://localhost/git/edit.php",
                                            type: "POST",
                                            data: $(this).serialize(),
                                            success: function () {
                                                location.reload();
                                            },
                                            error: function () {
                                                alert("Kein Daten");
                                            }

                                        });

                                return false;

                            });


                        var myview = $(".myview");
                        myview.click(function()
                        {
                            window.open(this.href);
                             return false;
                        });




                        }); //end query

                    </script>


                    </body>
                    </html>



