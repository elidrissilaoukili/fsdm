<?php
include("vue/haut.php");
?>
<main>
    <h1>Precisez vos prefereneces</h1>
    <div class="Line2"></div>
    <form action="index.php?action=setCouleur" method="post">
        <table style="margin: 10px auto;">
            <tbody>
                <tr>
                    <td>Langue:</td>
                    <td><select name="lang" id="">
                            <option value="AR">AR</option>
                            <option value="FR">FR</option>
                            <option value="EN">EN</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Couleur de texte:</td>
                    <td>
                        <input type="radio" name="color" value="red"> <span style="color: red">Rouge</span>
                        <br>
                        <input type="radio" name="color" value="green"> <span style="color: green">Vert</span>
                        <br>
                        <input type="radio" name="color" value="blue"> <span style="color: blue">Bleu</span>
                        <br>
                        <input type="radio" name="color" value="gray"> <span style="color: gray">Gris</span>
                        <br>
                        <input type="radio" name="color" value="black"> <span style="color: black">Black</span>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>Couleur d'arriere plan:</td>
                    <td>
                        <input type="radio" name="bg" value="aqua"> <span style="background-color: aqua">aqua</span>
                        <br>
                        <input type="radio" name="bg" value="gold"> <span style="background-color: gold">gold</span>
                        <br>
                        <input type="radio" name="bg" value="pink"> <span style="background-color: pink">pink</span>
                        <br>
                        <input type="radio" name="bg" value="beige"> <span style="background-color: beige">beige</span>
                        <br>
                        <input type="radio" name="bg" value="white"> <span style="background-color: white">white</span>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" value="Envoyer">
                        <input type="reset" value="Annuler">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</main>
<?php
include("vue/bas.php");