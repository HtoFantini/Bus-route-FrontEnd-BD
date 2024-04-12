<?php
    if(isset($_POST['submit'])) {

    require "../config.php";
    require "../common.php";

        try {
            $connection = new PDO($dsn, $username, $password, $options);

            $new_bus = array(
                            "numero" => $_POST['numero'],
                            "modelo"  => $_POST['modelo'],
                            "rota"     => $_POST['rota'],
                            "location"  => $_POST['location']
                        );
            
            $sql = sprintf(
                            "INSERT INTO %s (%s) values (%s)",
                            "bus",
                            implode(", ", array_keys($new_bus)),
                            ":" . implode(", :", array_keys($new_bus))
                    );
                    
            $statement = $connection->prepare($sql);
            $statement->execute($new_bus);


        } 
        catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }

    }
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
  <?php echo escape($_POST['numero']);
        echo escape($_POST['modelo']); ?> successfully added.
<?php } ?>

    <center>
        <h3>Add a new Bus</h3>

        <form method="post">
            <center>
            <label for="numero">Bus number</label>
            <input type="text" name="numero" id="numero">
            <label for="modelo">Bus model</label>
            <input type="text" name="modelo" id="modelo">
            <label for="rota">Bus route</label>
            <input type="text" name="rota" id="rota">
            <label for="location">Bus Location</label>
            <input type="text" name="location" id="location">
            <input type="submit" name="submit" value="submit">
            </center>
        </form>

        <a href="index.php">Back to home</a>
    </center>

<?php include "templates/footer.php"; ?>