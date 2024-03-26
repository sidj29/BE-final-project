<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include('connection.php');
    $query = "SELECT doc FROM userdetail WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $docPath = $row['doc'];
        $uploadsDirectory = "uploads/"; // Change this to the actual directory where your documents are stored

        // Combine the directory and file path
        $fullPath = $uploadsDirectory . $docPath;

        if (file_exists($fullPath)) {
            // Set appropriate headers for a download
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment; filename=downloaded_document.pdf");

            // Output the document content
            readfile($fullPath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Document not found for user ID: $id";
    }
} else {
    echo "Invalid user ID.";
}
?>
