<?php

function student_delete()
{
    if (isset($_GET['id'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'student_list';
        $i = $_GET['id'];
       
        //get student name
        $students = $wpdb->get_results("SELECT name FROM $table_name WHERE id=$i");
        $nm = $students[0]->name;
        
        if (isset($_POST['confirm_delete'])) {
            // Delete the student record

            $wpdb->delete(
                $table_name,
                array('id' => $i)
            );
            
            echo '<p>Student deleted successfully.</p>';
            ?>
            <meta http-equiv="refresh" content="1; url=http://localhost/wplearn/wp-admin/admin.php?page=Student_Listing" />
    
            <?php

        } else {
            ?>

            <!-- <script>
                var studentName = '<?php echo $nm; ?>';
                if (confirm('Are you sure you want to delete this student (' + studentName + ')?')) {
                    document.getElementById('deleteForm').submit();
                } else {
                    window.history.back();
                }
            </script> -->

            <p>Are you sure you want to delete this student (<?php echo $nm; ?>)?</p>
            <form id="deleteForm" method="post">
                <input type="submit" name="confirm_delete" value="Delete">
                <input type="button" value="Cancel" onclick="window.history.back();">
            </form>

            <?php
        }
    }
}

?>
