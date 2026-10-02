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

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $birthday = $_POST["birthday"];
    $sex = $_POST["sex"];
    $email = $_POST["email"];
    $student_number = $_POST["student_number"];
    $program = $_POST["program"];
    $enrolment_date = $_POST["enrolment_date"];

    $sql = "UPDATE students SET
                first_name = :first_name,
                middle_name = :middle_name,
                last_name = :last_name,
                birthday = :birthday,
                sex = :sex,
                email = :email,
                student_number = :student_number,
                program = :program,
                enrolment_date = :enrolment_date
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":first_name" => $first_name,
        ":middle_name" => $middle_name,
        ":last_name" => $last_name,
        ":birthday" => $birthday,
        ":sex" => $sex,
        ":email" => $email,
        ":student_number" => $student_number,
        ":program" => $program,
        ":enrolment_date" => $enrolment_date,
        ":id" => $id
    ]);

    header("Location: view.php?id=" . urlencode($id));
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Student - PDO</title>

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

        .page-title {
            margin: 0;
            color: #6d28d9;
            font-size: 30px;
        }

        .page-subtitle {
            color: #777;
            margin-top: 8px;
            margin-bottom: 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #444;
        }

        input,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.12);
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
            border: none;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary {
            background: #7c3aed;
            color: white;
        }

        .btn-secondary {
            background: #eeeeee;
            color: #444;
        }

        @media (max-width: 700px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1 class="page-title">
            Edit Student
        </h1>

        <p class="page-subtitle">
            Update the student's information below.
        </p>

        <form method="POST">

            <div class="form-grid">

                <div class="form-group">

                    <label>First Name</label>

                    <input
                        type="text"
                        name="first_name"
                        value="<?php echo htmlspecialchars($student['first_name']); ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>Middle Name</label>

                    <input
                        type="text"
                        name="middle_name"
                        value="<?php echo htmlspecialchars($student['middle_name']); ?>"
                    >

                </div>

                <div class="form-group">

                    <label>Last Name</label>

                    <input
                        type="text"
                        name="last_name"
                        value="<?php echo htmlspecialchars($student['last_name']); ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>Birthday</label>

                    <input
                        type="date"
                        name="birthday"
                        value="<?php echo htmlspecialchars($student['birthday']); ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>Sex</label>

                    <select name="sex" required>

                        <option value="Male"
                            <?php echo $student["sex"] === "Male" ? "selected" : ""; ?>>
                            Male
                        </option>

                        <option value="Female"
                            <?php echo $student["sex"] === "Female" ? "selected" : ""; ?>>
                            Female
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        value="<?php echo htmlspecialchars($student['email']); ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>Student Number</label>

                    <input
                        type="text"
                        name="student_number"
                        value="<?php echo htmlspecialchars($student['student_number']); ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>Enrolment Date</label>

                    <input
                        type="date"
                        name="enrolment_date"
                        value="<?php echo htmlspecialchars($student['enrolment_date']); ?>"
                        required
                    >

                </div>

                <div class="form-group full">

                    <label>Program</label>

                    <input
                        type="text"
                        name="program"
                        value="<?php echo htmlspecialchars($student['program']); ?>"
                        required
                    >

                </div>

            </div>

            <div class="buttons">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Save Changes
                </button>

                <a
                    href="index.php"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>