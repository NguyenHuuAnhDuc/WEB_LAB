<div class="w3-blue w3-large" id="our">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
        <h2 class="w3-wide w3-center">What we offer to you</h2>
        <p class="w3-opacity w3-center"><i>✨Our best seller courses✨</i></p>
        <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
            <div class="w3-third w3-margin-bottom w3-padding-16">
                <img src="image/frontend.jfif" alt="New York" style="width:100%; height:185px;" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                <?php
                    include 'connection.php';
                    $sql = "SELECT * FROM products WHERE productID='1'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $row = mysqli_fetch_assoc($result) ;
                        echo "<p>"."<b>". $row['product_name']."</b>"."</p>";
                        echo "<p class='w3-opacity'>Building A4, Campus 1</p>";
                        echo "<a class='w3-button w3-red w3-margin-bottom'>$".$row['price']." ENROLL</a>";                       
                    }else{
                        echo "No results";
                    } 
                    mysqli_close($conn);
                ?>
                </div>
            </div>
            <div class="w3-third w3-margin-bottom w3-padding-16">
                <img src="image/back.jpg" alt="New York" style="width:100%; height:185px;" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                <?php
                    include 'connection.php';
                    $sql = "SELECT * FROM products WHERE productID='2'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $row = mysqli_fetch_assoc($result);
                        echo "<p>"."<b>". $row['product_name']."</b>"."</p>";
                        echo "<p class='w3-opacity'>Building A5, Campus 1</p>";
                        echo "<a class='w3-button w3-red w3-margin-bottom'>$".$row['price']." ENROLL</a>";
                    }else{
                        echo "No results";
                    } 
                    mysqli_close($conn);
                ?>
                </div>
            </div>
            <div class="w3-third w3-margin-bottom w3-padding-16">
                <img src="image/full.jpg" alt="New York" style="width:100%; height:185px;" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                <?php
                    include 'connection.php';
                    $sql = "SELECT * FROM products WHERE productID='3'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $row = mysqli_fetch_assoc($result);
                        echo "<p>"."<b>". $row['product_name']."</b>"."</p>";
                        echo "<p class='w3-opacity'>Building H6, Campus 2</p>";
                        echo "<a class='w3-button w3-red w3-margin-bottom'>$".$row['price']." ENROLL</a>";
                    }else{
                        echo "No results";
                    } 
                    mysqli_close($conn);
                ?>
                </div>
            </div>
        </div>
    </div>  
</div>