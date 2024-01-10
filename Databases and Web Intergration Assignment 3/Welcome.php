<?php
//Connection to the db 
include('Connection.php');
// Query to count owners and assign to a variable
$queryOwnersCount = 'SELECT COUNT(*) AS owners_count FROM owners';
$resultOwnersCount = mysqli_query($conn, $queryOwnersCount);
$rowOwnersCount = mysqli_fetch_assoc($resultOwnersCount);
$ownersCount = $rowOwnersCount['owners_count'];
// Query to count dogs and assign to a variable
$queryDogsCount ='SELECT COUNT(*) AS dogs_count FROM dogs';
$resultDogsCount = mysqli_query($conn, $queryDogsCount);
$rowDogsCount = mysqli_fetch_assoc($resultDogsCount);
$dogsCount = $rowDogsCount['dogs_count'];
// Query to count events and assign to a variable
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
<body>
    <u><strong><h1>Poppletons Dog Show</h1></strong></u>
    <h2>
    <h2>Welcome to Poppletons Dog Show!</h2>
    <h2>   <!-- Display counts using variables -->
        This year <?php echo $ownersCount; ?> owners entered <?php echo $dogsCount; ?> dogs in <?php echo $eventsCount; ?> events
    </h2>
    <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus officia, illo repellat voluptatem quo aliquid animi distinctio, quam cupiditate non maiores blanditiis nisi quos sequi nihil! Corrupti ducimus nesciunt autem?
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi, ducimus consequatur. Porro blanditiis a rem eaque cumque sit dignissimos aliquam est voluptatem, consectetur, id perferendis possimus corporis iusto explicabo sunt.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, eveniet? Voluptatem atque officiis rem esse quis illum a sunt repellat iste consequuntur ut eaque, facilis quo! Harum consectetur recusandae incidunt?
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius ut id dignissimos cupiditate, vel autem. Laborum, animi harum. Recusandae perspiciatis quia minima modi harum a sapiente voluptas, debitis voluptatum dolorem.
    </p> 

    <a href="Dogs.php"><button>Dogs</button></a>
    <a href="Owners.php"><button>Owners</button></a>
    <a href="Connection.php"><button>Connection Test</button></a>
    
    <u><strong><h1>Top Ten Dogs</h1></strong></u>
    <?php
    // Retrieving data from multiple tables via Joins: Dogs, Entries, Owners, and Breeds
    // Joining dogs with entries, owners, and breeds based on their IDs
    // Grouping the results by dogs.name, breeds.name, owners.name and owners.email  
    // Ensuring dogs have participated in more than one competition by counting distinct competition IDs
    // Ordering the results by average score in desc order and limiting to the top 10
    $query = 'SELECT dogs.id AS dog_id, dogs.name AS dog_name,
    breeds.name AS breed_name, AVG(entries.score) AS avg_score,    
    owners.id AS owner_id, owners.name AS owner_name, owners.email AS owner_email
    FROM dogs
    JOIN entries ON dogs.id = entries.dog_id    
    JOIN owners ON dogs.owner_id = owners.id   
    JOIN breeds ON dogs.breed_id = breeds.id    
    GROUP BY dogs.name, breeds.name, owners.name, owners.email    
    HAVING COUNT(DISTINCT entries.competition_id) > 1   
    ORDER BY avg_score DESC   
    LIMIT 10'; 
    
   
   //Executing query
   $result = mysqli_query($conn, $query); 

   //Top ten table
   echo "<table>";
   echo "<th>Name</th>";
   echo "<th>Breed</th>";
   echo "<th>Average Score</th>";
   echo "<th>Owner's Name</th>";
   echo "<th>Owner's Email</th>";

   //Collect data using while loop
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['dog_name'] . "</td>";
    echo "<td>" . $row['breed_name'] . "</td>";
    echo "<td>" . $row['avg_score'] . "</td>";
    echo "<td><a href='OwnersDetails.php?id=" . $row['owner_id'] . "'>" . $row['owner_name'] . "</a></td>";
    echo "<td><a href='mailto:" . $row['owner_email'] . "'>" . $row['owner_email'] . "</a></td>";
    echo "</tr>";
} 
echo "</table>";
?>
 <p> <!--     -->
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus officia, illo repellat voluptatem quo aliquid animi distinctio, quam cupiditate non maiores blanditiis nisi quos sequi nihil! Corrupti ducimus nesciunt autem?
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi, ducimus consequatur. Porro blanditiis a rem eaque cumque sit dignissimos aliquam est voluptatem, consectetur, id perferendis possimus corporis iusto explicabo sunt.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, eveniet? Voluptatem atque officiis rem esse quis illum a sunt repellat iste consequuntur ut eaque, facilis quo! Harum consectetur recusandae incidunt?
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius ut id dignissimos cupiditate, vel autem. Laborum, animi harum. Recusandae perspiciatis quia minima modi harum a sapiente voluptas, debitis voluptatum dolorem.
    </p>  
</body>
<footer>

</footer>
</html> 

