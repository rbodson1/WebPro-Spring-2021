<!-- Login to view matches -->
<?php include("commonTop.php"); ?>

<form action="matches-submit.php" method="get">

    <fieldset>
        <legend>Returning User:</legend>

        <ul>
            <li>
                <!-- Name: Input user's name to find matches -->
                <strong>Name:</strong>
                <input type="text" name="name" size="16"/>
            </li>
        </ul>

        <!-- Get the matches for the user -->
        <input type="submit" value="View My Matches"/>
    </fieldset>
</form>

<?php include("commonBottom.php"); ?>