<?php
//Connection 
include('Connection.php');
// Queries to count owners, dogs and events and assign to variables
$queryOwnersCount = 'SELECT COUNT(*) AS owners_count FROM owners';
$resultOwnersCount = mysqli_query($conn, $queryOwnersCount);
$rowOwnersCount = mysqli_fetch_assoc($resultOwnersCount);
$ownersCount = $rowOwnersCount['owners_count']; 

$queryDogsCount = 'SELECT COUNT(*) AS dogs_count FROM dogs';
$resultDogsCount = mysqli_query($conn, $queryDogsCount);
$rowDogsCount = mysqli_fetch_assoc($resultDogsCount);
$dogsCount = $rowDogsCount['dogs_count']; 

$queryEventsCount = 'SELECT COUNT(*) AS events_count FROM events';
$resultEventsCount = mysqli_query($conn, $queryEventsCount);
$rowEventsCount = mysqli_fetch_assoc($resultEventsCount);
$eventsCount = $rowEventsCount['events_count']; 
?>
<html>
    <body>
    <u><strong><h1>Poppletons Dog Show</h1></strong></u>
    <h2>
    <h2>Welcome to Poppletons Dog Show!</h2>
    <h2>  <!-- Display counts using variables -->
        This year <?php echo $ownersCount; ?> owners entered <?php echo $dogsCount; ?> dogs in <?php echo $eventsCount; ?> events
    </h2>
    <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus officia, illo repellat voluptatem quo aliquid animi distinctio, quam cupiditate non maiores blanditiis nisi quos sequi nihil! Corrupti ducimus nesciunt autem?
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi, ducimus consequatur. Porro blanditiis a rem eaque cumque sit dignissimos aliquam est voluptatem, consectetur, id perferendis possimus corporis iusto explicabo sunt.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, eveniet? Voluptatem atque officiis rem esse quis illum a sunt repellat iste consequuntur ut eaque, facilis quo! Harum consectetur recusandae incidunt?
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius ut id dignissimos cupiditate, vel autem. Laborum, animi harum. Recusandae perspiciatis quia minima modi harum a sapiente voluptas, debitis voluptatum dolorem.
    </p> 
    <a href="Welcome.php"><button>Top Ten Dogs</button></a>
    <a href="Dogs.php"><button>Dogs</button></a>
    <a href="Owners.php"><button>Owners</button></a>
    <a href="Connection.php"><button>Connection Test</button></a>
<?php
// Checking if 'id' is within the URL
if (isset($_GET['id'])) {
    $ownerId = intval($_GET['id']); //Binding data(id) to a variable

        // The query to retreive the owners data
        $ownerQuery = "SELECT id AS owner_id, name AS owner_name, 
        email AS owner_email, phone AS owner_phone FROM owners WHERE id = ?";

        // Preparing and binding variable to statement
        if ($stmt = mysqli_prepare($conn, $ownerQuery)) {
            mysqli_stmt_bind_param($stmt, "i", $ownerId);

            // Statement executed
            mysqli_stmt_execute($stmt);

            // Getting the results
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

                // Displaying the owner's details and picture in a table
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Image</th></tr>";
                echo "<tr>";
                echo "<td>" . $row['owner_id'] . "</td>";
                echo "<td>" . $row['owner_name'] . "</td>";
                echo "<td><a href='mailto:" . $row['owner_email'] . "'>" . $row['owner_email'] . "</a></td>";
                echo "<td>" . $row['owner_phone'] . "</td>";
                echo "<td>" .'<img src="images/ownerPic.jpg" height = "40" length = "40">'. "</td>";
                echo "</tr>";
                echo "</table>";
            } else {
                echo "<p>No owner found for the provided ID: $ownerId</p>";
            }
            //Closing prepared statement and db conn.
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
          }
?>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, amet modi! Autem magni non similique facere mollitia quos atque eum eligendi qui consectetur. Voluptatum rerum obcaecati error excepturi! Unde, laudantium!
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum quam ipsam voluptatum, maxime dolorem optio iste assumenda. Temporibus voluptatum sint veniam repudiandae? Odio aliquam ipsa obcaecati sunt quasi itaque at?
  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit ad mollitia molestias alias aut? Ex quos dolorem est aperiam, quasi distinctio mollitia esse repellendus ad saepe dicta ipsam, corporis soluta.
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores expedita odio hic, aspernatur voluptas asperiores earum impedit quo eius, deserunt est ullam nemo fugiat vel itaque nostrum similique, quia incidunt.
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate assumenda, deserunt laborum magni, vero distinctio at nihil officiis illo eaque ullam suscipit inventore neque non laboriosam fugit vitae quis. Quae.  
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, amet modi! Autem magni non similique facere mollitia quos atque eum eligendi qui consectetur. Voluptatum rerum obcaecati error excepturi! Unde, laudantium!
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum quam ipsam voluptatum, maxime dolorem optio iste assumenda. Temporibus voluptatum sint veniam repudiandae? Odio aliquam ipsa obcaecati sunt quasi itaque at?
  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit ad mollitia molestias alias aut? Ex quos dolorem est aperiam, quasi distinctio mollitia esse repellendus ad saepe dicta ipsam, corporis soluta.
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores expedita odio hic, aspernatur voluptas asperiores earum impedit quo eius, deserunt est ullam nemo fugiat vel itaque nostrum similique, quia incidunt.
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate assumenda, deserunt laborum magni, vero distinctio at nihil officiis illo eaque ullam suscipit inventore neque non laboriosam fugit vitae quis. Quae.  
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur incidunt eos nihil reprehenderit ut dolores eaque repellat officia, sunt minus ab eveniet provident laboriosam velit excepturi facere ducimus rerum consectetur.
</p>
<style>
 img {
  float: left;
  margin-right: 10px;
}
  </style>
</body>
</html>

