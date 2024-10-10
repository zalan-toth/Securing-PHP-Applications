<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['name'])) {
    echo "<h2>I've been submitted!</h2>";
    echo "<p>Name: " . $_GET['name'] . "</p>";
} else {
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <label>Name: <input type="text" name="name"></label><br>
        <button type="submit">Submit</button>
    </form>
    <?php
}
?>

