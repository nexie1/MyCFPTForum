<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
?>
<form method="POST" action="#">
    <section>
        <article>
            <table>
                <tr>
                    <td>Email</td>
                    <td><input name="email" type="text" placeholder="Entrez un email" value="<?php echo $info["email"]; ?>" required></td>
                      <!--<td>Pseudo</td>-->
                    <!--<td><input name="pseudo" type="text" placeholder="Entrez un pseudo" value="<?php /*echo $info["pseudo"];*/ ?>" required></td>-->
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input name="password" type="password" placeholder="Entrez un mot de passe" value="" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Login" value="Se connecter"></td>
                </tr>
            </table>
        </article>
    </section>
</form>