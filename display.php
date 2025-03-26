<html>

<head>

<title>Display Records</title>
</head>
<style>
       body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            box-sizing: border-box;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        @media (max-width: 600px) {
            table {
                overflow-x: auto;
            }
            th, td {
                white-space: nowrap;
            }
        }

</style>

<body>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>BType</th>
                </tr>
            </thead>
<?php

include("connection.php");
error_reporting(0);
$query ="select * from buyer";
$data = mysqli_query( $conn1,$query);
$total =mysqli_num_rows($data);

if($total!=0){
    while($result=mysqli_fetch_assoc($data)){
        echo"

        <tr>
        <td>".$result['fullname']."</td>
        <td>".$result['mobile']."</td>
        <td>".$result['gender']."</td>
        <td>".$result['category']."</td>
        <td>".$result['location']."</td>
        <td>".$result['btype']."</td>
        ";
    }
}else{
    echo "No records Found";
}


?>

</table>
</div>