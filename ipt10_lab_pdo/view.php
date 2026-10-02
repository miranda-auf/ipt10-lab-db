<?php

require_once "config.php";

if (!isset($_GET["id"])) {
    die("Student ID is missing.");
}

$id = $_GET["id"];

$sql = "SELECT * FROM students WHERE id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);

$student = $stmt->fetch();

if (!$student) {
    die("Student not found.");
}

function e($value) {
    return htmlspecialchars(
        $value ?? "",
        ENT_QUOTES,
        "UTF-8"
    );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Student - PDO</title>

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
            max-width: 900px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .student-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .student-icon {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background: #7c3aed;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
            font-weight: bold;
        }

        .student-name {
            font-size: 28px;
            font-weight: bold;
        }

        .student-number {
            color: #7c3aed;
            margin-top: 6px;
            font-weight: bold;
        }

        .section-title {
            color: #6d28d9;
            margin-bottom: 15px;
            font-size: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .info-box {
            background: #f8f7ff;
            padding: 18px;
            border-radius: 12px;
            border-left: 4px solid #7c3aed;
        }

        .info-box.full {
            grid-column: 1 / -1;
        }

        .info-label {
            font-size: 12px;
            color: #888;
            text-transform: uppercase;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .info-value {
            font-size: 16px;
            color: #333;
            word-break: break-word;
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 13px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-back {
            background: #eeeeee;
            color: #444;
        }

        .btn-edit {
            background: #7c3aed;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        @media (max-width: 700px) {

            .info-grid {
                grid-template-columns: 1fr;
            }

            .info-box.full {
                grid-column: auto;
            }

            .student-header {
                align-items: flex-start;
            }

            .card {
                padding: 25px;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <div class="student-header">

            <div class="student-icon">

                <?php
                echo strtoupper(
                    substr($student["first_name"], 0, 1)
                );
                ?>

            </div>

            <div>

                <div class="student-name">

                    <?php

                    echo e(
                        $student["first_name"] . " " .
                        $student["middle_name"] . " " .
                        $student["last_name"]
                    );

                    ?>

                </div>

                <div class="student-number">

                    <?php
                    echo e($student["student_number"]);
                    ?>

                </div>

            </div>

        </div>

        <h2 class="section-title">
            Student Information
        </h2>

        <div class="info-grid">

            <div class="info-box">

                <div class="info-label">
                    First Name
                </div>

                <div class="info-value">
                    <?php
                    echo e($student["first_name"]);
                    ?>
                </div>

            </div>

            <div class="info-box">

                <div class="info-label">
                    Middle Name
                </div>

                <div class="info-value">
                    <?php
                    echo e($student["middle_name"]);
                    ?>
                </div>

            </div>

            <div class="info-box">

                <div class="info-label">
                    Last Name
                </div>

                <div class="info-value">
                    <?php
                    echo e($student["last_name"]);
                    ?>
                </div>

            </div>

            <div class="info-box">

                <div class="info-label">
                    Birthday
                </div>

                <div class="info-value">
                    <?php
                    echo e($student["birthday"]);
                    ?>
                </div>

            </div>

            <div class="info-box">

                <div class="info-label">
                    Sex
                </div>

                <div class="info-value">
                    <?php
                    echo e($student["sex"]);
                    ?>
                </div>

            </div>

            <div class="info-box">

                <div class="info-label">
                    Email
                </div>

                <div class="info-value">
                    <?php
                    echo e($student["email"]);
                    ?>
                </div>

            </div>

            <div class="info-box full">

                <div class="info-label">
                    Program
                </div>

                <div class="info-value">
                    <?php
                    echo e($student["program"]);
                    ?>
                </div>

            </div>

            <div class="info-box">

                <div class="info-label">
                    Student Number
                </div>

                <div class="info-value">
                    <?php
                    echo e($student["student_number"]);
                    ?>
                </div>

            </div>

            <div class="info-box">

                <div class="info-label">
                    Enrolment Date
                </div>

                <div class="info-value">
                    <?php
                    echo e($student["enrolment_date"]);
                    ?>
                </div>

            </div>

        </div>

        <div class="buttons">

            <a
                href="index.php"
                class="btn btn-back"
            >
                Back to Students
            </a>

            <a
                href="edit.php?id=<?php echo urlencode($student['id']); ?>"
                class="btn btn-edit"
            >
                Edit Student
            </a>

        </div>

    </div>

</div>

</body>

</html>