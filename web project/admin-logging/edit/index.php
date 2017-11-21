<?php

ob_start();

include('../login/session.php');
include('../session.php');
?>
<html>
<head><title> ADMIN AT VIPATH</title>

<style>
table a:hover{background:aqua;text-decoration:none;}
</style>
	<script src="../assets/js/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('tr th:nth-child(1)').hide();
    			$('tr td:nth-child(1)').hide();
		});


	</script>

	<script language="javascript" type="text/javascript">

	            function ajaxFunction(current_row,current_val,current_col)
			{



			if ($(".nonepty").val()=='') {
    alert("please enter anything");
}else{


	            	var ajaxRequest;
               		try
				{

            		      ajaxRequest = new XMLHttpRequest();
               		}
  		            catch (e)
				{

            		      try
					{
				            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                  		}
                              catch (e)
					{
				            try
						{
		 	                       ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                     			}
                                    catch (e)
						{

			                        alert("Your browser broke!");
                   				return false;
			                  }
		                  }
		            }

				ajaxRequest.onreadystatechange = function()
				{
		                  if(ajaxRequest.readyState == 4){
            		      var ajaxDisplay = document.getElementById('ajaxDiv');
                     		ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  	}
               	}

			var total_len=document.getElementById('imp_ref_len').value;

			var queryString = "?wrecord=" + current_row ;
                  queryString +=  "&wcolumn=" + current_col + "&wvalue=" + current_val;

	            ajaxRequest.open("GET", "updateoperation.php" + queryString, true);
      	      ajaxRequest.send(null);

            }
         	}
      </script>
</head>
<body>
	<div class="row affix-row">

		<div class="col-sm-9 col-md-10 affix-content">
			<div class="container">
				<div class="page-header">
					<?php
						$num_rec_per_page=5;
						include('../connection.php');
						$connection = new createConnection();
						$connection_ref = $connection->connectToDatabase();

						$selected_table_name=$_SESSION["tableName"];
					?><br>
					<button class="btn btn-success disabled text-uppercase"><span class="glyphicon glyphicon-folder-open"></span> <?php echo $selected_table_name;?></button>
				</div>
				<p>
					<?php
						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
						$start_from = ($page-1) * $num_rec_per_page;
						$sql = "SELECT * FROM ".$selected_table_name." LIMIT $start_from, $num_rec_per_page";
						$rs_result = mysqli_query ($connection_ref, $sql);
						if($rs_result === FALSE)
						{
    							die(mysqli_error());
						}
						$num_fields=mysqli_num_fields($rs_result);
						if(isset($_GET['id']))
						{
   							@mysqli_query($connection_ref, "DELETE FROM ".$selected_table_name." WHERE id = '".$_GET['id']."'");
   							header("location:index.php");
   							exit();
						}
					?>
					<div class="progress pull-right">
						<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
							<a href="../cancel.php" style="color:#fff;">CANCEL</a>
						</div>
					</div>
					<div class="panel panel-info">
						<div class="panel-body">
							<div class="progress">
  								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
    									<span class="sr-only">STATUS</span>
  								</div>
							</div>
							<div class="btn-group" role="group" aria-label="...">
								<button class="btn btn-default disabled">STATUS</button>
								<button class="btn btn-primary disabled">EDIT</button>
							</div>



							<div class="btn-group" role="group" style="float:right;" aria-label="...">
								<a href="../create" class="btn btn-primary">ADD</a>
							</div>







<div class="table-responsive">

							<table class="table table-striped colo-md-9" border="1">
							<thead>
								<tr>
									<?php
										$width=100/$num_fields;

											 $finfo = mysqli_fetch_fields($rs_result);
											 foreach($finfo as $v){
											 	$image_url = $v=="imageUrl"? true:false;
												echo "<th style='width:".$width."%'>".$v->name."</th>";
											 }


										echo "<th style='width:10%;'>action</th></tr></thead><tbody>";

while($row=mysqli_fetch_array($rs_result)) {

?>
            <tr>
			<?php
			for($l=0;$l<$num_fields;$l++)
			{
			?>
            		<td >
					<a data-toggle="modal" data-target="#myModal<?php echo $row[0];?>">
						<?php if($image_url)
											{
											echo "<img src='".$row[$l]."' width='100px' height='100px'/>";
											}
											else
											{
												echo $row[$l];
											}

?>
					</a>
				</td>
<?php
if($l== $num_fields-1){
echo "<td><a class='btn btn-danger' href='index.php?id=".$row[0]."'>delete</a></td>";
}


?>

  				<div class="modal fade" id="myModal<?php echo $row[0];?>" role="dialog">
    					<div class="modal-dialog modal-sm">
      					<div class="modal-content">
        						<div class="modal-body">
		<?php ?>
	      <p>
		<form name='myForm'>
		<input type="hidden" id="imp_ref_len" value="<?php echo $num_fields;?>">
		<?php

			for($w=0;$w<$num_fields;$w++)
			{
if($w==0)
{
continue;
}
				echo "<span class='glyphicon glyphicon-book'></span>";
			//	echo "<textarea class='form-control nonempty'  id=".$w."  onchange='ajaxFunction(".$row[0].",this.value,".$w.");' >".$row[$l+$w]."</textarea>";
echo "		<div id='ajaxDiv'></div>";

			}

		?>
		</form>
	</p>
        </div>
        <div class="modal-footer">


        </div>
      </div>
    </div>
  </div>
			<?php
			}
			?>
            </tr>
<?php
};
?>



</tbody>
							</table>
</div>

							<?php
								$sql = "SELECT * FROM ".$selected_table_name;
								$rs_result = mysqli_query($connection_ref,$sql);
								$total_records = mysqli_num_rows($rs_result);
								$total_pages = ceil($total_records / $num_rec_per_page);
							?>
							<button class="btn btn-warning disabled" type="button" style="background:#ec971f;"><?php echo $selected_table_name; ?> has <span class="badge"><?php echo $total_records; ?></span> entries</button>
							<ul class="pagination pagination-sm pull-right">
								<?php
									echo "<li><a href='index.php?page=1'>".'|'."<span class='glyphicon glyphicon-chevron-left'></span></a></li> ";
									for ($i=1; $i<=$total_pages; $i++)
									{
            								echo "<li><a href='index.php?page=".$i."'>".$i."</a></li> ";
									}
									echo "<li><a href='index.php?page=$total_pages'><span class='glyphicon glyphicon-chevron-right'></span>".'|'."</a> </li>";
								?>
							</ul>
						</div>
					</div>
				</p>
			</div>
		</div>
	</div>

	<script src="../assets/js/bootstrap.js"></script>
<script>
$(document).ready(function() {
    $("#MyModal").modal();
  });
</script>
</body>
</html>
