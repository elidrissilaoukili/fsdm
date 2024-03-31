<?php
include("./templates/header.php");

if (isset($_POST["submitoption"])) {
    setcookie("langue", $_POST['langua'], time() + 3600 * 24, "/");
    setcookie("color", $_POST['color'], time() + 3600 * 24, "/");
    setcookie("bgcolor", $_POST['bgcolor'], time() + 3600 * 24, "/");
}


if (isset($_POST["annuler"])) {
    header("location: index.php");
}
?>


<section>
    <div class="sec-main"></div>
    <h2>Precisez vos preferences</h2>
    <div class="line"></div>
    <div>
        <form action="options.php" method="post">

            <table class="optionstable">
                <tr>
                    <th>Language</th>
                    <td>
                        <select name="langua" id="langua">
                            <option value="AR" name="AR" selected>العربية</option>
                            <option value="FR" name="FR">Francais</option>
                            <option value="EN" name="EN">English</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>text color</th>
                    <td>
                        <div>
                            <div class="choixcouleur" style="color: red;">
                                <input type="radio" name="color" value="red">
                                red
                            </div>
                            <div class="choixcouleur" style="color: black">
                                <input type="radio" name="color" value="black" checked> Noir
                            </div>
                            <div class="choixcouleur" style="color: blue;">
                                <input type="radio" name="color" value="blue">
                                blue
                            </div>
                            <div class="choixcouleur" style="color: green;">
                                <input type="radio" name="color" value="green">
                                green
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>back ground color</th>
                    <td>
                        <div>
                            <div class="choixbg" style="background-color: rgb(182, 137, 137);">
                                <input type="radio" name="bgcolor" value="rgb(178, 139, 139)"> brown
                            </div>
                            <div class="choixbg" style="background-color: white;" checked>
                                <input type="radio" name="bgcolor" value="white" checked> white
                            </div>
                            <div class="choixbg" style="background-color: bisque;">
                                <input type="radio" name="bgcolor" value="bisque"> bisque
                            </div>
                            <div class="choixbg" style="background-color: rgb(255, 215, 222);">
                                <input type="radio" name="bgcolor" value="rgb(255, 215, 222)"> pink
                            </div>
                        </div>
                    </td>
            </table>

            <div class="btns" style="padding: 5px;">
                <input type="submit" value="submit" id="envoyer" name="submitoption">
                <input type="submit" value="annuler" id="annuler" name="annuler">
            </div>
        </form>
</section>



<?php
include("./templates/footer.php");
?>