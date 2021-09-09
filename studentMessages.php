<?php
require_once 'include/header2.php';
?>

<div class="container-fluid body-section mt-5 pt-5">
    <div class="row">
        <div class="col-md-3">
            <?php
            require_once 'include/sidebar2.php';
            ?>
        </div>
        <div class="col-md-9">
            <h1><i class="fas fa-tachometer-alt"></i> Dashboard <small>Statistic Overview</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i> Dashboard</li>
            </ol>
            <hr>
            <h1 class="pb-3">Video Chat Rooms:</h1>
            <?php
            $studentUid = $_SESSION['useruid'];
            $count = 0;
            $query = "SELECT DISTINCT videoTitle, senderUid FROM messages WHERE senderUid = '$studentUid'";
            $run = mysqli_query($conn, $query);
            if (mysqli_num_rows($run) > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Sr #</th>
                                <th>Chat Room Name</th>
                                <th>Chat Room Member</th>
                                <th>Open Chat Room</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($run)) {
                                $videoTitle = ucfirst($row['videoTitle']);
                                $count++;
                            ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $videoTitle; ?></td>
                                    <td><?php echo $studentUid; ?></td>
                                    <td class="d-flex justify-content-center"><a class="btn btn-sm btn-primary px-1" href="studentChatRoom.php?chatRoomName=<?php echo $videoTitle; ?>" role="button">Open Chat room</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
                echo "<center><h2>No chat room right now</h2></center>";
            }
            ?>
            </table>


        </div>
    </div>
</div>
<?php
require_once 'include/footer.php';
?>