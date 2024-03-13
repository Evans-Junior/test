<?php
// Include the necessary files and functions
include '../settings/connection.php';
include '../functions/get_hall_id_fxn.php';
session_start();
if(!isset($_GET['hall_name']) || !isset($_GET['capacity'])){
    $_GET['hall_name']=$_SESSION['hall_name'];
     $_GET['capacity']=$_SESSION['capacity'];
}else{
    $_SESSION['hall_name'] = $_GET['hall_name'];
    $_SESSION['capacity'] = $_GET['capacity'];
}

$hall_id=search_hall_id( $_GET['hall_name'],  $_GET['capacity']);
include '../functions/get_all_rooms.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hall Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .navbar-brand {
            font-size: 25px;
            font-weight: bolder;
        }

        .navbar-nav .nav-link {
            margin-right: 15px;
        }

        .container {
            padding: 20px;
        }

        h1, h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-back {
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: #333;
        }

        input[type="text"],
        input[type="number"] {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }

        button[type="submit"] {
            background-color: #853E3E;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #6d2c2c;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            color: #666;
            margin-bottom: 15px;
        }

        .btn-edit {
            background-color: #853E3E;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-edit:hover {
            background-color: #6d2c2c;
        }

        .btn-add-room {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-add-room:hover {
            background-color: #666;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <!-- <img src="asbed_logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> -->
            ASBED
        </a>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Welcome, Admin Name
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../login/logout_view.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1>Edit <?php
            echo $_GET['hall_name'];
        ?></h1>
        <div class="btn-back d-flex justify-content-between">
            <a href="../admin/halls.php" class="btn btn-secondary">Back</a>
            <?php if (strtolower($_SESSION['role_id']) == 1): ?>
            <button class="btn btn-success btn-add-room" id='btn-add-room'>Add New Room</button>
            <button class="btn btn-danger btn-rm-students-to-room" id='btn-add-room'>Remove Students</button>
            <?php endif; ?>
            <button class="btn btn-danger btn-rm-student-to-room" id='btn-add-room'>Remove Student</button>
            <button class="btn btn-success btn-add-student-to-room" id='btn-add-student-to-room'>Give Out Room</button>
        </div>
        <?php if (strtolower($_SESSION['role_id']) == 1): ?>
        <form action="../actions/update_hall_action.php" method="post">
            <div class="form-group">
                <label for="hallName">Hall Name:</label>
                <input type="text" class="form-control" id="hallName" name="hallName" placeholder="Enter new hall name">
            </div>
            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <input type="hidden" name="hall_id" value="<?php echo $hall_id; ?>">
                <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Enter new capacity">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php endif; ?>
        <h2 style='margin-top:50px'>Available Rooms</h2>
        <div class="row justify-content-center flex-nowrap">
            <?php
            // Check if there are rooms available
            if (!empty($rooms)) {
                // Loop through each room and display as card
                foreach ($rooms as $room) {
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $room['room_name']; ?></h5>
                                <p class="card-text">Capacity: <?php echo $room['capacity']; ?></p>
                                <a href="#" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#editRoomModal_<?php echo $room['room_id']; ?>">Edit Room</a>
                            </div>
                        </div>
                    </div>
                     <!-- Modal for editing room -->
            <div class="modal fade" id="editRoomModal_<?php echo $room['room_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRoomModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRoomModalLabel">Edit Room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form to edit room details -->
                            <form action="../actions/edit_room_action.php" method="post">
                                <div class="form-group">
                                    <label for="editRoomName">Room Name:</label>
                                    <input type="text" class="form-control" id="editRoomName" name="editRoomName" value="<?php echo $room['room_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="editRoomCapacity">Capacity:</label>
                                    <input type="number" class="form-control" id="editRoomCapacity" name="editRoomCapacity" value="<?php echo $room['capacity']; ?>" required>
                                </div>
                                <input type="hidden" name="roomId" value="<?php echo $room['room_id']; ?>">
                                <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                // Display a message if no rooms are available
                echo "<div class='col-md-12 text-center'><p>No rooms created</p></div>";
            }
            ?>
        
      <!-- Modal for adding a new room -->
<div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoomModalLabel">Add New Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add the action attribute to submit the form to add_room__action.php -->
                <form id="addRoomForm" action="../actions/add_room_action.php" method="post">
                    <div class="form-group">
                        <label for="roomName">Room Name:</label>
                        <input type="text" class="form-control" id="roomName" name="roomName" placeholder="Enter room name" required>
                    </div>
                    <div class="form-group">
                        <label for="roomCapacity">Capacity:</label>
                        <input type="number" class="form-control" id="roomCapacity" name="roomCapacity" placeholder="Enter capacity" required>
                    </div>
                    <input type="hidden" id="hallId" name="hallId" value="<?php echo $hall_id; ?>">
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_room" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="addRoomBtn">Add Room</button>
            </div>
                </form>
            </div>
            
        </div>
    </div>
</div>



    </div>

    <script>
    document.getElementById('btn-add-room').addEventListener('click', function() {
        $('#addRoomModal').modal('show');
    });
    // document.getElementById('btn-edit').addEventListener('click', function() {
    //     $('#editRoomModal_').modal('show');
    // });
    // $(document).ready(function() {
    //     console.log('ready');
    //     // Show the modal when the "Add New Room" button is clicked
    //     $('.btn-add-room').click(function() {
    //         $('#addRoomModal').modal('show');
    //     });  
        
    //     $('.close_room').click(function() {
    //         $('#addRoomModal').modal('hide');
    //     }); 
        

        // // Handle form submission to add a new room
        // $('#addRoomBtn').click(function() {
        //     var formData = $('#addRoomForm').serialize();
        //     $.ajax({
        //         type: 'POST',
        //         url: 'add_room_action.php', // Specify the URL for the action file
        //         data: formData,
        //         success: function(response) {
        //             // Handle success response, such as showing a success message
        //             alert('Room added successfully.');
        //             $('#addRoomModal').modal('hide');
        //             // You can perform additional actions here, like updating the room list
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle error response, such as displaying an error message
        //             alert('An error occurred while adding the room.');
        //         }
        //     });
        // });
    // });
</script>
</body>
</html>
