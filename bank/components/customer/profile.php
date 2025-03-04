<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        .data{
            padding:15px;
            cursor:pointer;
        }
        .details{
            scale:0.85;
        }
    </style>
</head>
        <?php
            session_start();
            $userId=$_SESSION['userId'];
            if($_SESSION["loggedin"] == false){
                header('location:/bank/index.php');
            }
            require "db.php";
            $sql="SELECT * FROM useraccounts WHERE uname='$userId'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $accno=$row['accountno'];
            $name=$row['name'];
            $email=$row['email'];
            $mobno=$row['mobno'];
            $aadhaarno=$row['aadhaarno'];
            $panno=$row['panno'];
            $acctype=$row['acctype'];
            $source=$row['source'];
            $doj=$row['date'];
            $crn=$row['crn'];
            $city=$row['city'];
            $address=$row['address'];
            $status=$row['status'];
            $branch=$row['branch'];
            $sql1="SELECT * FROM branch WHERE id='$branch'";
            $result1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($result1);
            $branchName=$row1['name'];
        ?>
<body>
    <nav>
        <div class="logo">
        <a href="#"><img src="/bank/images/logo.jpg" alt=""></a>
        <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
            <ul>
            <li id="welcome">WELCOME 👋 <?php echo $userId ?></li>
            <a href="show_notice.php"><li>Notice</li></a>
            <a href="/bank/logout.php"><li id="logout">Logout</li></a>
            </ul>
        </div>
    </nav>
    <main>
    <div class="dashboard">
            <ul class="elem">
                <a href="profile.php"><li style="background:#009879; color:white;">Profile</li></a>
                <a href="customer_dashboard.php"><li  >Account Summary</li></a>
                <a href="fund_transfer.php"><li>Fund Transfer</li></a>
                <a href="loan_apply.php"><li>Apply For Loan</li></a>
                <a href="payment_history.php"><li>Payment History</li></a>
                <a href="feedback.php"><li>FeedBack</li></a>
            </ul>
        </div>
        <div class="hero1">
            <div class="details">
                <div class="data"><div>Account no:</div><div> <?php echo $accno ?></div></div>
                <div class="data"><div>Name:</div><div><?php echo $name ?></div></div>
                <div class="data"><div>Email:</div><div> <?php echo $email ?></div></div>
                <div class="data"><div>Mobno:</div><div> <?php echo $mobno ?></div></div>
                <div class="data"><div>Aadhaar no:</div><div>  <?php echo $aadhaarno ?></div></div>
                <div class="data"><div>PAN no:</div><div> <?php echo $panno ?></div></div>
                <div class="data"><div>Account type:</div><div> <?php echo $acctype ?></div></div>
                <div class="data"><div>Designation:</div><div> <?php echo $source ?></div></div>
                <div class="data"><div>Branch:</div><div> <?php echo $branchName ?></div></div>
                <div class="data"><div>Data of Opening:</div> <div> <?php echo $doj ?></div></div>
                <div class="data"><div>City:</div><div> <?php echo $city ?></div></div>
                <div class="data" style="overflow-y:auto;"><div>Address:</div> <div> <?php echo " ".$address ?></div></div>
            </div>
            <div class="profile-pic">
                <img src="https://previews.123rf.com/images/urfandadashov/urfandadashov1809/urfandadashov180902667/109317646-profile-pic-vector-icon-isolated-on-transparent-background-profile-pic-logo-concept.jpg" alt="">
                <div class="data" style="transform:translateX(-10px); padding:15px; padding-left:5px; text-align:center ">
                    Status: <?php echo $status?>
                </div>
            </div>
        </div>
    </main>
    <footer style="display:flex; justify-content:flex-end; gap:12px; transform:translateX(-26px);"> 
            <div>&copy; 2024 Bank of Bhadrak</div>
            <div><a href="/bank/privacy.php">. Privacy</a></div>
            <div><a href="/bank/terms.php">. Terms</a></div>
            <div><a href="/bank/bankDetails.php">. Bank Details</a></div>
    </footer>
</body>
</html>