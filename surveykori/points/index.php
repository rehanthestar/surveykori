<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Point Center | Survey Kori</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/components.css">
<link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body>
<header class="navbar">
    <div class="navbar-left">
        <button class="menu-btn" onclick="toggleSidebar()">&#9776;</button>
        <a class="brand" href="../dashboard.html">Survey<span>Kori</span></a>
    </div>
    <div class="navbar-right">
        <a class="nav-link" href="../notifications.html">Notifications <span class="dot">3</span></a>
        <span class="nav-user">Rahim Uddin</span>
        <a class="btn btn-outline btn-sm" href="../index.html">Logout</a>
    </div>
</header>
<div class="layout">
<aside class="sidebar" id="sidebar">
    <nav>
        <a class="side-link " href="../dashboard.html">Dashboard</a>
        <a class="side-link " href="../survey/find.html">Find Surveys</a>
        <a class="side-link " href="../survey/my-surveys.html">My Surveys</a>
        <a class="side-link " href="../survey/create.html">Create Survey</a>
        <a class="side-link is-active" href="../points/index.html">Point Center</a>
        <a class="side-link " href="../notifications.html">Notifications</a>
        <a class="side-link " href="../profile.html">Profile</a>
        <a class="side-link" href="../admin/index.html">Admin Panel</a>
        <a class="side-link" href="../index.html">Logout</a>
    </nav>
</aside>
<main class="content">

<h1>Point Center</h1>
<p class="text-muted">Points are an internal exchange unit of Survey Kori. There is no money involved.</p>

<div class="grid-4">
    <div class="stat-card">
        <div class="label">Available Points</div>
        <div class="value">120</div>
    </div>
    <div class="stat-card green">
        <div class="label">Earned Points</div>
        <div class="value">185</div>
    </div>
    <div class="stat-card red">
        <div class="label">Spent Points</div>
        <div class="value">100</div>
    </div>
    <div class="stat-card orange">
        <div class="label">Locked Points</div>
        <div class="value">100</div>
    </div>
</div>

<div class="card mt">
    <div class="card-title">
        <h3>Recent Transactions</h3>
        <a class="btn btn-outline btn-sm" href="transactions.html">See all</a>
    </div>

    <div class="row mb">
        <a class="btn btn-sm btn-primary" href="index.html">All</a>
        <a class="btn btn-sm btn-outline" href="index.html">Earned</a>
        <a class="btn btn-sm btn-outline" href="index.html">Spent</a>
        <a class="btn btn-sm btn-outline" href="index.html">Refund</a>
    </div>

    <div class="table-wrap">
    <table class="table">
        <tr><th>Date</th><th>Activity</th><th>Type</th><th>Points</th></tr>
        <tr>
            <td class="small">15 Aug 2026</td>
            <td>Completed survey "Campus Transport"</td>
            <td><span class="badge">EARN</span></td>
            <td class="text-success">+5 Points</td>
        </tr>
        <tr>
            <td class="small">14 Aug 2026</td>
            <td>Points locked for "Student Study Habits 2026"</td>
            <td><span class="badge">LOCK</span></td>
            <td class="text-danger">-100 Points</td>
        </tr>
        <tr>
            <td class="small">14 Aug 2026</td>
            <td>Published survey "Student Study Habits 2026"</td>
            <td><span class="badge">SPEND</span></td>
            <td class="text-danger">-100 Points</td>
        </tr>
        <tr>
            <td class="small">12 Aug 2026</td>
            <td>Completed survey "Library Usage"</td>
            <td><span class="badge">EARN</span></td>
            <td class="text-success">+8 Points</td>
        </tr>
        <tr>
            <td class="small">11 Aug 2026</td>
            <td>Refund of unused points from "Old Poll"</td>
            <td><span class="badge">REFUND</span></td>
            <td class="text-success">+20 Points</td>
        </tr>
        <tr>
            <td class="small">10 Aug 2026</td>
            <td>Welcome bonus points</td>
            <td><span class="badge">EARN</span></td>
            <td class="text-success">+50 Points</td>
        </tr>
    </table>
    </div>
</div>

</main>
</div>
<footer class="footer">
    <p>Survey Kori &mdash; University Web Technology Project</p>
</footer>
<script src="../assets/js/script.js"></script>

</body>
</html>
