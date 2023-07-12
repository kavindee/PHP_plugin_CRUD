<?php

//Create function student can update
function student_update(){
    //assigne student id for variable 'i'
    $i=$_GET['id'];

    global $wpdb;
    // get table
    $table_name = $wpdb->prefix . 'student_list';
    $students = $wpdb->get_results("SELECT id,name,address,gender,contact FROM $table_name WHERE id=$i");
    ?>
    <style>

        #heading1{
            background-color: #D5F5CA;
            text-align: center;
        }
        <style>
        h2{
            background-color: #D5F5CA;
            text-align: center;
        }
        .center{
            margin-left: auto;
            margin-right: auto;
        }
        #cnt{
           text-align: center;
        }

        </style>
        </style>
    <table class="center">
        <thead>
            <tr>
                <th></th>
                <div id="heading1" class="wrap">
                <h2>Update Student Details</h2>
                
                <div id ="cnt" class="center">
                <?php
                echo "Student ID: " . $students[0]->id;
                ?>
                </div>
                </div>
                <hr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <form name ="frm" action ="#" method="post">
                <input type = "hidden" name ="id" value="<?= $students[0]->id; ?>">
                <tr>
                    <th>Name:</th>
                    <td><input type="text" size="30" name="nm" value="<?=$students[0]->name; ?>"></td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td><input type="text" size="30" name="adrs" value="<?=$students[0]->address; ?>"></td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td><select name="gen" >
                            <option value="male" <?php if($students[0]->gender=="male"){echo "selected";}?>> Male </option>
                            <option value="female" <?php if($students[0]->gender=="female"){echo "selected";}?>> Female </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Contact No:</th>
                    <td><input type="number" name="cn" value="<?=$students[0]->contact; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Update" name="upd"></td>
                </tr>
            </form>
        </tbody>
    </table>

    <?php
}
if(isset($_POST['upd']))
{
    global $wpdb;
    $table_name=$wpdb->prefix . 'student_list';

    $id = $_POST['id'];
    $nm = $_POST['nm'];
    $adrs = $_POST['adrs'];
    $gen = $_POST['gen'];
    $cn = $_POST['cn'];
    
    $wpdb->update(
        $table_name,
        array(
            'name'=>$nm,
            'address'=>$adrs,
            'gender'=>$gen,
            'contact'=>$cn
        ),
        array(
            'id'=>$id
        )
     );

        $url=admin_url('admin.php?page=Student_List');
       header("location:http://localhost/wplearn/wp-admin/admin.php?page=Student_Listing");
}
?>