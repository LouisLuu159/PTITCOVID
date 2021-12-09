<?php   

  include('connection.php');
  
  $output = array();
  $query = 'SELECT form.*, name, dob, phone FROM `form`, `user` WHERE `form`.userID = `user`.ID ';

  if(isset($_POST['filter_tc_covid'], $_POST['filter_tx_covid']) 
           && $_POST['filter_tc_covid'] != '' && $_POST['filter_tx_covid'] != ''){
    $filter_tc_covid = $_POST['filter_tc_covid'];
    $filter_tx_covid = $_POST['filter_tx_covid'];
    if($filter_tc_covid == "Yes"){
      $query .= ' AND symptom != "" ';
    }else{
      $query .= ' AND symptom = "" ';
    }

    if($filter_tx_covid == "Yes"){
      $query .= ' AND ( touchCovidPatient = "Yes" OR touchPeopleFromCovidCountry = "Yes" 
                        OR touchPeopleHasCovidSymptom = "Yes") ';
    }
    else{
      $query .= ' AND ( touchCovidPatient = "No" AND touchPeopleFromCovidCountry = "No" 
                        AND touchPeopleHasCovidSymptom = "No") ';
    }

  }

  if(isset($_POST['search']['value'])){// $_POST['search']['value']: Search value
	  $query .= 'AND (name LIKE "%'. $_POST['search']['value'] .'%" ';
    $query .= 'OR userID LIKE "%'. $_POST['search']['value'] .'%" ';
    $query .= 'OR symptom LIKE "%'. $_POST['search']['value'] .'%" ';
    $query .= ')';
  }
  $statement = $conn->prepare($query);
  $statement->execute();
  $totalRecordsWithFilter = $statement->rowCount();//Total number of records with filtering
  
  $columnName = array('date','userID','name', 'dob', 'phone', 'symptom', 'TXcovid');
  if(isset($_POST['order'])){
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
	  $query .= 'ORDER BY '.$columnName[$columnIndex].' '.$columnSortOrder.' ';
  }
  
  else{
  	$query .= 'ORDER BY `form`.date DESC ';
  }
  
  if($_POST["length"] != -1){// $_POST['length'] : number of rows per page 
	  $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
  }
  
  // echo $query;
  // exit();
  
  $statement = $conn->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  
  $get_all_query = "SELECT * FROM form";
  $statement = $conn->prepare($get_all_query);
  $statement->execute();
  $totalRecordsWithoutFilter = $statement->rowCount();//Total number of records without filtering

  $data = array();
  
  foreach($result as $row){
    $TXcovid = 'No';
    if($row['touchCovidPatient'] == 'Yes' || $row['touchPeopleFromCovidCountry'] == 'Yes' 
           || $row['touchPeopleHasCovidSymptom'] == 'Yes'){
        $TXcovid = 'Yes';
    }

    $buttons = '<button type="button" name = "view" class="btn btn-info" id ="' . $row['ID'].'"><i class="far fa-eye"></i></button>'.
   '<button type="button" name = "edit" class="btn btn-warning" id ="' . $row['ID'].'"><i class="fas fa-edit"></i></button>'.
   '<button type="button" name = "delete"  class="btn btn-danger" id ="' . $row['ID'].'"><i class="far fa-trash-alt"></i></button>';
    
    // $data[] = array(
    //     "data" => $row['date'],
    //     "id"=>$row['userID'],
    //     "name"=>$row['name'],
    //     "dob"=>$row['dob'],
    //     "phone"=>$row['phone'],
    //     "TCcovid"=>$row['symptom'],
    //     "TXcovid"=>$TXcovid,
    //     "button" => $button,
    //  );
    $sub_array = array();
    $sub_array[] = $row['date'];
    $sub_array[] = $row['userID'];
    $sub_array[] = $row['name'];
    $sub_array[] = $row['dob'];
    $sub_array[] = $row['phone'];
    $sub_array[] = $row['symptom'];
    $sub_array[] = $TXcovid;
    $sub_array[] = $buttons;
    $data[] = $sub_array;
  }

  $response = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$totalRecordsWithoutFilter,
	"recordsFiltered"	=>	$totalRecordsWithFilter,
	"data"				=>	$data
  );

  echo json_encode($response);
 ; ?>