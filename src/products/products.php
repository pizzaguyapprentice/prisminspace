<!DOCTYPE html>

<html lang="en">
    <head>
        <link rel="icon" href="../img/placeholderlogo.svg">
        <title>prisminspace</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel ="stylesheet" href="products.css?v=<?php echo time(); ?>">
    </head>

    <body>

		<!-- Has to be above body for grained to be enabled -->
		<?php
            include("../grained-master/settings.php");
        ?>
        <!-- Navbar enabled-->
        <?php
            include("../navbar/navbar.php");
        ?>

        <!-- Contains main body of content-->
        <div class="main">
			<div class="main-background" id="grained">
				<!-- Is the background of where cards are situated-->
				<div class="cardholder">
					
					<!-- Singular Card Container that holds-->
					<div id="card1" class="card">
						<div class="card-border">
							<img src="../img/placeholderlogo.svg" alt="shopping item">
							<span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque arcu dolor, ultrices ut tellus in, tincidunt imperdiet elit. Donec at facilisis elit. Phasellus a tortor justo. Pellentesque eleifend in nisi quis pharetra. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut eget aliquam nibh. Fusce et pellentesque tellus. Phasellus orci arcu, volutpat vulputate pharetra id, pellentesque sit amet risus. Phasellus vitae orci et massa accumsan convallis a eget nisi. Nam semper orci vel sagittis convallis. Phasellus metus arcu, gravida eget vehicula id, pulvinar et libero. Vivamus tempor purus et neque tempus egestas. Vestibulum congue varius sagittis.</span>
						</div>
					</div>

					<?php
					//echo "<table style='border: solid 1px black;'>";
						//echo "<tr><th>Id</th><th>Product Name</th><th>Price</th><th>Amount</th></tr>";


                
					 class TableRows extends RecursiveIteratorIterator {
  						function construct($it) {
  						  parent::construct($it, self::LEAVES_ONLY);
  						}

  						function current() {
  						  return parent::current();
  						}

  						function beginChildren() {
   						echo "<div class='card'>";
   						echo "<div class='card-border'>";
  						}

  						function endChildren() {
 						   echo "</div>";
					  		echo "</div>" . "\n";
						}
					  }

					  $servername = "localhost";
					  $username = "root";
					  $password = "123";
					  $dbname = "prisminspacedb";

					  try {
 					   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 					   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 					   $stmt = $conn->prepare("SELECT * FROM products");
						$stmt2 = $conn->prepare("SELECT productName FROM products");
 					   $stmt->execute();

  					   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  					   $result = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
 					   foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
   					   echo $v;
 					   }
					  } catch(PDOException $e) {
					    echo "Error: " . $e->getMessage();
					  }
					  $conn = null;
					  //echo "</table>";
                ?>
            	</div>
			</div>
        </div>
        <?php
            include("../footer/footer.php");
        ?>
    </body>

	<!-- Has to be below body for grained to be enabled -->
    <script src="../grained-master/options.js">
    </script>
</html>
