<?php
require_once '../../app/controllers/optionsController.php';
include("./templates/header.php");


?>


<section>
    <div class="sec-main"></div>
    <h2>Choose your perfer theme</h2>
    <div class="line"></div>
    <div>
        <form action="options.php" method="post">

            Language
            <select name="langua" id="langua">
                <option value="ar" name="ar" selected>العربية</option>
                <option value="fr" name="fr">Francais</option>
                <option value="en" name="en">English</option>
            </select>
            <br><br>
            <table class="optionstable">
                <tr>
                    <th>text color</th>
                    <td>
                        <div>
                            <div class="choixcouleur" style="color: darkgrey;">
                                <input type="radio" name="color" value="darkgrey"> darkgrey
                            </div>
                            <div class="choixcouleur" style="color: darkblue;">
                                <input type="radio" name="color" value="darkblue"> darkblue
                            </div>
                            <div class="choixcouleur" style="color: black">
                                <input type="radio" name="color" value="black" checked> Black
                            </div>
                            <div class="choixcouleur" style="color: blue;">
                                <input type="radio" name="color" value="blue">blue
                            </div>
                            <div class="choixcouleur" style="color: brown;">
                                <input type="radio" name="color" value="brown">brown
                            </div>
                            <div class="choixcouleur" style="background-color: darkgrey;">
                                <input type="radio" name="color" value="darkgrey"> darkgrey
                            </div>
                            <div class="choixcouleur" style="background-color: gold;">
                                <input type="radio" name="color" value="gold"> gold
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>back ground color</th>
                    <td>
                        <div>
                            <div class="choixbg">
                                <input type="radio" name="bgcolor" value="#F7F7F7"> near white
                            </div>
                            <div class="choixbg" style="background-color: whitesmoke;">
                                <input type="radio" name="bgcolor" value="whitesmoke"> whitesmoke
                            </div>
                            <div class="choixbg" style="background-color: white;" checked>
                                <input type="radio" name="bgcolor" value="white" checked> white
                            </div>
                            <div class="choixbg" style="background-color: lightblue;">
                                <input type="radio" name="bgcolor" value="lightblue"> lightblue
                            </div>
                            <div class="choixbg" style="background-color: lightgreen;">
                                <input type="radio" name="bgcolor" value="lightgreen"> lightgreen
                            </div>
                            <div class="choixbg" style="background-color: lightgrey;">
                                <input type="radio" name="bgcolor" value="lightgrey"> lightred
                            </div>
                            <div class="choixbg" style="background-color: black;">
                                <input type="radio" name="bgcolor" value="black"> black
                            </div>
                        </div>
                    </td>
            </table>

            <div class="btns" style="padding: 5px;">
                <input type="submit" value="submit" id="envoyer" name="submitoption">
                <input type="submit" value="Cancel" id="annuler" name="annuler">
            </div>
        </form>
</section>



<?php
include("./templates/footer.php");
?>