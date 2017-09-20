<?php require_once "connection.php";
setcookie("login", "", time() - 3600);
setcookie("name", "", time() - 3600);
setcookie("signin", "", time() - 3600);
?>
<div style="width: 300px;">
    <form action="signin.php" method="post">
        <fieldset>
            <legend>Sign in</legend>

            <label for="login">Login</label>
            <br>
            <input type="text" id="login" name="login">
            <br>
            <label for="pass">Password</label>
            <br>
            <input type="password" name="password">
            <br>
            <br>
            <button type="submit">Submit</button>
        </fieldset>
    </form>
</div>

<div style="width: 300px;">
    <form action="registr.php" method="post">
        <fieldset>
            <legend>Registration</legend>
            <label for="email">E-mail</label>
            <br>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="login">Login</label>
            <br>
            <input type="text" id="login" name="login" required>
            <br>
            <label for="name"> Real Name</label>
            <br>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="birthday">Birth day</label>
            <br>
            <input type="date" id="birthday" name="birthday" required>
            <br>
            <label for="pass">Password</label>
            <br>
            <input type="password" name="password" required>
            <br>
            <label for="country">Country</label>
            <br>
            <select  id="country" name="country">
                <?php $STH=$DBH->query('SELECT id, country FROM countries ORDER BY country ASC');
                $STH->setFetchMode(PDO::FETCH_ASSOC);
                while($row=$STH->fetch()){?>
                    <option value="<?php echo $row['id']?>">
                       <?php echo $row['country']; ?>
                    </option>
                                     <?php   } ?>
            </select>
            <br>
            <input type="checkbox" id="checkbox" required>
            <label for="checkbox">Agree with Terms and Conditions</label>
            <br>
            <br>
            <button type="submit">Submit</button>
        </fieldset>
    </form>
</div>


