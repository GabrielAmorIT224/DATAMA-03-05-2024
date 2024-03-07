<?php
include 'database_employee.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reservation_id"])) {
    $reservation_id = $_POST["reservation_id"];

    // Update the reservation status to Approved (status_id = 2)
    $updateSql = "UPDATE tbl_reservation SET STATUS_ID = 2 WHERE RESERVATION_ID = ?";
    $updateStmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($updateStmt, $updateSql)) {
        mysqli_stmt_bind_param($updateStmt, "i", $reservation_id);
        mysqli_stmt_execute($updateStmt);

        // Close the statement
        mysqli_stmt_close($updateStmt);

        echo "Reservation Approved successfully!";
    } else {
        echo "Error updating reservation status: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request!";
}
?>
