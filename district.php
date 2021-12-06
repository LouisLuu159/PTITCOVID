<option value="">---Chọn Quận/Huyện---</option>
<?php
include 'connection.php';
$query = "SELECT * FROM district WHERE matp = " . $_POST["provinceID"];
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    echo '<option value="' . $row["maqh"] . '">' . $row["name"] . '</option>';
}