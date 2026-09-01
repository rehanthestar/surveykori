<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find Surveys | Survey Kori</title>
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
                <a class="side-link is-active" href="../survey/my-surveys.html">My Surveys</a>
                <a class="side-link " href="../survey/create.html">Create Survey</a>
                <a class="side-link " href="../points/index.html">Point Center</a>
                <a class="side-link " href="../notifications.html">Notifications</a>
                <a class="side-link " href="../profile.html">Profile</a>
                <a class="side-link " href="../admin/index.html">Admin Panel</a>
                <a class="side-link " href="../index.html">Logout</a>
            </nav>
        </aside>
        <main class="content">
        <h1>Find Surveys</h1>
        <p class="text-muted">Answer surveys made by other students and researchers to earn points.</p>

        <div class="card">
            <form>
                <div class="row">
                    <input class="input" style="max-width:260px" type="text" name="search" placeholder="Search title or description">
                    <select class="select" style="max-width:180px" name="category">
                        <option value="">All categories</option>
                        <option value="Education">Education</option>
                        <option value="Health">Health</option>
                        <option value="Technology">Technology</option>
                        <option value="Business">Business</option>
                        <option value="Social">Social</option>
                        <option value="Environment">Environment</option>
                        <option value="Other">Other</option>
                    </select>
                    <select class="select" style="max-width:180px" name="sort">
                        <option value="newest">Newest first</option>
                        <option value="reward">Highest reward</option>
                    </select>
                    <button class="btn btn-primary" type="button">Apply</button>
                    <a class="btn btn-outline" href="find.html">Reset</a>
                </div>
            </form>
        </div>
        <div class="grid-3">
            <div class="survey-card">
                <h3>Campus Transport Experience</h3>
                <p class="small text-muted">How do students travel to campus every day and what problems do they face?</p>
                <div>
                    <span class="badge badge-cat">Social</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Ayesha Rahman</span>
                    <span>6 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>5 points</strong></span>
                    <span>8 / 25 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 20 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
            </div>

            <div class="survey-card">
                <h3>Library Facility Feedback</h3>
                <p class="small text-muted">Share your opinion about the central library services and reading environment.</p>
                <div>
                    <span class="badge badge-cat">Education</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Nusrat Jahan</span>
                    <span>7 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>4 points</strong></span>
                    <span>18 / 20 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 18 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
            </div>
<div class="survey-card">
                <h3>Library Facility Feedback</h3>
                <p class="small text-muted">Share your opinion about the central library services and reading environment.</p>
                <div>
                    <span class="badge badge-cat">Education</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Nusrat Jahan</span>
                    <span>7 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>4 points</strong></span>
                    <span>18 / 20 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 18 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
            </div>
<div class="survey-card">
                <h3>Library Facility Feedback</h3>
                <p class="small text-muted">Share your opinion about the central library services and reading environment.</p>
                <div>
                    <span class="badge badge-cat">Education</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Nusrat Jahan</span>
                    <span>7 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>4 points</strong></span>
                    <span>18 / 20 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 18 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
            </div>
<div class="survey-card">
                <h3>Library Facility Feedback</h3>
                <p class="small text-muted">Share your opinion about the central library services and reading environment.</p>
                <div>
                    <span class="badge badge-cat">Education</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Nusrat Jahan</span>
                    <span>7 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>4 points</strong></span>
                    <span>18 / 20 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 18 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
            </div>
<div class="survey-card">
                <h3>Library Facility Feedback</h3>
                <p class="small text-muted">Share your opinion about the central library services and reading environment.</p>
                <div>
                    <span class="badge badge-cat">Education</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Nusrat Jahan</span>
                    <span>7 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>4 points</strong></span>
                    <span>18 / 20 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 18 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
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