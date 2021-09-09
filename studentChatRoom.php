<?php
require_once 'include/header2.php';
?>

<div class="container-fluid body-section mt-5 pt-5">
    <div class="row">
        <div class="col-md-3">
            <?php
            require_once 'include/sidebar2.php';
            $chatRoomName = $_GET['chatRoomName'];
            $findChatRoom = "SELECT * FROM messages WHERE videoTitle='$chatRoomName'";
            $runQuery = mysqli_query($conn, $findChatRoom);
            $row10 = mysqli_fetch_assoc($runQuery);
            $videoId = $row10['videoId'];
            ?>
        </div>
        <div class="col-md-9">
            <h1><i class="fas fa-users"></i> Student <small>Profile Overview</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i> Profile</li>
            </ol>
            <hr>
            <h1 class="pb-3">Video Chat Rooms:</h1>
            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Messages</h1>

                    <div class="card">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                    <div class="d-flex align-items-center py-1">
                                        <div class="flex-grow-1 pl-3">
                                            <strong>VIDEO ADDITION IN HTML CHAT ROOM:</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="position-relative">
                                    <div class="chat-messages p-4">
                                        <?php
                                        $studentUid = $_SESSION['useruid'];
                                        $chatRoomName = $_GET['chatRoomName'];
                                        $query = "SELECT * FROM teacher t INNER JOIN messages m ON t.teacherUid=m.senderUid WHERE videoTitle='$chatRoomName'";
                                        $run = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($run) > 0) {
                                        ?>
                                            <?php
                                            while ($row = mysqli_fetch_array($run)) {
                                                $senderUid = $row['senderUid'];
                                                $senderMessage = $row['senderMessage'];
                                                $messageTime = $row['messageTime'];
                                            ?>
                                                <div class="chat-message-left pb-4">
                                                    <div>
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                        <div class="text-muted small text-nowrap mt-2"><?php echo $messageTime; ?></div>
                                                    </div>
                                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                        <div class="font-weight-bold mb-1">
                                                            <p style="color: red;"><?php echo $senderUid; ?>: Teacher</p>
                                                        </div>
                                                        <p><?php echo $senderMessage; ?></p>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        } else {
                                            echo "<center><h2>No response from teacher right now</h2></center>";
                                        }
                                        ?>
                                        <?php
                                        $query = "SELECT * FROM student s INNER JOIN messages m ON s.studentUid=m.senderUid WHERE videoTitle='$chatRoomName' AND s.studentUid!='$studentUid'";
                                        $run = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($run) > 0) {
                                        ?>
                                            <?php
                                            while ($row = mysqli_fetch_array($run)) {
                                                $senderUid = $row['senderUid'];
                                                $senderMessage = $row['senderMessage'];
                                                $messageTime = $row['messageTime'];
                                            ?>
                                                <div class="chat-message-left pb-4">
                                                    <div>
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                        <div class="text-muted small text-nowrap mt-2"><?php echo $messageTime; ?></div>
                                                    </div>
                                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                        <div class="font-weight-bold mb-1"><?php echo $senderUid; ?></div>
                                                        <p><?php echo $senderMessage; ?></p>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        } else {
                                            echo "<center><h2>No response from other student right now</h2></center>";
                                        }
                                        ?>
                                        <?php
                                        $query = "SELECT * FROM messages WHERE senderUid ='$studentUid' AND videoTitle='$chatRoomName'";
                                        $run = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($run)) {
                                            $senderUid = $row['senderUid'];
                                            $senderMessage = $row['senderMessage'];
                                            $messageTime = $row['messageTime'];
                                        ?>

                                            <div class="chat-message-right pb-4">
                                                <div>
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                    <div class="text-muted small text-nowrap mt-2"><?php echo $messageTime; ?></div>
                                                </div>
                                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                    <div class="font-weight-bold mb-1"><?php echo $senderUid; ?></div>
                                                    <?php echo $senderMessage; ?>
                                                </div>
                                            </div>
                                        <?php
                                        } ?>

                                    </div>
                                </div>

                                <div class="flex-grow-0 py-3 px-4 border-top">
                                    <form action="include/studentResponse.inc.php?videoTitle=<?php echo $chatRoomName; ?>&videoId=<?php echo $videoId; ?>" method="post">
                                        <div class="input-group">
                                            <textarea class="form-control" name="message" id="" cols="50" rows="5" placeholder="Type message here" required></textarea>
                                            <button class="btn btn-sm btn-primary text-uppercase" type="submit" name="submit">Send</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
</div>
<?php
require_once 'include/footer.php';
?>