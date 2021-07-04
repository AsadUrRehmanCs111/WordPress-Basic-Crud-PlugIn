<?php
global $wpdb;
$all_students = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT * from insertrecord",
        ""
    ),
    ARRAY_A
);

$action = isset($_GET['action']) ? trim($_GET['action']) : "";
$id = isset($_GET['id']) ? intval($_GET['id']) : "";
if (!empty($action) && $action == "delete") {

    $wpdb->delete("insertrecord", array(
        "id" => $id
    ));
?>
    <script>
        location.href = "<?php echo site_url() ?>/wp-admin/admin.php?page=wp-record-plugin";
    </script>
<?php
}

if (count($all_students) > 0) {
?>
    <style>
        table {
            width: 80%;
            margin: 0 auto;
        }

        h1 {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .info {
            background-color: blue;
            color: white;
        }

        .danger {
            background-color: red;
            color: white;
        }
    </style>
    <h1 style="text-align: center; font-weight: bold;">All Participent Record</h1>
    <table cellpadding="10" border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Sur Name</th>
            <th>Address</th>
            <th>Module</th>
            <th>certificateNo</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
        $count = 1;
        foreach ($all_students as $index => $student) {
        ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $student['name']; ?> </td>
                <td> <?php echo $student['surName']; ?> </td>
                <td> <?php echo $student['address']; ?> </td>
                <td><?php echo $student['date']; ?> </td>
                <td> <?php echo $student['module']; ?> </td>
                <td> <?php echo $student['certificateNo']; ?> </td>
                <td>
                    <a href="admin.php?page=wp-record-add&action=edit&id=<?php echo $student['id']; ?>"><button class="info">Edit</button></a>
                    <a href="admin.php?page=wp-record-plugin&id=<?php echo $student['id']; ?>&action=delete" onclick="return confirm('Are you sure want to delete?')"><button class="danger">Delete</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

<?php
}
?>