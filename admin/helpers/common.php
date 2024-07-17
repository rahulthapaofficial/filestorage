<?php
function checkFolderIfExists($slug)
{
    global $conn;
    $sql = "SELECT * FROM folders WHERE slug = '$slug'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function checkFileIfExists($slug)
{
    global $conn;
    $sql = "SELECT * FROM files WHERE slug = '$slug'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function getFolders()
{
    global $conn;
    $sql = "SELECT * FROM folders ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
    $folders = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $row['total_files'] = getTotalFilesByFolderId($row['id']);
        $row['creator'] = getUserNameById($row['user_id']);
        $folders[] = $row;
    }
    return $folders;
}

function getTrashFolders()
{
    global $conn;
    $sql = "SELECT * FROM folders WHERE deleted_at IS NOT NULL";
    $query = mysqli_query($conn, $sql);
    $folders = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $row['total_files'] = getTotalFilesByFolderId($row['id']);
        $row['creator'] = getUserNameById($row['user_id']);
        $folders[] = $row;
    }
    return $folders;
}

function getFolderNameById($folderId)
{
    global $conn;
    $sql = "SELECT * FROM folders WHERE id = $folderId";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    return $row['name'];
}

function getFolderSlugById($folderId)
{
    global $conn;
    $sql = "SELECT slug FROM folders WHERE id = '$folderId'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $folderName = $row['slug'];
    return $folderName;
}

function getFiles($fileType = null)
{
    global $conn;
    $sql = "SELECT * FROM files";
    if ($fileType != null) {
        if ($fileType == 'image') {
            $sql .= " WHERE type = 'jpg' OR type = 'png' OR type = 'jpeg'";
        } else if ($fileType == 'video') {
            $sql .= " WHERE type = 'mp4' OR type = 'avi' OR type = 'mkv'";
        } else if ($fileType == 'pdf') {
            $sql .= " WHERE type = '$fileType'";
        } else if ($fileType == 'document') {
            $sql .= " WHERE type = 'pdf' OR type = 'doc' OR type = 'docx' OR type = 'txt' OR type = 'xls' OR type = 'xlsx' OR type = 'ppt' OR type = 'pptx' OR type = 'csv'";
        } else if ($fileType == 'spreadsheet') {
            $sql .= " WHERE type = 'xls' OR type = 'xlsx' OR type = 'csv' OR type = 'ods' OR type = 'tsv'";
        } else if ($fileType == 'presentation') {
            $sql .= " WHERE type = 'ppt' OR type = 'pptx' OR type = 'odp' OR type = 'pps' OR type = 'ppsx' OR type = 'odp' OR type = 'pot' OR type = 'potx'";
        }
    }
    $sql .= " ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
    $files = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $userId = $row['user_id'];
        if ($row['type'] == 'pptx') {
            $imageUrl = BASE_URL . 'assets/images/file-type/ppt.png';
        } else {
            $imageUrl = BASE_URL . 'assets/images/file-type/' . $row['type'] . '.png';
        }
        if ($row['folder_id']) {
            $row['folder_name'] = getFolderNameById($row['folder_id']);
            $folderSlug = getFolderSlugById($row['folder_id']);
            $fileDirectory = BASE_URL . 'public/storage/users/' . $userId . '/' . $folderSlug . '/' . $row['slug'] . '.' . $row['type'];
        } else {
            $row['folder_name'] = '-';
            $fileDirectory = BASE_URL . 'public/storage/users/' . $userId . '/' . $row['slug'] . '.' . $row['type'];
        }
        if ($row['type'] == 'jpg' || $row['type'] == 'jpeg' || $row['type'] == 'png' || $row['type'] == 'gif') {
            $row['image_url'] = $fileDirectory;
        } else {
            $row['image_url'] = $imageUrl;
        }
        $row['file_name'] = $row['slug'] . '.' . $row['type'];
        $row['file_dir'] = $fileDirectory;
        $row['creator'] = getUserNameById($userId);
        $files[] = $row;
    }
    return $files;
}

function getTrashFiles($fileType = null)
{
    global $conn;
    $sql = "SELECT * FROM files WHERE deleted_at IS NOT NULL";
    if ($fileType != null) {
        if ($fileType == 'image') {
            $sql .= " AND type = 'jpg' OR type = 'png' OR type = 'jpeg'";
        } else if ($fileType == 'video') {
            $sql .= " AND type = 'mp4' OR type = 'avi' OR type = 'mkv'";
        } else if ($fileType == 'pdf') {
            $sql .= " AND type = '$fileType'";
        } else if ($fileType == 'document') {
            $sql .= " AND type = 'pdf' OR type = 'doc' OR type = 'docx' OR type = 'txt' OR type = 'xls' OR type = 'xlsx' OR type = 'ppt' OR type = 'pptx' OR type = 'csv'";
        } else if ($fileType == 'spreadsheet') {
            $sql .= " AND type = 'xls' OR type = 'xlsx' OR type = 'csv' OR type = 'ods' OR type = 'tsv'";
        } else if ($fileType == 'presentation') {
            $sql .= " AND type = 'ppt' OR type = 'pptx' OR type = 'odp' OR type = 'pps' OR type = 'ppsx' OR type = 'odp' OR type = 'pot' OR type = 'potx'";
        }
    }
    $query = mysqli_query($conn, $sql);
    $files = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $userId = $row['user_id'];
        if ($row['type'] == 'pptx') {
            $imageUrl = BASE_URL . 'assets/images/file-type/ppt.png';
        } else {
            $imageUrl = BASE_URL . 'assets/images/file-type/' . $row['type'] . '.png';
        }
        if ($row['folder_id']) {
            $folderSlug = getFolderSlugById($row['folder_id']);
            $fileDirectory = BASE_URL . 'public/storage/users/' . $userId . '/' . $folderSlug . '/' . $row['slug'] . '.' . $row['type'];
        } else {
            $fileDirectory = BASE_URL . 'public/storage/users/' . $userId . '/' . $row['slug'] . '.' . $row['type'];
        }
        if ($row['type'] == 'jpg' || $row['type'] == 'jpeg' || $row['type'] == 'png' || $row['type'] == 'gif') {
            $row['image_url'] = $fileDirectory;
        } else {
            $row['image_url'] = $imageUrl;
        }
        $row['file_name'] = $row['slug'] . '.' . $row['type'];
        $row['file_dir'] = $fileDirectory;
        $row['creator'] = getUserNameById($userId);
        $files[] = $row;
    }
    return $files;
}

function getFilesByFolderSlug($folderSlug)
{
    global $conn;
    $sql = "SELECT id FROM folders WHERE slug = '$folderSlug'";
    $query = mysqli_query($conn, $sql);
    $folderId = mysqli_fetch_array($query)['id'];
    $fileSql = "SELECT * FROM files WHERE folder_id = $folderId";
    $fileQuery = mysqli_query($conn, $fileSql);
    $files = [];
    if (mysqli_num_rows($fileQuery)) {
        while ($row = mysqli_fetch_assoc($fileQuery)) {
            $userId = $row['user_id'];
            if ($row['type'] == 'pptx') {
                $imageUrl = BASE_URL . 'assets/images/file-type/ppt.png';
            } else {
                $imageUrl = BASE_URL . 'assets/images/file-type/' . $row['type'] . '.png';
            }
            $fileDirectory = BASE_URL . 'public/storage/users/' . $userId . '/' . $folderSlug . '/' . $row['slug'] . '.' . $row['type'];
            if ($row['type'] == 'jpg' || $row['type'] == 'jpeg' || $row['type'] == 'png' || $row['type'] == 'gif') {
                $row['image_url'] = $fileDirectory;
            } else {
                $row['image_url'] = $imageUrl;
            }
            $row['file_name'] = $row['slug'] . '.' . $row['type'];
            $row['file_dir'] = $fileDirectory;
            $files[] = $row;
        }
    }
    return $files;
}

function getTotalFilesByFolderId($folderId)
{
    global $conn;
    $sql = "SELECT * FROM files WHERE folder_id = $folderId";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    return $count;
}

function getUsers()
{
    global $conn;
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
    $users = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $totalFolders = getTotalFoldersByUserId($row['id']);
        $totalFiles = getTotalFilesByUserId($row['id']);
        $row['total_folders'] = $totalFolders;
        $row['total_files'] = $totalFiles;
        $users[] = $row;
    }
    return $users;
}

function getTotalFoldersByUserId($userId)
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM folders WHERE user_id = '$userId'";
    $query = mysqli_query($conn, $sql);
    $totalFolders = 0;
    if (mysqli_num_rows($query)) {
        $totalFolders = mysqli_fetch_array($query)['COUNT(*)'];
    }
    return $totalFolders;
}

function getTotalFilesByUserId($userId)
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM files WHERE user_id = '$userId'";
    $query = mysqli_query($conn, $sql);
    $totalFiles = 0;
    if (mysqli_num_rows($query)) {
        $totalFiles = mysqli_fetch_array($query)['COUNT(*)'];
    }
    return $totalFiles;
}

function countTotalUsers()
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM users";
    $query = mysqli_query($conn, $sql);
    $totalUsers = 0;
    if (mysqli_num_rows($query)) {
        $totalUsers = mysqli_fetch_array($query)['COUNT(*)'];
    }
    return $totalUsers;
}

function countTotalPackages()
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM packages";
    $query = mysqli_query($conn, $sql);
    $totalPackages = 0;
    if (mysqli_num_rows($query)) {
        $totalPackages = mysqli_fetch_array($query)['COUNT(*)'];
    }
    return $totalPackages;
}

function countTotalFolders()
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM folders";
    $query = mysqli_query($conn, $sql);
    $totalFolders = 0;
    if (mysqli_num_rows($query)) {
        $totalFolders = mysqli_fetch_array($query)['COUNT(*)'];
    }
    return $totalFolders;
}

function countTotalFiles()
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM files";
    $query = mysqli_query($conn, $sql);
    $totalFiles = 0;
    if (mysqli_num_rows($query)) {
        $totalFiles = mysqli_fetch_array($query)['COUNT(*)'];
    }
    return $totalFiles;
}

function getUserNameById($userId)
{
    global $conn;
    $sql = "SELECT CONCAT(first_name, last_name) AS name FROM users WHERE id = '$userId'";
    $query = mysqli_query($conn, $sql);
    $userName = '';
    if (mysqli_num_rows($query)) {
        $userName = mysqli_fetch_array($query)['name'];
    }
    return $userName;
}

function getPackages()
{
    global $conn;
    $sql = "SELECT * FROM packages";
    $query = mysqli_query($conn, $sql);
    $packages = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $size = $row['storage_size'];
        if ($size >= (1024 * 1024)) {
            $storageSize = number_format($size / (1024 * 1024), 0);
            $row['storage_size'] = $storageSize . ' GB';
        } else if ($size >= 1024 && $size < (1024 * 1024)) {
            $storageSize = number_format($size / 1024, 0);
            $row['storage_size'] = $storageSize . ' MB';
        } else {
            $storageSize = number_format($size, 0);
            $row['storage_size'] = $storageSize . ' KB';
        }
        $packages[] = $row;
    }
    return $packages;
}

function getPaymentSetups()
{
    global $conn;
    $sql = "SELECT * FROM payment_setups ORDER BY id DESC LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $paymentSetups = mysqli_fetch_assoc($query);
    return $paymentSetups;
}

function getPackageById($id)
{
    global $conn;
    $sql = "SELECT * FROM packages WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    $package = mysqli_fetch_assoc($query);
    return $package;
}

function getSubscriptions()
{
    global $conn;
    $sql = "SELECT * FROM subscriptions ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
    $subscriptions = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $row['user_name'] = getUserNameById($row['user_id']);
        $packageData = getPackageById($row['package_id']);
        $row['package_name'] = $packageData['name'];
        $size = $packageData['storage_size'];
        if ($size >= (1024 * 1024)) {
            $storageSize = number_format($size / (1024 * 1024), 0);
            $row['storage_size'] = $storageSize . ' GB';
        } else if ($size >= 1024 && $size < (1024 * 1024)) {
            $storageSize = number_format($size / 1024, 0);
            $row['storage_size'] = $storageSize . ' MB';
        } else {
            $storageSize = number_format($size, 0);
            $row['storage_size'] = $storageSize . ' KB';
        }
        $row['duration'] = $packageData['price'] . ' / ' . $packageData['duration'];
        $row['subscribed_on'] = date('jS M, Y h:i:s A', strtotime($row['created_at']));
        $subscriptions[] = $row;
    }
    return $subscriptions;
}
