<?php

include('connection.php');
if(isset($_POST["form_id"]))
{
	$output = array();
	$statement = $conn->prepare("SELECT form.*, user.* FROM `form`, `user` 
                       WHERE `form`.userID = `user`.ID AND `form`.ID = :form_id  LIMIT 1 ");
    $statement->bindValue(":form_id", $_POST["form_id"]);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["inputName"] = $row["name"];
		$output["inputID"] = $row["userID"];
        $output["inputDOB"] = $row["dob"];
        $output["inputGender"] = $row["gender"];
        $output["inputNation"] = $row["nationality"];
        $output["inputProvince"] = $row["provinceID"];
        $output["inputDistrict"] = $row["districtID"];
        $output["inputWard"] = $row["wardID"];
        $output["inputDetailAddress"] = $row["addressDetail"];
        $output["inputEmail"] = $row["email"];
        $output["inputPhone"] = $row["phone"];
        $output["inputCountryPassing"] = $row["countryPassing"];
        $output["inputSymptom"] = $row["symptom"];
        $output["touchCovidPatient"] = $row["touchCovidPatient"];
        $output["touchPeopleFromCovidCountry"] = $row["touchPeopleFromCovidCountry"];
        $output["touchPeopleHasCovidSymptom"] = $row["touchPeopleHasCovidSymptom"];
	}
	echo json_encode($output);
}
?>