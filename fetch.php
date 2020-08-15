<?php
$connect = mysqli_connect("localhost", "root", "", "realtech");
$output = '';
$sql = "SELECT * FROM list_of_names WHERE username LIKE '%" . $_POST["search"] . "%'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<br>
						<h4 style="text-decoration:underline;text-align:center;">search result</h4>

						';
	$output .= '<h3></h3><br><br>';
	while ($row = mysqli_fetch_array($result)) {

		$output .='                               <div class="suggestion-usd">
                                                <img src="images/resources/s1.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>'.$row["username"].'</h4>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>

				

				



		<hr>';
	}
	echo $output;
}
else{
	echo "Data not found";
}
?>