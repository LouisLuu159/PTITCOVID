<option value="">---Chọn Phường/Xã---</option>
<?php
include 'connection.php';
$query = "SELECT * FROM ward WHERE maqh = " . $_POST["districtID"];
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    echo '<option value="' . $row["xaid"] . '">' . $row["name"] . '</option>';
}