<?php   require_once 'functions.php';
session_start();
?>
<head>
	<title>Pedagog</title>
	<link rel="stylesheet" type="text/css" href="sekretaria.css">
	<script type="text/javascript" src="student.js"></script>
</head>
    <header>
        <input id="submit-navbar" type="submit" name="" value="Logout">
            
    </header>
<nav>
	<div class="sidebar" >
		<a href="sek_header.php">Sekretaria Mesimore</a>
		<a href="student.php">Student</a>
		<a class="active" href="pedagog.php">Pedagog</a>
		<a href="lendet.php">Lendet</a>
		<a href="grupi.php">Klasa</a>
		<a href="vertetime.php">Vertetime</a>
	</div>
</nav>
	<div class="content">
	    <strong><span class="spantxt">Menaxhimi Pedagogut </span></strong>
		<hr>	
	    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Regjistro Pedagog</button>
	     <br><br><br><br>
    <table align="center" cellpadding="40" border="1px" class="tabela1">
        <tr>
            <th><b>ID</b></th>
            <th><b>Emri</b></th>
            <th><b>Mbiemri</b></th>          
            <th><b>Lenda qe jep</b></th>
        </tr>
        <tr>
           <td>1.  </td>
           <td>  </td>
           <td>  </td>
           <td>  </td>
        </tr>
        <tr>
           <td>2.  </td>
           <td>  </td>
           <td>  </td>
           <td>  </td>
        </tr>
   </table> 
	</div> 
  
<div id="id01" class="modal">
  
    <form class="modal-content animate" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="profesor.png" alt="Avatar" class="avatar" >
        </div>

<!-------------------------REGJISTRIMI PEDAGOGUT--------------------------------->
        <div class="container">
     	    <h3 id="regjistrimi">REGJISTRIMI I PEDAGOGUT</h3>
            <table align="center" cellpadding = "10">
 
<!----- First Name ---------------------------------------------------------->
            <tr>
                <td>Emri*</td>
                <td><input type="text" name="First_Name" maxlength="30" required/>
                </td>
            </tr>


<!----- Last Name ---------------------------------------------------------->
            <tr>
                <td>Mbiemri*</td>
                <td><input type="text" name="Last_Name" maxlength="30" required />
                </td>
            </tr>


                 
<!----- Email Id ------------------------------------------------->
        <tr>
            <td>Email</td>
            <td>
        	    <input type="email" name="Email_Id" maxlength="100" />    
            </td>
        </tr>
 
<!----- Mobile Number ---------------------------------------------------------->
        <tr>
            <td>Nr. Telefonit/ Cel.</td>
            <td>
                <input type="tel" name="Mobile_Number" maxlength="10" pattern="\(\d{3}\) +\d{3}-\d{4}" placeholder="(###) ###-#####" />
 
            </td>
        </tr>
 <!----- Email Id ------------------------------------------------->
        <tr>
            <td>Adresa</td>
            <td>
        	    <input type="text" name="Email_Id" maxlength="100" />    
            </td>
        </tr>
<!----- Gender -------------------------------------------------------------------->
        <tr>
            <td>Gjinia</td>
            <td> Mashkull <input type="radio" name="Gender" value="Male" />
            Femer <input type="radio" name="Gender" value="Female" />
            </td>
        </tr>
 <!----- Roli---------------------------------------------------------->
            <tr>
                <td>Roli</td>
                <td><input type="text" name="Roli" maxlength="30" required />
                </td>
            </tr>
 <!----- Titulli---------------------------------------------------------->
            <tr>
                <td>Titulli</td>
                <td><input type="text" name="First_Name" maxlength="30" required />
                </td>
            </tr>
 <!----- Roli---------------------------------------------------------->
            <tr>
                <td>Lenda</td>
                <td><input type="text" name="Roli" maxlength="30" required />
                </td>
            </tr>           
 

<!----- Course ---------------------------------------------------------->
        <tr>
            <td>Dega ku jep mesim  </td>
            <td>
	            Ing.Informatike <input type="radio" name="Dega_info" value="Infor" />
                Ing.Elektronike <input type="radio" name="Dega_elektro" value="Elektro" />
                Ing.Telekomunikacioni <input type="radio" name="Dega_telekom" value="Telekom" />
            </td>
        </tr>
       
<!----- Course ---------------------------------------------------------->
        <tr>
            
            <td> </td>
            <td>

	            Bachelor <input type="radio" name="Bach" value="Bach" />
                Msc. Shkencor <input type="radio" name="Msc_shkenc" value="Shkenc" />
                Msc. Profesional <input type="radio" name="Msc_prof" value="Prof" />
            </td>
        </tr>
 
<!----------------------Student i Bachelorit------------------->
        <tr>
	        <td> Viti Akademik</td>
	            <td>
	               <select name="viti" id="Viti">
                       <option value="0">Viti :</option>
                       <option value="1">Viti 1</option>
                       <option value="2">Viti 2</option>
                       <option value="3">Viti 3 </option>
                   </select>
                </td>
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
           		  <button type="bt" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
           	</td>
        </tr>

    </table>  
    </div>          
   </form>
 
</div>

	   

</body>
</html>