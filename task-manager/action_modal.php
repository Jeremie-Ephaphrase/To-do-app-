<!-- Delete -->
<div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete task</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid text-center">
				<h5>Are sure you want to delete</h5>
				<h2>Task <b><?php echo $row['task'].' '.$row['discription']; ?></b></h2> 
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Yes</a>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Task</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php?id=<?php echo $row['id']; ?>">
				<div class="row">
					<div class="col-lg-2">
						<label style="position:relative; top:7px;">Task</label>
					</div>
					<div class="col-lg-10">
						<input type="text" name="task" class="form-control" value="<?php echo $row['task']; ?>">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-lg-2">
						<label style="position:relative; top:7px;">Discription</label>
					</div>
					<div class="col-lg-10">
						<input type="text" name="discription" class="form-control" value="<?php echo $row['discription']; ?>">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-lg-2">
						<label style="position:relative; top:7px;">Due Date</label>
					</div>
					<div class="col-lg-10">
						<input type="date" name="date" class="form-control" value="<?php echo $row['date']; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" name="edit" class="btn btn-warning">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
<!-- /.modal -->