<?php
//[student_list]
add_shortcode('student_list','student_list');

function student_list() {
    ?>
    <style>
        table {
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
        th{
            background-color: #66E33E;
        }
        td{
            background-color: #D5F5CA;
        }
        h1{
            text-align: center;
        }
        .center {
             margin-left: auto;
            margin-right: auto;
        }
        #dlt{
            background-color: red;
        }
        #updt{
            background-color: yellow;
        } 
    </style>

    <div class="wrap">
        <table class="center">
            <thead>
                <h1>Student Details</h1>
                <hr>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                global $wpdb;
                $table_name = $wpdb->prefix . 'student_list';
                $students = $wpdb->get_results("SELECT id,name, address, contact, gender from $table_name");
                foreach ($students as $student) {
                    ?>
                    <tr>
                        <td><?=$student->id; ?></td>
                        <td><?=$student->name; ?></td>
                        <td><?=$student->address; ?></td>
                        <td><?=$student->gender; ?></td>
                        <td><?=$student->contact; ?></td>
                        <td id="updt"><a style="color:black;" href ="<?php echo admin_url('admin.php?page=Student_Update&id=' . $student->id); ?>">Update</a></td>
                        <td id="dlt"><a style="color:black;" href ="<?php echo admin_url('admin.php?page=Student_Delete&id=' . $student->id); ?>">Delete</a></td>
                    </tr>
            <?php } ?>
                </tbody>
        </table>
    </div>
    <?php
}
add_shortcode('short_student_list', 'student_list');


?>

