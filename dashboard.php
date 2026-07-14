<?php

include "session.php";
// Database Connection
include "db.php";
include "includes/header.php";
include "includes/sidebar.php";

?>


<?php

// Total Students
$count_sql = "SELECT COUNT(*) AS total FROM students";
$count_result = mysqli_query($conn, $count_sql);
$count_row = mysqli_fetch_assoc($count_result);
$totalStudents = $count_row['total'];

// Total Courses
$course_sql = "SELECT COUNT(DISTINCT course) AS total_courses FROM students";
$course_result = mysqli_query($conn, $course_sql);
$course_row = mysqli_fetch_assoc($course_result);
$totalCourses = $course_row['total_courses'];

$limit = 5;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$start = ($page - 1) * $limit;

// Search Query
$search = "";

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);

    $sql = "SELECT * FROM students
            WHERE name LIKE '%$search%'
            OR email LIKE '%$search%'
            OR course LIKE '%$search%'
            LIMIT $start, $limit";
} else {
    $sql = "SELECT * FROM students LIMIT $start, $limit";
}

//pagination
// Total Records
if (!empty($search)) {
    $countQuery = "SELECT COUNT(*) AS total FROM students
                   WHERE name LIKE '%$search%'
                   OR email LIKE '%$search%'
                   OR course LIKE '%$search%'";
} else {
    $countQuery = "SELECT COUNT(*) AS total FROM students";
}

$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);

$totalRecords = $countRow['total'];
$totalPages = ceil($totalRecords / $limit);



//Fetch Students
$result = mysqli_query($conn, $sql);

?>

<!-- Sidebar -->

<!-- Main Content -->

<div class="content">

    <!-- Navbar -->

    <?php include "includes/navbar.php"; ?>

    <div class="container-fluid p-4">


        <!-- Dashboard Card -->

        <div class="row mb-4">

            <div class="col-lg-4 col-md-6">

                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">

                                    Total Students

                                </h6>

                                <h2 class="fw-bold text-primary">

                                    <?php echo $totalStudents; ?>

                                </h2>

                            </div>

                            <div class="bg-primary text-white rounded-circle p-3">

                                <i class="bi bi-people-fill fs-2"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!---- Total Courses ----->

            <div class="col-lg-4 col-md-6">

                <div class="card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h6 class="text-muted">Total Courses</h6>

                                <h2 class="fw-bold text-success">
                                    <?php echo $totalCourses; ?>
                                </h2>

                            </div>

                            <div class="bg-success text-white rounded-circle p-3">

                                <i class="bi bi-book-fill fs-2"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- alert --->
        <?php include "includes/alerts.php"; ?>



        <!-- Student Table -->

        <div class="card">

            <div class="card-header bg-white border-0 py-3">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    <h4 class="mb-0 fw-bold">

                        Student List

                    </h4>

                    <div class="d-flex align-items-center gap-2 flex-wrap">

                        <!-- Search Form -->

                        <form method="GET" class="d-flex">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search Student..."
                                value="<?php echo $search; ?>">

                            <button class="btn btn-primary ms-2">

                                <i class="bi bi-search"></i>

                            </button>

                        </form>

                        <a href="add_student.php" class="btn btn-primary rounded-pill">

                            <i class="bi bi-plus-circle"></i>

                            Add Student

                        </a>

                    </div>

                </div>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover table-bordered align-middle text-center">

                        <thead>

                            <tr>

                                <th>SR No.</th>

                                <th>Photo</th>

                                <th>Name</th>

                                <th>Email</th>

                                <th>Course</th>

                                <th width="180">Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            <?php

                            if (mysqli_num_rows($result) > 0) {
                                $sr = ($page - 1) * $limit + 1;

                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                    <tr>

                                        <!-- <td><?php echo $row['id']; ?></td> -->
                                        <td><?php echo $sr++; ?></td>
                                        <td>
                                            <?php if (!empty($row['photo'])) { ?>
                                                <img src="assets/uploads/<?php echo $row['photo']; ?>" width="50" height="50" style="border-radius:10%; object-fit:cover;">
                                            <?php } else { ?>
                                                No Photo
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $row['name']; ?></td>

                                        <td><?php echo $row['email']; ?></td>

                                        <td><?php echo $row['course']; ?></td>

                                        <td>

                                            <a href="edit_student.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-outline-primary btn-sm me-2">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit

                                            </a>

                                            <a href="delete_student.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this student?');">

                                                <i class="bi bi-trash-fill"></i>
                                                Delete

                                            </a>

                                        </td>

                                    </tr>

                                <?php

                                }
                            } else {
                                ?>

                                <tr>

                                    <td colspan="5" class="text-center text-danger fw-bold py-4">

                                        <i class="bi bi-exclamation-circle"></i>

                                        No Student Records Found

                                    </td>

                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>

                    </table>
                    <!---- Pagination ----->
                    <nav class="mt-3">
                        <ul class="pagination justify-content-center">

                            <?php if ($page > 1) { ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>">
                                        Previous
                                    </a>
                                </li>
                            <?php } ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>

                                <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">

                                    <a class="page-link"
                                        href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>">
                                        <?php echo $i; ?>
                                    </a>

                                </li>

                            <?php } ?>

                            <?php if ($page < $totalPages) { ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>">
                                        Next
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>


                    </nav>

                </div>

            </div>

        </div>



    </div>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>

</div>

</div>