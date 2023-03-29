<html>
    <head>
        <title>website design</title>
        <link rel="stylesheet" href="styleclass.css">
        <style>
            h1::after{background:unset;}
            .main{
                background-image: url("img/commonProfile.png");
            }
        </style>
        </head>
        <body >
            <div class="main" >
                <div class="navbar">
                    <div class="icon">
                        <h2 class="logo">Andhra Polytechnic</h2>
                        </div>
                        <div class="menu">
                            <ul>
                                <li><a href="homepage.php">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="campus.html">Our campus</a></li>
                                <li><a href="courses.html">Courses</a></li>
                                <li><a href="review.php">Review</a></li>
                                <li><a href="contact us.html" >Contact us</a></li>
                                <li><a href="location.html">Location</a></li>
                                <li><a href="loginpage.php" id="signinlabel" loginStatus="0">sign in</a></li>
                                <li><a href="profile.php">Profile</a></li>
                            </ul>
                        </div>
                        <div class="search">
                            <input class="srch" type="search" name="seachData" placeholder="type here">
                             <button class="btn" onclick="searchDataFromSite()"> search</button>
                        </div>
                 </div>
                 <div class="content" id="content" > 
                    <h1 style="background:unset; "> BEST PLACE<BR> FOR BRIGHT FUTURES</h1>
                 </div>
            </div>
            <style>
                #searchResult{
                    padding: 15%;
                    color:#fff;
                    font-size: 15px;
                    font-family: 'poppins',sans-serif;
                }
                #searchResult b{
                    font-size: 15px;
                }   
            </style>
            
            <script type="text/javascript">
                function searchDataFromSite()
                {
                    var temp=document.getElementsByClassName("srch")[0].value;
                    if(temp==null || temp=="")
                        return alert("Not mentionedd to search");
                    window.location.href="homepage.php?s_data="+temp+"#searchResult";
                }
            </script>
        </body>

        <?php

        if(!isset($_COOKIE["Name"]))
        {
            echo "<script>document.getElementById('signinlabel').innerHTML='sign in';
                    document.getElementById('signinlabel').loginStatus='0';</script>";
        }
        else
        {
            echo "<script>document.getElementById('signinlabel').innerHTML='signout';
                    document.getElementById('signinlabel').loginStatus='1';</script>";
        }

        if(isset($_GET["s_data"]))
        {
            echo "<div id='searchResult' hidden style='background:#252525;'>
                    <b>Searching for </b><i class='searchItems' style='color:yellow'> </i>
                    <br><br>";
            echo "<script>
                document.getElementById('searchResult').hidden=false;
                document.getElementsByClassName('searchItems')[0].innerHTML='".$_GET["s_data"]."';
                document.getElementsByClassName('srch')[0].value='".$_GET["s_data"]."';
                </script>";
            checkInProfile($_GET["s_data"]);
            checkInReviews($_GET["s_data"]);
            echo "</div>";
        }
      ?>

      <?php
      function checkInProfile($word)
      {
        $host= "127.0.0.1";
        $username = "root";
        $password = "";


        // Create connection
        $conn = mysqli_connect($host, $username, $password,"APTWEBPAGEDB");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql="select * from useraccounts where \"Full Name\"='".$word."' OR Username='".$word."' OR Email='".$word."';";
            
        $result=$conn->query($sql);
        echo "<b>Profiles:</b><br><br><div class='searchItems'>";
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                $data=loadOneProfile($row);
                echo $data;   
            }
        }
        else
        {
            echo "No Profiles found on search basis";
        }
        echo "<br><br>";
        mysqli_close($conn);
      }
      function checkInReviews($word)
      {
        $host= "127.0.0.1";
        $username = "root";
        $password = "";


        // Create connection
        $conn = mysqli_connect($host, $username, $password,"APTWEBPAGEDB");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql="select * from review_table where Name='".$word."' OR PIN='".$word."';";
        $result=$conn->query($sql);
        echo "<b>Reviews:</b><br><br><div class='searchItems'>";
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                $data=loadOneComment($row);   
                echo $data;
            }
        }
        else
        {
            echo "No Reviews found on search basis";
        }
        echo "</div>";
        mysqli_close($conn);

      }

        function loadOneProfile($row)
        {
            $profilePicPath="img/commonProfile.png";
            $data="
                <head>
                        <link rel='stylesheet' href='style6.css'>
                    </head>
                    <body>
                        <div class='bidda'>
                            
                            <div class='review-box'>
                                <div class='slide'>
                                    <div class='card'>
                                        <div class='profile'>
                                        <img src='".$profilePicPath."'>
                                        <div>
                                        <h3>".$row["Full Name"]."</h3>
                                        <p>".$row["Username"]."</p>
                                        </div>
                                        </div>
                                        <p><b>Date Of Birth: </b><i>".$row["DOB"]."</i></p>
                                        <p><b>Email Id: </b><i></i><i>".$row["Email"]."</i></p>
                                        <p><b>Mobile: </b><i>".$row["Mobile"]."</i></p>
                                    </div>
                                </div>
                          </div>
                            </div>
                        </div>
                    </body>
                ";
                return $data;
        }
        function loadOneComment($row)
        {
            $profilePicPath="img/commonProfile.png";
            $data="
            <head>
                    <title> review</title>
                    <link rel='stylesheet' href='style6.css'>
                </head>
                <body>
                    <div class='bidda'>
                        
                        <div class='review-box'>
                            <div class='slide'>
                                <div class='card'>
                                    <div class='profile'>
                                    <img src='".$profilePicPath."'>
                                    <div>
                                    <h3>".$row["Name"]."</h3>
                                    <p>".$row["PIN"]."</div>
                                    </div>
                                    <p>  ".$row["Comment"]."
                                    </p>
                                    <b>RATING:".$row["Rating"]."/5</b>
                                </div>
                            </div>
                      </div>
                        </div>
                    </div>
                </body>
            "; 
            return $data;
        }
        ?>
        </html>

        