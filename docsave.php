<?php  

ob_start() ;
session_start();
require_once('conn.php'); 
 		    
  //----------- LOGIN  ------------- 
  
  //$sUSRLOGIN  = $_SESSION["USERNAME"]; 
 
 //----------------- WORKING IN SAVE ZONE  -------------  

putenv("TZ=Asia/Bangkok"); //---set time zone

$CurDateTime =   date("Y-m-d H:i:s") ; 
$sGENYEAR    =   SUBSTR($DC = date('Y'),-2) ; 	
$sGENMONTH   =   date('m', strtotime("now"));	         

//--------------Paramiter ---------------

$EmpID      =   $_POST['EmpID'];   
$Zone       =   $_POST['Zone'];
$Warehouse  =   $_POST["Warehouse"];
$Qty        =   $_POST['Qty'];
$SN         =   $_POST['SN']; 
$Status     =   $_POST["Status"];  
$ProdType   =   $_POST["ProdType"]; 

//echo $EmpID.$Zone.$Warehouse.$Qty.$SN ;
 

  //------------- CHK BEFORE SAVE BY JOB ------------  
 
  if  (!isset($EmpID) || trim($EmpID)=='')   {	
    
      echo "<script>";
      echo "alert('PLEASE SCAN EMP-ID !!');";     
      echo "window.history.back()";
      echo "</script>"; 		
  }elseif (!isset($Zone) || trim($Zone)=='')   {	    
      echo "<script>";
      echo "alert('PLEASE SCAN ZONE!!');";     
      echo "window.history.back()";
      echo "</script>";
  }elseif (!isset($Warehouse) || trim($Warehouse)=='')   {	    
      echo "<script>";
      echo "alert('PLEASE SCAN WAREHOUSE !!');";       
      echo "window.history.back()";
      echo "</script>";
  }elseif (!isset($Qty) || trim($Qty)=='')   {	    
      echo "<script>";
      echo "alert('PLEASE SCAN QTY !!');";     
      echo "window.history.back()";
      echo "</script>";  		 		
  }elseif (!isset($SN) || trim($SN)=='')   {	    
      echo "<script>";
      echo "alert('PLEASE SCAN S/N !!');";     
      echo "window.history.back()";
      echo "</script>";  		
  }elseif (!isset($Status) || trim($Status)=='')   {	    
      echo "<script>";
      echo "alert('PLEASE SELECT STATUS IN/OUT !!');";     
      echo "window.history.back()";
      echo "</script>";  		 	
  }elseif (!isset($ProdType) || trim($ProdType)=='')   {	    
      echo "<script>";
      echo "alert('PLEASE SELECT PRODTYPE S/N / BAT !!');";     
      echo "window.history.back()";
      echo "</script>";  		

  }else{

    //------------- WORK IN SAVE ZONE ----------

          //-------- GEN TranID

          $sGENYEAR    =   SUBSTR($DC = date('Y'),-2) ;
          $strSQLGen = " SELECT LPAD( MAX( SUBSTR( TranID, 7, 5 ) ) +1 , 5 , 0 ) GenID FROM whtranms  WHERE SUBSTR( TranID,1, 6)  = 'WH-".$sGENYEAR."-'"  ;  


          $objQueryGen =  mysql_query($strSQLGen,$conn) or die ("Error Query [".$strSQLGen."]");
          $resultGen =  mysql_fetch_array($objQueryGen) ; 


          //------- GENERATE EPL NO-------    

          if ($resultGen['GenID']== null) {	
             $GenRunningNo  =  'WH-'.$sGENYEAR.'-'."00001" ;  // start new id 		 WH-24-00001
          }else{
             $GenRunningNo  =  'WH-'.$sGENYEAR.'-'.$resultGen['GenID'] ;          
          }


          //-------- INSERT DB ---------

          $sql = " INSERT INTO WHTRANMS ( TranID, EmpID , Zone , Warehouse , Qty , SN ,Status , ProdType , ScanDT   )
                   VALUES ( '".$GenRunningNo."' ,  '".$EmpID."' ,'".$Zone."' ,'".$Warehouse."','".$Qty."',
                   '".$SN."','".$Status."','".$ProdType."' ,  '".$CurDateTime."' )";

          $dbUPDATE = @mysql_db_query("dosprjdb",$sql) or die (mysql_error());


          if($dbUPDATE) { 
            //---- SAVE SUCCESS  
            echo ("<script language='JavaScript'>
            window.location.href='warehousetrans.php?TranID=$GenRunningNo';
            window.alert('Save successfully')  
            </script>");
          }else{  
            //---- SAVE FAIL 
            echo "<script type='text/javascript'>";
            echo "alert('Save fail !!!');";
            echo "window.location = 'frmPartRep.php'; ";
            echo "</script>";    
          }
 		     
  } //---END CHK SAVE ZONE 

  

?>