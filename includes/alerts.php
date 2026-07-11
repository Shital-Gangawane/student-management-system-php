 <?php

if(isset($_GET['msg']))
{
    if($_GET['msg']=="added")
    {
        echo '<div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle-fill"></i>
        Student Added Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>';
    }

    if($_GET['msg']=="updated")
    {
        echo '<div class="alert alert-warning alert-dismissible fade show">
        <i class="bi bi-pencil-square"></i>
        Student Updated Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>';
    }

    if($_GET['msg']=="deleted")
    {
        echo '<div class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-trash-fill"></i>
        Student Deleted Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>';
    }
}
?>
