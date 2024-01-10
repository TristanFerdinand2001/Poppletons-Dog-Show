<?php
//Connection to the database
include('Connection.php');
// Query to count owners
$queryOwnersCount = 'SELECT COUNT(*) AS owners_count FROM owners';
$resultOwnersCount = mysqli_query($conn, $queryOwnersCount);
$rowOwnersCount = mysqli_fetch_assoc($resultOwnersCount);
$ownersCount = $rowOwnersCount['owners_count']; 
// Query to count dogs
$queryDogsCount = 'SELECT COUNT(*) AS dogs_count FROM dogs';
$resultDogsCount = mysqli_query($conn, $queryDogsCount);
$rowDogsCount = mysqli_fetch_assoc($resultDogsCount);
$dogsCount = $rowDogsCount['dogs_count']; 
// Query to count events
$queryEventsCount = 'SELECT COUNT(*) AS events_count FROM events';
$resultEventsCount = mysqli_query($conn, $queryEventsCount);
$rowEventsCount = mysqli_fetch_assoc($resultEventsCount);
$eventsCount = $rowEventsCount['events_count']; 
?>
<html>
  <head>   
  <link rel="stylesheet" type="text/css" href="style/styles.css" />
    <title>Poppletons Dog Show</title>  
    </head>  

    <u><strong><h1>Poppletons Dog Show</h1></strong></u>
    <h2>Welcome to Poppletons Dog Show!</h2>
    <h2>
        <!-- Display counts -->
        This year <?php echo $ownersCount; ?> owners entered <?php echo $dogsCount; ?> dogs in <?php echo $eventsCount; ?> events
    </h2>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat iusto perferendis obcaecati ratione ducimus quidem libero dolor possimus non. Earum laboriosam facere commodi dolores illum quaerat sed aliquam praesentium molestias.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta animi nihil magnam consequuntur, incidunt similique minus nesciunt minima, error hic, distinctio ipsa delectus tempora autem quia? Tempora at voluptatibus fugiat.
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta cumque voluptas maiores, sequi consectetur, saepe expedita repudiandae earum sed inventore magnam nemo consequatur vero aliquam! Doloribus optio cumque perferendis magni.
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste eligendi deserunt, magnam et unde perferendis quas iusto dolor? Aperiam ipsam molestiae blanditiis tenetur. Minus laborum fugit ratione veniam aliquid nemo!
    </p>
    <body>
    <a href="Welcome.php"><button>Top Ten Dogs</button></a>
    <a href="Dogs.php"><button>Dogs</button></a>
   <a href="Owners.php"><button>Owners</button></a>
   <a href="Connection.php"><button>Connection Test</button></a>
   <u><strong><h1>Dogs</h1></strong></u>
  <?php
   $query = 'SELECT * FROM dogs';
   
  // Executing query
  $result = mysqli_query($conn, $query); 
  
     echo "<table>";
     echo "<th> Name</th>";
     echo "<th> Breed</th>";
     echo "<th> Owner</th>";

   //Fetching the data
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>". $row['name']."</td>";
    echo "<td>". $row['breed_id']."</td>";
    echo "<td>". $row['owner_id']."</td>";
    echo "</tr>";
  }
  echo "</table>";
  ?>
</body>
<footer></footer>
</html>




