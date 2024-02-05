<?php
$website_name='Application Name';
define('website_name','Application Name');
echo $website_name;
?>

<html>
    <body>
        <form action = "<?php $_PHP_SELF ?>" method = "POST">
            <table>
                <tr>
                    <td>Name:</td>
                    <td>
                        <input type = "text" name = "name" />
                        <?php if (isset($_POST["submit"]) && empty($_POST['name']))
                        echo '<span class="error" style="color: red">*name is required</span>'; ?>
                    </td>
                    
                </tr>

                <tr>
                    <td>E_mail:</td>
                    <td><input type = "text" name = "email" />
                        <?php if (isset($_POST["submit"]) && empty($_POST['email']))
                         echo '<span class="error" style="color: red">*email is required</span>'; ?>
                    </td>
                </tr>

                <tr>
                    <td>Group:</td>
                    <td><input type = "text" name = "group" />
                        <?php if (isset($_POST["submit"]) && empty($_POST['group']))
                         echo '<span class="error" style="color: red">*Group is required</span>'; ?>
                    </td>
                </tr>

                <tr>
                    <td>Class Details:</td>
                    <td><textarea name = "class"  ></textarea>
                        <?php if (isset($_POST["submit"]) && empty($_POST['class']))
                         echo '<span class="error" style="color: red">*</span>'; ?>
                    </td>
                </tr>

                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type = "radio" name = "gender" value="Male" />Male
                        <input type = "radio" name = "gender" value="female" />Female
                        <?php if (isset($_POST["submit"]) && empty($_POST['gender'])) 
                        echo '<span class="error" style="color: red">*Gender is required</span>'; ?>
                    </td>
                </tr>

                <tr>
                    <td>Select courses:</td>
                    <td>
                        <select multiple size="4" name="courses[]">
                            <option value="php">PHP</option>
                            <option value="javascript">JavaScript</option>
                            <option value="mysql">MySQL</option>
                            <option value="html">HTML</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Agree</td>
                    <td>
                        <input type = "checkbox" name = "agree" />
                        <?php if (isset($_POST["submit"]) && empty($_POST["agree"]))
                         echo '<span class="error" style="color: red">*you must agree to terms</span>'; ?>
                    </td>
                </tr>

                <tr>
                    <td><input type="submit" value="Submit" name="submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
 
 if(isset($_POST["submit"])){
    $Name = $_POST['name'];
    $email = $_POST['email'];
    $Group = $_POST['group'];
    $class = $_POST['class']; 
    $Gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $courses = isset($_POST['courses']) ? $_POST['courses'] : [];
    echo "Your given values". "<br/>";
    $errors=[];
    //validation 
    if(empty($Name)){
       $errors[] ="name is required";
    }else{
        echo "Name:".$Name. "<br/>";
    }

    if(empty($email)){
       $errors[] ="email is required";
    }else{
        echo "E_mail:".$email."<br/>";
    }

    if(empty($Group)){
       $errors[] ="Group is required";
    }else{
        echo "Group:".$Group. "<br/>";
    }

    if(empty($class)){
       $errors[] ="class is required";
    }else{
        echo "class details:".$class."<br/>";
    }

    if(empty($Gender)){
       $errors[] ="Gender is required";
    }else{
        echo "Gender:".$Gender."<br/>";
    }

    if(empty($courses)){
       $errors[] ="courses is required";
    }else{
        echo "Selected Courses are:".implode(', ', $courses)."<br/>";
    }
  
 }else{
    echo '<span class="error" style="color: red">Please fill in all required fields</span>' ;
 }
?>