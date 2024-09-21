<!-- reserve_seat.php -->

<?php
include 'db_connect.php';

$name = $_POST['name'];
$user_id = $_POST['user_id'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$table_id = $_POST['table_id'];
$time_slot = $_POST['time_slot'];
$reservation_date = date('Y-m-d');


$query = "SELECT COUNT(*) FROM reservations WHERE reservation_date = ? AND table_id = ? AND time_slot = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$reservation_date, $table_id, $time_slot]);
$count = $stmt->fetchColumn();

if ($count > 0) {
    echo "Sorry, this seat is already reserved.";
} else {
    $insertQuery = "INSERT INTO reservations (name, user_id, email, phone, reservation_date, table_id, time_slot) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->execute([$name, $user_id, $email, $phone, $reservation_date, $table_id, $time_slot]);
    echo "Reservation successful!";
}
?>
