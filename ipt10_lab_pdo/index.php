<?php

require_once "config.php";

$sql = "SELECT * FROM students ORDER BY enrolment_date DESC";

$stmt = $pdo->query($sql);

$students = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Management - PDO</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5f3ff, #e9d5ff);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1350px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            margin: 0;
            color: #6d28d9;
            font-size: 30px;
        }

        .page-subtitle {
            color: #777;
            margin-top: 8px;
            margin-bottom: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            border: none;
            white-space: nowrap;
        }

        .btn-primary {
            background: #7c3aed;
            color: white;
            padding: 12px 18px;
        }

        .btn-primary:hover {
            background: #6d28d9;
        }

        .btn-view {
            background: #ede9fe;
            color: #6d28d9;
        }

        .btn-view:hover {
            background: #ddd6fe;
        }

        .btn-edit {
            background: #f3f4f6;
            color: #444;
        }

        .btn-edit:hover {
            background: #e5e7eb;
        }

        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        .table-container {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            min-width: 1100px;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: #f8f7ff;
            color: #6d28d9;
            text-align: left;
            padding: 15px 14px;
            font-size: 13px;
            text-transform: uppercase;
            border-bottom: 2px solid #e9d5ff;
            white-space: nowrap;
        }

        td {
            padding: 17px 14px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        tr:hover {
            background: #faf9ff;
        }

        th:nth-child(1),
        td:nth-child(1) {
            width: 18%;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 11%;
        }

        th:nth-child(3),
        td:nth-child(3) {
            width: 8%;
        }

        th:nth-child(4),
        td:nth-child(4) {
            width: 20%;
        }

        th:nth-child(5),
        td:nth-child(5) {
            width: 18%;
        }

        th:nth-child(6),
        td:nth-child(6) {
            width: 12%;
        }

        th:nth-child(7),
        td:nth-child(7) {
            width: 13%;
        }

        .student-name {
            font-weight: bold;
            color: #333;
            line-height: 1.2;
        }

        .student-number {
            font-size: 13px;
            color: #7c3aed;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: nowrap;
            white-space: nowrap;
            min-width: 180px;
        }

        .actions .btn {
            flex-shrink: 0;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }

        @media (max-width: 800px) {

            body {
                padding: 20px 10px;
            }

            .card {
                padding: 20px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .page-title {
                font-size: 26px;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Student Management
                </h1>

                <p class="page-subtitle">
                    Manage your student records.
                </p>

            </div>

            <a href="create.php" class="btn btn-primary">
                + Add Student
            </a>

        </div>

        <div class="table-container">

            <?php if (count($students) > 0): ?>

                <table>

                    <thead>

                        <tr>

                            <th>Student</th>
                            <th>Birthday</th>
                            <th>Sex</th>
                            <th>Email</th>
                            <th>Program</th>
                            <th>Enrolment Date</th>
                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($students as $student): ?>

                            <tr>

                                <td>

                                    <div class="student-name">

                                        <?php
                                        echo htmlspecialchars(
                                            $student["first_name"] . " " .
                                            $student["middle_name"] . " " .
                                            $student["last_name"]
                                        );
                                        ?>

                                    </div>

                                    <div class="student-number">

                                        <?php
                                        echo htmlspecialchars(
                                            $student["student_number"]
                                        );
                                        ?>

                                    </div>

                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $student["birthday"]
                                    );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $student["sex"]
                                    );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $student["email"]
                                    );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $student["program"]
                                    );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $student["enrolment_date"]
                                    );
                                    ?>
                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                            href="view.php?id=<?php echo urlencode($student['id']); ?>"
                                            class="btn btn-view"
                                        >
                                            View
                                        </a>

                                        <a
                                            href="edit.php?id=<?php echo urlencode($student['id']); ?>"
                                            class="btn btn-edit"
                                        >
                                            Edit
                                        </a>

                                        <a
                                            href="delete.php?id=<?php echo urlencode($student['id']); ?>"
                                            class="btn btn-delete"
                                            onclick="return confirm('Are you sure you want to delete this student?');"
                                        >
                                            Delete
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            <?php else: ?>

                <div class="empty">

                    <h3>No students found.</h3>

                    <p>
                        Click "Add Student" to create your first student record.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

</body>

</html>