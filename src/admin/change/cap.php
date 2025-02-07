<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../lib/db_con.php'; // Include the file containing database connection settings

    // Check if a file was uploaded
    if (isset($_FILES['cap']) && $_FILES['cap']['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = "../uploads/";
        $name_x = $_FILES["cap"]["name"];
        $name = "pic_" . date('YmdHis') . "_" . rand(10, 999999) . "_" . $name_x;
        $targetFilePath = $targetDirectory . $name;

        // Check if the file has been uploaded and move it to the target directory
        if (move_uploaded_file($_FILES['cap']['tmp_name'], $targetFilePath)) {
            // Prepare SQL query to insert image name into the database
            $sql = "INSERT INTO images (name) VALUES (?)";
            $stmt = $conn->prepare($sql);

            // Bind the image name as parameter and execute the query
            $stmt->bind_param("s", $name);
            if ($stmt->execute()) {
                echo "Image uploaded successfully.";
            } else {
                echo "Error uploading image to database: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "No image selected or error uploading the image.";
    }

    // Close connection
    $conn->close();
}
