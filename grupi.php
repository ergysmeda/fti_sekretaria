<!DOCTYPE html>
<?php
include_once 'header.php';
include_once 'sek_header.php';

if (isset($_POST['niveli']) && isset($_POST['dega']) && isset($_POST['viti']) && isset($_POST['grupi'])) {
    $error = "";
    $niveli = $_POST["niveli"];
    $viti = $_POST['viti'];
    $dega = $_POST['dega'];
    $grupi = sanitizeString($_POST['grupi']);
    if (($niveli == "") && ($dega == "") && ($viti == "") && ($grupi == ""))
        $error = 'Nuk jane futur gjithe te dhenat<br><br>';
    else {
        $result = queryMysql("SELECT * FROM student_klase WHERE niveli='$niveli' AND dega='$dega' AND viti='$viti' AND grupi='$grupi'");
        $rowCount = $result->num_rows;
        if ($rowCount != 0)
            $error = 'Eshte nje klase e tille e regjistruar.<br><br>';
        else {
            if (queryMysql("INSERT INTO student_klase (niveli,dega,viti,grupi) VALUES('$niveli', '$dega','$viti','$grupi')"))
                echo("U ruajt klasa $niveli|$dega|$viti|$grupi");
            else {
                echo "Gabim:$error";
            }
        }
    }

}
if (isset($_POST['butoni_fshirjes'])) {
    $id = $_POST['fshij_id'];
    echo $id;
    $fshijQuery = "DELETE FROM student_klase WHERE student_klase_id ='$id'";
    $result = queryMysql($fshijQuery);
}

?>
<html>
<head>
    <meta charset="utf-8">
    <title>Student</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sekretaria.css">
    <script src="student.js"></script>
</head>
<body>
<!-------------------------HEADER--------------------------------------->
<header>
    <input id="submit-navbar" type="submit" name="" value="Logout">
</header>

<div class="sidebar">
    <a href="sek_header.php">Sekretaria Mesimore</a>
    <a href="student.php">Student</a>
    <a href="pedagog.php">Pedagog</a>
    <a href="lendet.php">Lendet</a>
    <a class="active" href="grupi.php">Klasa</a>
    <a href="vertetime.php">Vertetime</a>
</div>

<div class="content">
    <strong><span class="spantxt"> Klasa </span></strong>

    <form method="post" action="grupi.php" align="center" cellpadding="40">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <input type="text" class="form-control" name="searchField" id="searchField"
                                   placeholder="Kerko">
                        </div>
                    </div>
                    <input type="submit" value="Kerko" name="submitSearch" class="btn btn-primary">
                </div>
            </div>

    </form>
    <hr>
    <button type="button" data-toggle="modal" data-target="#id01" style="width:auto;">Klasa</button>
    <br><br><br><br>

    <table align="center" cellpadding="40" border="1px" class="tabela1">
        <thead>
        <tr>
            <th colspan="5"><i><b>Grupet</b></i></th>
        </tr>
        </thead>
        <tr>
            <th><b>Niveli</b></th>
            <th><b>Dega</b></th>
            <th><b>Viti</b></th>
            <th colspan="2"><b>Klasa</b></th>
        </tr>
        <?php
        $showTableQuery = "SELECT * FROM student_klase ORDER BY niveli ASC, dega ASC, viti ASC, grupi ASC";

        if (isset($_POST['submitSearch'])) {
            $search = sanitizeString($_POST['searchField']);
            $searchQuery = "SELECT * FROM student_klase WHERE niveli LIKE '%$search%' OR dega LIKE '%$search%' ORDER BY niveli ASC, dega ASC, viti ASC, grupi ASC";
            $searchResult = queryMysql($searchQuery);
            while ($row = $searchResult->fetch_assoc()) {
                echo "<tr><td>" . $row['niveli'] . "</td>";
                echo "<td>" . $row['dega'] . "</td>";
                echo "<td>" . $row['viti'] . "</td>";
                echo "<td>" . $row['grupi'] . "</td>";
                ?>
                <td>
                    <button type="button" onClick="updateInput(<?php echo $row['student_klase_id']; ?>);"
                            class="btn btn-primary" data-toggle="modal" data-target="#fshij">
                        Fshij
                    </button>

                </td>
                </tr>

                <?php


            }

        } else {
            $tableResult = queryMysql($showTableQuery);
            while ($row = $tableResult->fetch_assoc()) {
                echo "<tr><td>" . $row['niveli'] . "</td>";
                echo "<td>" . $row['dega'] . "</td>";
                echo "<td>" . $row['viti'] . "</td>";
                echo "<td>" . $row['grupi'] . "</td>";
                ?>

                <td>
                    <button type="button" onClick="updateInput(<?php echo $row['student_klase_id']; ?>);"
                            class="btn btn-primary" data-toggle="modal" data-target="#fshij">
                        Fshij
                    </button>

                </td>
                </tr>
                <?php
            }
        }
        ?>
        <div class="modal" id="fshij" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Po fshini</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning" role="alert">
                            A jeni te sigurte qe doni ta fshini??
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="grupi.php" method="post">
                            <input type="hidden" name="fshij_id" id="fshij_id">
                            <input type="submit" name="butoni_fshirjes" value="Fshije" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </table>
    <br><br><br>

</div>

<div id="id01" class="modal">

    <form class="modal-content animate" action="grupi.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="studenti.png" alt="Avatar" class="avatar">
        </div>

        <!-------------------------Vertetime --------------------------------->
        <div class="container">
            <h3 id="regjistrimi">REGJISTRIMI I GRUPIT</h3>
            <table align="center" cellpadding="10">

                <br><br>
                <!----- Course ---------------------------------------------------------->
                <tr>
                    <td>Dega</td>
                    <td>
                        Ing.Informatike <input type="radio" name="dega" value="Inxhinieri Informatike"/>
                        Ing.Elektronike <input type="radio" name="dega" value="Inxhineri Elektronike"/>
                        Ing.Telekomunikacioni <input type="radio" name="dega" value="Inxhinieri Telekomunikacioni"/>
                    </td>
                </tr>

                <!----- Course ---------------------------------------------------------->
                <tr>

                    <td> Niveli</td>
                    <td>

                        Bachelor <input type="radio" name="niveli" value="Bachelor"/>
                        Msc. Shkencor <input type="radio" name="niveli" value="Master Shkencor"/>
                        Msc. Profesional <input type="radio" name="niveli" value="Master Profesional"/>
                    </td>
                </tr>

                <!----------------------Student i Bachelorit------------------->
                <tr>
                    <td> Viti Akademik</td>
                    <td>
                        <select name="viti" id="viti">
                            <option value="1">Viti 1</option>
                            <option value="2">Viti 2</option>
                            <option value="3">Viti 3</option>
                        </select>
                    </td>
                </tr>
                <!----- Grupi -------------------------------------------------------------------->
                <tr>
                    <td>Grupi</td>
                    <td><input type="text" name="grupi" maxlength="1"/>
                </tr>
                <!---------------------------Submit/Reset----------------------------------->
                <tr>
                    <td colspan="2" align="center">
                        <input class="btn" type="submit" value="Submit">
                        <input class="btn" type="reset" value="Reset">
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="right">
                        <button type="bt" onclick="document.getElementById('id01').style.display='none'"
                                class="cancelbtn">Cancel
                        </button>
                    </td>
                </tr>

            </table>
        </div>
    </form>

</div>
<script>
    function updateInput(id) {
        document.getElementById("fshij_id").value = id;
    }
</script>

</body>
</html>