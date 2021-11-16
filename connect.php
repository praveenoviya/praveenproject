<?php
	$isbnno = $_POST['isbnno'];
	$booktitle = $_POST['booktitle'];
	$category = $_POST['category'];
	$publisher = $_POST['publisher'];
	$author = $_POST['author'];
	$language = $_POST['language'];
        $description = $_POST['description'];
        $barcode = $_POST['barcode'];
        $purchaseprice = $_POST['purchaseprice'];
        $purchasedate = $_POST['purchasedate'];





	// Database connection
	$conn = new mysqli('localhost','root','','bookform');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into bookdetails(isbnno, booktitle, category, publisher, author, language, description, barcode, purchaseprice, purchasedate) values(?, ?, ?, ?, ?, ?,?,?,?,?)");
		$stmt->bind_param("issssssssd", $isbnno, $booktitle, $category, $publisher, $author, $language, $description, $barcode, $purchaseprice, $purchasedate);
		$execval = $stmt->execute();
		echo $execval;
		echo "avp boys successfully created this project";
		$stmt->close();
		$conn->close();
	}
?>