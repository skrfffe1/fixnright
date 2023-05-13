<?php 
// Database configuration 
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "test"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
} 
 
// Get search term 
$searchTerm = $_GET['term']; 
 
// Fetch matched data from the database 
$query = $db->query("SELECT * FROM supplier WHERE s_company_name LIKE '%".$searchTerm."%'  ORDER BY s_company_name ASC"); 
 
// Generate array with skills data 
$skillData = array(); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['id'] = $row['s_id']; 
        $data['value'] = $row['s_company_name']; 
        array_push($skillData, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($skillData); 
?>