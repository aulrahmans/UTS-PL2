<form action="<?= url('login/proses'); ?>" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
    <table border="1">
        <tr>
            <td colspan="2">Login</td>
        </tr>
        <tr>
            <td>Username :</td>
            <td><input type="text" name="username" value="" required></td>
        </tr>
        <tr>
            <td>Password :</td>
            <td><input type="password" name="password" value="" required></td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="submit" name="proses" value="✔ Login">
            </td>
        </tr>
    </table>
</form>