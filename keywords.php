<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Keywords Guide</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            font-family: Arial, sans-serif;
            color: #fff;
            padding: 40px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-weight: bold;
        }

        .keyword-card {
            background: #ffffff10;
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            transition: 0.3s;
            border: 1px solid #ffffff20;
        }

        .keyword-card:hover {
            transform: translateY(-5px);
            background: #ffffff20;
        }

        .keyword {
            font-weight: bold;
            color: #00ffcc;
            font-size: 20px;
        }

        .category-title {
            font-size: 26px;
            margin-top: 40px;
            margin-bottom: 20px;
            border-left: 5px solid #00ffcc;
            padding-left: 15px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">📊 Mark Management</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">🏠 Marks Entry</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="question.php">📘 Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="keywords.php">🔑  Keywords</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="students.php">👨‍🎓 Students</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="report.php">📈 Report</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<h1>📘 Complete SQL Keywords Guide</h1>

<!-- ================= DATA QUERY ================= -->
<div class="category-title">🔎 Data Query Language (DQL)</div>

<div class="keyword-card">
    <div class="keyword">SELECT</div>
    <p>Used to retrieve data from a database table.</p>
</div>

<div class="keyword-card">
    <div class="keyword">DISTINCT</div>
    <p>Returns only unique values.</p>
</div>

<div class="keyword-card">
    <div class="keyword">WHERE</div>
    <p>Filters records based on condition.</p>
</div>

<div class="keyword-card">
    <div class="keyword">ORDER BY</div>
    <p>Sorts the result set (ASC / DESC).</p>
</div>

<div class="keyword-card">
    <div class="keyword">GROUP BY</div>
    <p>Groups rows that have same values.</p>
</div>

<div class="keyword-card">
    <div class="keyword">HAVING</div>
    <p>Filters grouped data.</p>
</div>

<div class="keyword-card">
    <div class="keyword">LIMIT</div>
    <p>Limits number of returned records.</p>
</div>

<hr>

<!-- ================= DATA MANIPULATION ================= -->
<div class="category-title">✏ Data Manipulation Language (DML)</div>

<div class="keyword-card">
    <div class="keyword">INSERT INTO</div>
    <p>Inserts new records into a table.</p>
</div>

<div class="keyword-card">
    <div class="keyword">UPDATE</div>
    <p>Modifies existing records.</p>
</div>

<div class="keyword-card">
    <div class="keyword">DELETE</div>
    <p>Removes records from table.</p>
</div>

<hr>

<!-- ================= DATA DEFINITION ================= -->
<div class="category-title">🏗 Data Definition Language (DDL)</div>

<div class="keyword-card">
    <div class="keyword">CREATE</div>
    <p>Creates database objects (table, database).</p>
</div>

<div class="keyword-card">
    <div class="keyword">ALTER</div>
    <p>Modifies table structure.</p>
</div>

<div class="keyword-card">
    <div class="keyword">DROP</div>
    <p>Deletes table or database permanently.</p>
</div>

<div class="keyword-card">
    <div class="keyword">TRUNCATE</div>
    <p>Removes all records quickly.</p>
</div>

<hr>

<!-- ================= JOINS ================= -->
<div class="category-title">🔗 SQL JOINS</div>

<div class="keyword-card">
    <div class="keyword">INNER JOIN</div>
    <p>Returns matching records from both tables.</p>
</div>

<div class="keyword-card">
    <div class="keyword">LEFT JOIN</div>
    <p>Returns all records from left table and matched from right.</p>
</div>

<div class="keyword-card">
    <div class="keyword">RIGHT JOIN</div>
    <p>Returns all records from right table and matched from left.</p>
</div>

<div class="keyword-card">
    <div class="keyword">FULL JOIN</div>
    <p>Returns all matching and non-matching records.</p>
</div>

<hr>

<!-- ================= CONDITIONS ================= -->
<div class="category-title">⚙ Conditions & Operators</div>

<div class="keyword-card">
    <div class="keyword">AND</div>
    <p>Combines multiple conditions.</p>
</div>

<div class="keyword-card">
    <div class="keyword">OR</div>
    <p>Returns true if any condition is true.</p>
</div>

<div class="keyword-card">
    <div class="keyword">IN</div>
    <p>Matches any value in a list.</p>
</div>

<div class="keyword-card">
    <div class="keyword">BETWEEN</div>
    <p>Filters within a range.</p>
</div>

<div class="keyword-card">
    <div class="keyword">LIKE</div>
    <p>Searches pattern using % wildcard.</p>
</div>

<div class="keyword-card">
    <div class="keyword">IS NULL</div>
    <p>Checks for NULL values.</p>
</div>

<hr>

<!-- ================= AGGREGATE ================= -->
<div class="category-title">📊 Aggregate Functions</div>

<div class="keyword-card">
    <div class="keyword">COUNT()</div>
    <p>Counts total rows.</p>
</div>

<div class="keyword-card">
    <div class="keyword">SUM()</div>
    <p>Calculates total sum.</p>
</div>

<div class="keyword-card">
    <div class="keyword">AVG()</div>
    <p>Returns average value.</p>
</div>

<div class="keyword-card">
    <div class="keyword">MAX()</div>
    <p>Returns highest value.</p>
</div>

<div class="keyword-card">
    <div class="keyword">MIN()</div>
    <p>Returns lowest value.</p>
</div>

</body>
</html>