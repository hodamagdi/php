<?php
$website_name='Application Name';
define('website_name','Application Name');
echo $website_name;
?>

<html>
    <body>
        <form action = "<?php $_PHP_SELF ?>" method = "GET">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type = "text" name = "name" /></td>
                </tr>

                <tr>
                    <td>E_mail:</td>
                    <td><input type = "text" name = "email" /></td>
                </tr>

                <tr>
                    <td>Group:</td>
                    <td><input type = "text" name = "group" /></td>
                </tr>

                <tr>
                    <td>Class Details:</td>
                    <td><textarea name = "class" ></textarea></td>
                </tr>

                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type = "radio" name = "gender" value="Male"/>Male
                        <input type = "radio" name = "gender" value="female"/>Female
                    </td>
                </tr>

                <tr>
                    <td>Select courses:</td>
                    <td><select multiple size="4" name="courses[]">
                        <option value="php">PHP</option>
                        <option value="javascript">JavaScript</option>
                        <option value="mysql">MySQL</option>
                        <option value="html">HTML</option>
                     </select></td>
                </tr>

                <tr>
                    <td>Agree</td>
                    <td><input type = "checkbox" name = "agree" /></td>
                </tr>

                <tr>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
 if(isset($_REQUEST["name"]) or isset($_REQUEST["email"]) or isset($_REQUEST["group"])
 or isset($_REQUEST["class"]) or isset($_REQUEST["gender"]) or isset($_REQUEST["courses"])){
    echo "Your given values". "<br/>";
    echo "Name:". $_REQUEST['name']. "<br/>";
    echo "E_mail:". $_REQUEST['email']."<br/>";
    echo "Group:".$_REQUEST['group']. "<br/>";
    echo "class details:".$_REQUEST['class']."<br/>";
    echo "Gender:".$_REQUEST['gender']."<br/>";
    echo "Selected Courses are:".implode(', ', $_REQUEST['courses'])."<br/>";
    exit();
 }
?>

