<!DOCTYPE html>
<?php
include_once 'header.php';
include_once 'sek_header.php';

if (isset($_POST['submitForma'])) {
    $error = "";

    $emri = sanitizeString($_POST['emri']);
    $mbiemri = sanitizeString($_POST['mbiemri']);
    $emer_mbiemer = $emri . " " . $mbiemri;
    $atesia = sanitizeString($_POST['atesia']);
    $month = $_POST['month'];
    $dt = $_POST['dt'];
    $year = $_POST['year'];
    $timestamp = strtotime($dt . '/' . $month . '/' . $year);
    $date = date('Y/M/j ', $timestamp);
    $date = str_replace('/', '-', $date);
    $date=date('Y-m-d', strtotime($date));
    $email = sanitizeString($_POST['email']);
    $cel = sanitizeString($_POST['cel']);
    $gjinia = $_POST['gjinia'];
    $roli = 'student';
    $klasa_id = ($_POST['klasa']);
    $pass= generateRandomString();
    $password = passwordify($pass);
    $status = "aktiv";
    $kredite = 0;
    $adresa = 'Tirane';
    if (($emri == "") && ($mbiemri == "") && ($atesia == "") && ($email == "") && ($date == "") && ($cel == "") && ($gjinia == "") && ($password == ""))
        $error = 'Nuk jane futur gjithe te dhenat<br><br>';
    else {
        $result = queryMysql("SELECT * FROM user WHERE user_email='$email'");
        $rowCount = $result->num_rows;
        $insertUserQuery = "INSERT INTO user (user_email,user_password,user_role,user_emri,user_mbiemri) VALUES('$email', '$password','$roli','$emri','$mbiemri')";
        $insertStudentQuery = "INSERT INTO student (student_email, emer_mbiemer,student_klase_id,student_adresa,cel,atesia, dob, gjinia, status, kredite) VALUES('$email', '$emer_mbiemer','$klasa_id','$adresa','$cel','$atesia','$date','$gjinia','$status','$kredite')";
        if ($rowCount != 0)
            $error = 'Eshte nje student i regjistruar me kete email.<br><br>';
        else {
            if (queryMysql($insertUserQuery) && queryMysql($insertStudentQuery)) {
                echo("U ruajt studenti");
                mail("$email",'Regjistrimi',"I nderuar $emer_mbiemer, passwordi juaj eshte: $pass!",'Sekretaria FTI');
            } else {
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
    <a class="active" href="student.php">Student</a>
    <a href="pedagog.php">Pedagog</a>
    <a href="lendet.php">Lendet</a>
    <a href="grupi.php">Klasa</a>
    <a href="vertetime.php">Vertetime</a>
</div>

<div class="content">
    <strong><span class="spantxt"> Menaxhimi Studentit </span></strong>
    <hr>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Regjistro Student
    </button>

    <br><br><br> <br><br>
    <table align="center" cellpadding="40" border="1px" id="tabela_1" class="tabela1">
        <tr>
            <th><b>ID</b></th>
            <th><b>Emri</b></th>
            <th><b>Mbiemri</b></th>
            <th><b>Dega</b></th>
            <th><b>Viti</b></th>
            <th><b>Grupi</b></th>
        </tr>
        <tr>
            <td>1.</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>2.</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br><br>

</div>

<div id="id01" class="modal">

    <form class="modal-content animate" action="student.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="studenti.png" alt="Avatar" class="avatar">
        </div>

        <!-------------------------REGJISTRIMI STUDENTIT --------------------------------->
        <div class="container">
            <h3 id="regjistrimi">REGJISTRIMI I STUDENTIT</h3>
            <table align="center" cellpadding="10">

                <!----- First Name ---------------------------------------------------------->
                <tr>
                    <td>Emri*</td>
                    <td><input type="text" name="emri" maxlength="30" required/>
                    </td>
                </tr>


                <!----- Last Name ---------------------------------------------------------->
                <tr>
                    <td>Mbiemri*</td>
                    <td><input type="text" name="mbiemri" maxlength="30" required/>
                    </td>
                </tr>

                <!----- Father Name---------------------------------------------------------->
                <tr>
                    <td>Atesia</td>
                    <td><input type="text" name="atesia" maxlength="30" required/>
                    </td>
                </tr>


                <!----- Date Of Birth -------------------------------------------------------->
                <tr>
                    <td>Ditelindja</td>
                    <td>
                        <select name="dt" id="dt">
                            <option>Dita:</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>

                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>

                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>

                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>

                            <option value="31">31</option>
                        </select>

                        <select id="month" name="month">
                            <option value="-1">Muaji:</option>
                            <option value="1">Janar</option>
                            <option value="2">Shkurt</option>
                            <option value="3">Mars</option>
                            <option value="4">Prill</option>
                            <option value="5">Maj</option>
                            <option value="6">Qershor</option>
                            <option value="7">Korrik</option>
                            <option value="8">Gusht</option>
                            <option value="9">Shtator</option>
                            <option value="10">Tetor</option>
                            <option value="11">Nentor</option>
                            <option value="12">Dhjetor</option>
                        </select>

                        <select name="year" id="year">
                            <option value="-1">Viti:</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>

                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>

                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                        </select>
                    </td>
                </tr>

                <!----- Email Id ------------------------------------------------->
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" maxlength="30"/>
                    </td>
                </tr>

                <!----- Mobile Number ---------------------------------------------------------->
                <tr>
                    <td>Nr. Telefonit/ Cel.</td>
                    <td>
                        <input type="text" name="cel" maxlength="10" pattern="\d{10}\"
                               placeholder="06xxxxxxxx">

                    </td>
                </tr>

                <!----- Gender -------------------------------------------------------------------->
                <tr>
                    <td>Gjinia</td>
                    <td> Mashkull <input type="radio" name="gjinia" value="M"/>
                        Femer <input type="radio" name="gjinia" value="F"/>
                    </td>
                </tr>

                <tr>
                    <td> Klasa</td>
                    <td>
                        <?php
                        $result = queryMysql("SELECT * FROM student_klase");
                        $rowCount = $result->num_rows;
                        echo "<select name='klasa'>";
                        while ($row = $result->fetch_assoc()) {
                            $emri = $row['niveli'] . ':' . $row['dega'] . ' ' . $row['viti'] . ' ' . $row['grupi'];
                            echo "<option value='" . $row['student_klase_id'] . "'>" . $emri . "</option>";
                        }
                        echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td> Viti Akademik</td>
                    <td>
                        <input type="text" name="grupi" maxlength="1"/>
                    </td>
                </tr>
                <!---------------------------Submit/Reset----------------------------------->
                <tr>
                    <td colspan="2" align="center">
                        <input class="bttn" type="submit" name="submitForma" value="Submit">
                        <input class="bttn" type="reset" value="Reset">
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


</body>
</html>