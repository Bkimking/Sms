<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenswed TVTC</title>
    <!-- Include head -->
    @include('layouts.head')
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .news-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            background: #fff;
            padding: 20px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .news-card:hover {
            transform: scale(1.03);
        }

        .news-content {
            overflow-y: auto;
            max-height: 250px;
            /* Allows scrolling if content overflows */
            padding-right: 10px;
        }

        .news-tag {
            background: #dc3545;
            /* Bootstrap danger red */
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .news-title {
            font-size: 18px;
            font-weight: bold;
            color: #dc3545;
            /* Bootstrap danger red */
        }

        .divider {
            width: 2px;
            background: #ddd;
            height: auto;
            margin: 0 20px;
        }
    </style>
</head>

<body>
    <!-- Include header -->
    @include('layouts.header')

    <!-- News Section -->
    <section id="news" class="container py-5">
        <h2 class="fw-bold text-danger">Best of the Week</h2> <!-- Red title -->
        <a href="#" class="text-decoration-none text-danger fw-bold"></a>

        <div class="row mt-4">
            <!-- Main News Card (Left) -->
            <div class="col-lg-5">
                <div class="card news-card">
                    <div class="news-tag">March Intake, 2025</div>
                    <div class="news-content">
                        <p class="news-title">🎓 March Intake Now Open – Secure Your Spot Today!</p>
                        <p>Are you ready to kick-start your career with industry-ready skills and practical training?
                            Join Kenswed TVTC this March and take the first step toward a brighter future!</p>
                        <ul>
                            <li>✅ Comprehensive Certificate & Short Courses</li>
                            <li>✅ Hands-on Training with Expert Instructors</li>
                            <li>✅ Affordable Fees & Flexible Learning Options</li>
                            <li>✅ A Supportive and Conducive Learning Environment</li>
                        </ul>
                        <p>📌 Admissions are ongoing! Don’t miss this opportunity—Apply Now!</p>
                        <p>📞 For inquiries, contact us today!</p>
                        <a href="apply.php" class="btn btn-sm btn-danger mt-2">Apply Now →</a> <!-- Red button -->
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="col-lg-1 d-flex align-items-center">
                <div class="divider"></div>
            </div>

            <!-- Right Column: Two Stacked Cards -->
            <div class="col-lg-6 d-flex flex-column">
                <!-- First Small Card -->
                <div class="card news-card mb-3 flex-fill">
                    <div class="news-tag">Cultural Week</div>
                    <div class="news-content">
                        <p class="news-title">Cultural Week is just around the corner! </p>
                        <p>Get ready to showcase your heritage, embrace diverse traditions, and celebrate creativity.
                            Whether you're dressing up, performing, or simply soaking in the experience,
                            it's the perfect time to shine!</p>
                        <a href="#" class="btn btn-sm btn-danger mt-2">Learn More →</a> <!-- Red button -->
                    </div>
                </div>

                <!-- Second Small Card -->
                <div class="card news-card flex-fill">
                    <div class="news-tag">New Courses</div>
                    <div class="news-content">
                        <p class="news-title">Discover Our Latest Courses</p>
                        <p>Stay ahead with our newly added courses, designed to equip you with modern skills for a
                            competitive world. Explore our updated curriculum and enroll today!</p>
                        <a href="certificate.php" class="btn btn-sm btn-danger mt-2">See all courses →</a>
                        <!-- Red button -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')

</body>

</html>
