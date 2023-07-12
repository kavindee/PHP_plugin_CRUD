<?php

function student_insert()
{
    ?>
    <style>
        #heading2{
            background-color: #D5F5CA;
            text-align: center;
        }
        .center{
            margin-left: auto;
            margin-right: auto;
        }
        </style>

<table class="center">
    <thead>
    <tr>
        <th></th>
        <div id = "heading2" class="wrap">
        <h2>Insert Student Details</h2>
        <hr>
    </div>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <form name="frm" action="#" method="post">
    <tr>
        <th>Name</th>
        <td><input type="text" size="30" placeholder ="Enter Name" name="nm"></td>
    </tr>
    <tr>
        <th>Address:</th>
        <td><input type="text" size="30" placeholder ="Enter Address"  name="adrs"></td>
    </tr>
    <tr>
        <th>Gender:</th>
        <td><select name="gen">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Contact no:</th>
        <td><input type="number" placeholder ="07X-XXXXXXX" name="mob"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Insert" name="ins"></td>
    </tr>
    </form>
    </tbody>
</table>

<?php
    if(isset($_POST['ins'])){
        global $wpdb;
        
        $nm=$_POST['nm'];
        $ad=$_POST['adrs'];
        $gn=$_POST['gen'];
        $m=$_POST['mob'];
        $table_name = $wpdb->prefix . 'student_list';

        $wpdb->insert(
            $table_name,
            array(
                'name' => $nm,
                'address' => $ad,
                'gender' => $gn,
                'contact'=>$m
            )
        );
        echo "inserted successfully";
      
        ?>
        <meta http-equiv="refresh" content="1; url=http://localhost/wplearn/wp-admin/admin.php?page=Student_Listing" />
        <?php
        exit;
    }
}

?>