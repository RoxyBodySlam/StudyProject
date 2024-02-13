
<?php   
//	ob_start() ; 
//    session_start(); 
    require_once('conn.php'); 

?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Form Register</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 

<style>
    .box {
        width: 50%;
        height: 30;
        float: left;
        margin-right: 0.5rem;
    }

    .box2 {
        width: 50%;
        height: 40;
        float: left;
        margin-right: 0.5rem;
    }
    .box3 {
        width: 50%;       
        float: left;
        margin-right: 0.5rem;
    }
    .red { background-color: red; }
    .green { background-color: #20B159; }
    .blue { background-color: blue; }
    .white { background-color: gray; }

    .fhead{
		font-size: 15px;
		color:black;   
    
	  }
    .fhead2{
		font-size: 15px;
		color:red;   
    
	  }
 
    .fcopy{
		font-size: 12px;
		color:white;
	  }

    .fresult{
		font-size: 16px;
		color:#20B159;   
	  }

    .fradio{
		font-size: 15px;
		color:#20B159;   
	  }

    .fradio2{
		font-size: 15px;
		color:#20B159;   
    font-weight :bold;  
	  }
   

</style>    

<script>
    function clearTextBox() {       
        document.getElementById("EmpID").value = "";        
        document.getElementById("EmpID").focus();
        document.getElementById("Warehouse").value = "";    
        document.getElementById("Zone").value = "";        
        document.getElementById("SN").value = "";
        document.getElementById("Qty").value = "1";     
      }
</script>
</head>
<body>


<div class="container" >
	<div class="row" >

  <!-- doslogo   -->

  <div class="box green">
  <div class="headerlogo four columns">
		<div class="logo" >

	 <!--  <a href="https://dos.co.th" target="_blank"  class="logo"> &nbsp;&nbsp;&nbsp;<img  src="logo.png" width="100" alt="page title Dos"></a>		-->
    <a href="https://dos.co.th" target="_blank"  class="logo"> &nbsp;&nbsp;&nbsp;<img  src="TR_LOGO.png" width="100" alt="page title Dos"></a>		
    
    
    
		</div>
	</div>
  </div>  
  <div class="col-md-7 col-xs-12" > 
    
  
<form  name="warehousetrans" action="docsave.php" method="POST" id="register" class="form-horizontal">
<?php 
 //----------- GET PARAMITER   ------------	   

$pTranID  =  $_GET["TranID"];
 
//------------ Show Previous Data  ------      

 $strWH = " SELECT *FROM   WHTRANMS   WHERE  TRANID = '".$pTranID."'";   
                     
$objWH = mysql_query($strWH,$conn) or die ("Error Query [".$strWH."]");
$resultWHS  =  mysql_fetch_array($objWH) ;

$EmpID  =  $resultWHS['EmpID']; 
$Warehouse =  $resultWHS['Warehouse']; 
$Zone  =  $resultWHS['Zone']; 	 
$SN        =  $resultWHS['SN'];
$Status   =  $resultWHS['Status']; 
$ProdType   =  $resultWHS['ProdType']; 
$Qty  =  1 ; //--Set default qty 1

if (!isset($pTranID) || trim($pTranID)=='') {
  $result ='';
}else{
  $result  = 'Previous Data : S/N : '.$SN.' || WH : '.$Warehouse.' || Zone : '.$Zone ;
}
?> 


<div class="form-group">       
<br>  

  <div class="form-group">
    <div class="col-sm-9" align="left"><font class  = "fresult">  <?php echo $result ?></font></div> 
  </div>

 
  <!--   STATUS && TYPE Radio  -->
  <div class="form-group">
    <div class="col-sm-8" align="right"> <font class = "fhead2">  Status :</font> &nbsp;&nbsp;          
    <input type="radio" id="Status" name="Status" value="IN" style="height:25px; width:25px; vertical-align: center;"checked >
    <label for="Status"><font class  = "fradio">IN</font></label>&nbsp;&nbsp;
    <input type="radio" id="Status" name="Status" value="OUT"  style="height:25px; width:25px; vertical-align: center;">
    <label for="Status"<font class  = "fradio">OUT</font></label> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;            
    
    <font class = "fhead2"> Type :</font>
    <input type="radio" id="ProdType" name="ProdType" value="SN" style="height:25px; width:25px; vertical-align: center;"checked >
    <label for="ProdType"><font class  = "fradio">S/N</font></label>&nbsp;&nbsp;
    <input type="radio" id="ProdType" name="ProdType" value="BAT" style="height:25px; width:25px; vertical-align: center;">
    <label for="ProdType"<font class  = "fradio">BAT</font></label>                  
    
    </div>

</div>

 
<!------ End Chk Radio   ----> 
    <div class="col-sm-5" align="left">        
       </div>   

       <input name="Admin_level" type="hidden" id="Admin_level" value="2" />
       </div>
       <div class="form-group">
       	<div class="col-sm-2" align="right"><font class = "fhead">Emp ID: </div></font>
          <div class="col-sm-7" align="left">

           <!-- Set Cursor On Load--->
            <?php if   (!isset($pTranID) || trim($pTranID)=='') {?>
                 <input  name="EmpID" type="text" required class="form-control" autofocus  id="EmpID"  style="  height:45px; " value= <?php echo $resultWHS['EmpID'];?> >
           <?php }else{ ?>
                <input  name="EmpID" type="text" required class="form-control"  id="EmpID"  style="  height:45px; " value= <?php echo $resultWHS['EmpID'];?> >
           <?php }?>
        
             </div>
       </div>
      
        
        <div class="form-group">
        <div class="col-sm-2" align="right"><font class = "fhead" >Warehouse:  </div></font>
          <div class="col-sm-7" align="left">
            <input  name="Warehouse" type="text" required class="form-control" id="Warehouse" style="  height:45px;"  value= <?php echo $resultWHS['Warehouse'] ;?> >
          </div>
        </div>
 

        <div class="form-group"> 
        <div class="col-sm-2" align="right"> <font class = "fhead" >Zone: </div></font>
          <div class="col-sm-7" align="left">
            <input  name="Zone" type="text" required class="form-control" id="Zone"  style="  height:45px; "  value= <?php echo $resultWHS['Zone'] ;?> >
          </div>
        </div>

        <div class="form-group">
        <div class="col-sm-2" align="right"> <font class = "fhead" >Qty: </div></font>
          <div class="col-sm-7" align="left">
            <input  name="Qty" type="text" required class="form-control" id="Qty"  style="  height:45px; " value= <?php echo $resultWHS['Qty'];?>>
          </div>
        </div>


        <div class="form-group">
        <div class="col-sm-2" align="right"> <font class = "fhead" >S/N: </div></font>
          <div class="col-sm-7" align="left">

           <!-- Set Cursor After Save --->
            <?php if   (!isset($pTranID) || trim($pTranID)==''){?>
                 <input  name="SN" type="text" required class="form-control"   id="SN"  style="  height:45px; "  >
           <?php }else{ ?>
                <input  name="SN" type="text" required class="form-control" autofocus  id="SN"  style="  height:45px; "  >
           <?php }?>
 
          </div>
        </div> 

         
        
      <div class="form-group">
      <div class="col-sm-2"> </div>
          <div class="col-sm-6">
          <button type="submit" class="btn btn-primary" id="btn" style="width:140px;height:40px;" >  Save  </button>
          <button type="button" class="btn btn-danger" id="btn" style="width:140px;height:40px;" onclick="clearTextBox()" > Clear </button>  
        </div>          
      </div>

       </form>
     </div>
      
 

      <!-- footer-->

     <div class="box2 green">
      <div class="headerlogo four columns">
      <div class="logo" >
      <font class =  "fcopy" > © 2024 DOS l All Rights Reserved</font> <br><br>
      </div>
      </div>



</div>




</div>

	
</body>
</html>