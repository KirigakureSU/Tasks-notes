<?php
 include("db.php");

 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
 }


if (isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query = "UPDATE tasks set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Task Update Successfully';
    $_SESSION['message_type'] = 'warning';
    header("location: index.php");
}
?>

<?php include("includes/header.php") ?>
<div class="container p4"> 
    <div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card card-body">
        <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
                <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update title">
            </div>
            <div class="form-group">
                <textarea name="description" rows="2" class="form-control" placeholder="Update description"><?php echo $description;?></textarea>
                <button name="update" class="btn btn-success">
                    Update
                </button>
            </div>
        </form> 
        </div>

    </div>
    </div>
</div>

<?php include("includes/footer.php")?>