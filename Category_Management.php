    <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
  
    <?php
    if (!isset($_SESSION['admin'])or $_SESSION['admin']==0)
    {
      echo "<script>alert('You are not adminstrator or still not logged yet!!')</script>";
      echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    }
    else
    {
    ?>
        <script>
        function deleteConfirm(){
            if(confirm("Are you sure to delete?")){
                return true;
            }
            else{
                return false;
            }
        }
        </script>
        
         <?php
        include_once("connection.php");
        if(isset($_GET["function"])=='del'){
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                mysqli_query($conn,"delete from category where Cat_ID='$id'");
            }
        }
        ?>
        <form name="frm" method="post" action="">
        <h1>Category Management<h1>
            <h5>
            <img src="images1/add.png" width="16" height="16" border="0" /><a href="?page=add_category">Add new</a>
            </h5>
        
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Category Name</strong></th>
                     <th><strong>Description</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
            $No=1;
            $result=mysqli_query($conn,"Select * from category");
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
            ?>
			<tr>
              <td class="cotCheckBox"><?php echo $No;?></td>
              <td><?php echo $row["Cat_Name"];?></td>
              <td><?php echo $row["Cat_Des"];?></td>
              <td style='text-align:center'><a href="?page=update_category&&function=del&&id=<?php echo $row["Cat_ID"];?>"><img src='images1/edit.png' border='0'></a></td>
              <td style='text-align:center'><a href="?page=category_management&&function=del&&id=<?php echo $row["Cat_ID"];?>" onclick="deleteConfirm()"><img src='images1/delete.png' border='0'></a></td>
            </tr>
            <?php $No++;}?>
			</tbody>
        </table>  
        
        <!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	
            </div>
        </div><!--Nút chức nang-->
 </form>
 <?php
    }
 ?>
   