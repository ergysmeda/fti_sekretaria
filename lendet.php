<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student</title>
	<link rel="stylesheet" type="text/css" href="sekretaria.css">
	<script src="student.js"></script>
</head>
<body>
<!-------------------------HEADER--------------------------------------->    
    <header>
        <input id="submit-navbar" type="submit" name="" value="Logout">    
    </header>
	<div class="sidebar" >
		<a href="sek_header.php">Sekretaria Mesimore</a>
		<a href="student.php">Student</a>
		<a href="pedagog.php">Pedagog</a>
		<a class="active" href="lendet.php">Lendet</a>
		<a href="grupi.php">Klasa</a>
		<a href="vertetime.php">Vertetime</a>
	</div>

    <div class="content">
	    <strong><span class="spantxt"> Lenda </span></strong>
		<hr>	
	    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Shto Lend</button>

        <br><br><br><br>
        <table align="center" cellpadding="40" border="1px" class="tabela1">
        <tr><th colspan="2"><i><strong>Viti 1</strong></i></th></tr>
          <tr>
            <th><b>Lenda</b></th>
            <th><b>Dega</b></th>
          </tr> 
          <tr>          
           <td>  </td>
           <td>  </td>
          </tr>
          <tr>
           <td>  </td>
           <td>  </td>
          </tr>
          <tr>
           <td>  </td>
           <td>  </td>
          </tr>
          <tr>
           <td>  </td>
           <td>  </td>
          </tr>
</table>
<br><br><br>
<table align="center" cellpadding="40" border="1px" class="tabela1">
     <thead>
        <tr><th colspan="2"><i><strong>Viti 2</strong></i></th></tr>
          <tr>
            <th><b>Lenda</b></th>
            <th><b>Dega</b></th>
          </tr> 
          <tr>          
           <td>  </td>
           <td>  </td>
          </tr>
          <tr>
           <td>  </td>
           <td>  </td>
          </tr>
          <tr>
           <td>  </td>
           <td>  </td>
          </tr>
          <tr>
           <td>  </td>
           <td>  </td>
          </tr>
</table>
<br><br><br>
<table align="center" cellpadding="40" border="1px" class="tabela1">
     <thead>
        <tr><th colspan="2"><i><strong>Viti 3</strong></i></th></tr>
          <tr>
            <th><b>Lenda</b></th>
            <th><b>Dega</b></th>
          </tr> 
          <tr>          
           <td>  </td>
           <td>  </td>
          </tr>
          <tr>
           <td>  </td>
           <td>  </td>
          </tr>
          <tr>
           <td>  </td>
           <td>  </td>
          </tr>
          <tr>
           <td>  </td>
           <td>  </td>
          </tr>
</table>
</div>

<div id="id01" class="modal">
  
    <form class="modal-content animate" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="studenti.png" alt="Avatar" class="avatar" >
        </div>

<!-------------------------REGJISTRIMI STUDENTIT --------------------------------->
        <div class="container">
     	    <h3 id="regjistrimi">Shto Lende</h3>
            <table align="center" cellpadding = "10">
 
<!----- First Name ---------------------------------------------------------->
            <tr>
                <td>Emri Lendes</td>
                <td><input type="text" name="First_Name" maxlength="100" required/>
                </td>
            </tr>

             <tr>
            <td colspan="2" align="center">
                <input class="bttn" type="submit" value="Submit">
                <input class="bttn" type="reset" value="Reset">
           </td>
        </tr>

        <tr>
           	<td colspan="2" align="right">
           		  <button type="bt" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
           	</td>
        </tr>

    </table>  
    </div>          
   </form>
 
</div>


   
</body>
</html>