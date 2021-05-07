<!--
This is the sign up page for Nerdieluv.
-->
<?php include("commonTop.php"); ?>

<form action="signup-submit.php" method="post">
    <fieldset> <!--Form for the signup-->
        <legend>New User Signup:</legend>
        <ul>
            <li>
                <!--Name: Writing user's name -->
                <strong>Name:</strong>
                <input type="text" name="name" size="16"/>
            </li>

            <li>
                <!-- Gender: Selecting gender, Female and Male --> 
                <strong>Gender:</strong>
                <label><input type="radio" name="gender" value="M"/>Male</label>
                <label><input type="radio" name="gender" value="F"/>Female</label>

            </li>

            <li>
                <!-- Age: Inputting the age -->
                <strong>Age:</strong>
                <input type="text" name="age" size="6" maxlength="2"/>
            </li>

            <li>
                <!--
                Personality type: Writing the 4 character personality type -->
                
                <strong>Personality type:</strong>
                <input type="text" name="type" size="6" maxlength="4"/>
                <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type?)</a>
            </li>

            <li>
                <!-- Favorite OS: Choosing OS system. Window, Mac and Linux -->
                <strong>Favorite OS:</strong>
                <select name="OS">
                    <option selected="selected">Windows</option>
                    <option>Mac OS X</option>
                    <option>Linux</option>
                </select>
            </li>

            <li>
                <!-- Seeking age: Writing the age that the user is looking for -->
                 
                <strong>Seeking Age:</strong>
                <input type="text" name="min" size="6" maxlength="2" placeholder="min"/> to
                <input type="text" name="max" size="6" maxlength="2" placeholder="max"/>
            </li>
        </ul>

        <!-- Sign Up: Submitting the data as a POST to signup-submit.php. -->
        <input type="submit" value="Sign Up"/>
    </fieldset>
</form>

<?php include("commonBottom.php"); ?>