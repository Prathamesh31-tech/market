
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body{
    padding:20px;
    height: 100vh; 
    background-image: url('images/back.webp'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat;
    display: flex;
    flex-direction: column;
   
}

.heading{
  text-align: center;
  margin-bottom: 30px;
  font-size: xx-large;
}
#formBtn{
    margin-bottom: 20px;
    background-color: rgb(3, 134, 3);
    color: white;
    border: none;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}
#formBtn:hover {
    background-color: rgb(1, 86, 1);
}
#termsBtn {
    margin-bottom: 20px;
    background-color: rgb(3, 134, 3);
    color: white;
    border: none;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}

#termsBtn:hover {
    background-color: rgb(1, 86, 1);
}
#terms_conditions{
    flex-direction: column;
    background-color: white;
    display: none;
}

@media screen and (max-width: 700px) {
    #terms_conditions{
     font-size: x-small;
}

.heading{
  text-align: center;
 margin-bottom: 10px;
 font-size: large;
 font-size: large;
}
}

#form{
    display: flex;
    flex-direction: column;
}

.container{
    border-radius: 20px;
    max-width: 600px;
    margin:0 auto;
    padding:20px;
    box-shadow: 0px 0px 20px black;
} 
.form-group{
    margin-bottom:10px;
}

.data{
    font-weight: 600;
}
#register{
    display: none;
 
}
#next{
    margin-top: 10px; 
    display: flex; 
    align-items: center; 
    justify-content: end;
}
#next2{
    background-color: green; 
    height: 30px;
    width: 100px; 
    border-radius: 4px; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    color:white;
}
#next2:hover {
    cursor: pointer;
    background-color: rgb(1, 49, 1);
}
    </style>

</head>
<body> 

            <div class="heading"><b>Buyer Registration Form - Direct Market Access App</b></div>
        <div class="container" id="form">
            <button id="termsBtn">Terms and Conditions</button>
            <form action="#" method="POST">
            <form action="registration.php" method="post">
                <div class="form-group">
                       <label class="data">Full Name:</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label class="data">Mobile No:</label>
                    <input type="text" class="form-control" name="mobile" placeholder="mobile No">
                </div>
                <div class="form-group">
                    <label class="data">Gender:</label>
                           <select name="gender" class="form-control" >\
                            <option>Select</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                </div>
                
                <div class="form-group">
                    <label class="data">Category of Interest:</label>
                    <input type="text" class="form-control" name="category" placeholder="e.g.,Fruits,Vegetables,Grains,Dairy,etc">
                </div>

                <div class="form-group">
                    <label class="data">Location:</label>
                    <input type="text" class="form-control" name="location" placeholder="City & State">
                </div> 

                <div class="form-group">
                    <label class="data">Business Type:</label>
                    <input type="text" class="form-control" name="btype" placeholder="Retailer,Wholesaler,Individual Buyer">
                </div>

                <div>
                    <div id="acc"><p class="data"> <input style="accent-color: green;" class="checkbox" type="checkbox">Allow all terms and condition</p></div>
                  </div>

                 <div style="display: flex; justify-content: space-between;">              
                        <div class="form-btn" style="display: flex; justify-content: space-between; width:100px;">
                              <input type="submit" id="register" class="btn btn-primary" value="Register" name="submit">
                        </div>
                      
               </form> 
               <div class="extra">

                <?php
                          if (isset($_POST['submit'])) {
                              $fullname = trim($_POST['fullname']);
                              $mobile = trim($_POST['mobile']);
                              $gender = trim($_POST['gender']);
                              $category = trim($_POST['category']);
                              $location = trim($_POST['location']);
                              $btype = trim($_POST['btype']);

                              // Check if any field is empty
                              if (empty($fullname) || empty($mobile) || empty($gender) || empty($category) || empty($location) || empty($btype)) {
                                echo "<div style='color: white; background-color: red; padding: 10px; border-radius: 5px;'>
                                  All Fields Are required..!
                              </div>";

                              } else {
                                  // Database connection
                                  $host = 'localhost';
                                  $user = 'root';
                                  $pass = '';
                                  $dbname = 'login_register';

                                  $conn1 = mysqli_connect($host, $user, $pass, $dbname);

                                  // Check connection
                                  if (!$conn1) {
                                      die("Database connection failed: " . mysqli_connect_error());
                                  }
                              
                                  // Escape user inputs
                                  $fullname = mysqli_real_escape_string($conn1, $fullname);
                                  $mobile = mysqli_real_escape_string($conn1, $mobile);
                                  $gender = mysqli_real_escape_string($conn1, $gender);
                                  $category = mysqli_real_escape_string($conn1, $category);
                                  $location = mysqli_real_escape_string($conn1, $location);
                                  $btype = mysqli_real_escape_string($conn1, $btype);
                              
                                  // SQL query
                                  $sql = "INSERT INTO buyer (fullname, mobile, gender, category, location, btype) 
                                          VALUES ('$fullname', '$mobile', '$gender', '$category', '$location', '$btype')";

                                  if (mysqli_query($conn1, $sql)) {
                                    echo "<div style='color: white; background-color: green; padding: 10px; border-radius: 5px;'>
                                    Registration successful!
                                  </div>";

                                  } else {
                                      echo "Error: " . mysqli_error($conn1);
                                  }
                              
                                  // Close connection
                                  mysqli_close($conn1);
                              }
                          }
               ?>
                </div>
                
        </div>
            <div id="next"><a style="text-decoration: none;" href="farmer.html"><p id="next2">Dashboard-></p></a></div>
           </div>

        <div class="container" id="terms_conditions">
            
                    <b><h5>Terms and Conditions Summary – Direct Market Access App:-</h5></b><br>
        
                1. Buyers must be at least 18 years old and provide accurate registration details. <br><br>
                2. Purchases are binding, and disputes must be resolved directly with sellers.<br><br>
                3. The App is not responsible for product quality or disputes between buyers and sellers.<br><br>
                4. Unauthorized use of accounts must be reported immediately.<br><br>
                5. Fraudulent activities may result in account suspension or legal action.<br><br>
                6. Buyer data is collected and protected per our Privacy Policy.<br><br>
                7. Terms and conditions may be updated at any time.<br><br>
                8. For inquiries, contact.<br><br>
                9. Registering confirms your acceptance of these terms.<br><br>
                10.User data is collected in accordance with the Privacy Policy and used for service enhancement and security <br><br>
                11.Personal information will not be shared with third parties without user consent, except as required by law. <br><br>
                <button id="formBtn">Registration Form</button>
        </div>




    
    </form>
<script>

    const termsBtn = document.getElementById("termsBtn");
    const form = document.getElementById("form");
    const term = document.getElementById("terms_conditions");
    const  formBtn = document.getElementById("formBtn");
    const checkbox = document.querySelector(".checkbox");
    const  register = document.getElementById("register");


   termsBtn.addEventListener("click",()=>{
    form.style.display="none";
    term.style.display="flex";
   })

   formBtn.addEventListener("click",()=>{
    form.style.display="flex";
    term.style.display="none";
   })

   checkbox.addEventListener("change", function () {
    if (this.checked) {
        register.style.display="flex";
    } else {
        register.style.display="none";
    }
}
)

</script>
</body>
</html>

