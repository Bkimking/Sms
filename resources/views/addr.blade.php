<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenswed TVTC</title>
    <!-- Include head -->
    @include('layouts.head')
</head>

<body>
    <!-- Include header -->
    @include('layouts.header')

    <!-- Admission Page Layout -->
    <section id="admission-requirements" class="container py-5">
        <div class="row">
            <!-- Left Side: Image Slider -->
            <div class="col-md-6">
                <div id="courseCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="imgs/IMG_prog1.jpg" class="d-block w-100 rounded" alt="Computer Programming">
                            <div class="carousel-caption bg-dark bg-opacity-50 p-2 rounded">
                                <h5>Computer Programming</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="imgs/_MG_9940.jpg" class="d-block w-100 rounded" alt="ICT">
                            <div class="carousel-caption bg-dark bg-opacity-50 p-2 rounded">
                                <h5>Information & Communication Technology (ICT)</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="imgs/IMG_solar3.jpg" class="d-block w-100 rounded" alt="Solar Engineering">
                            <div class="carousel-caption bg-dark bg-opacity-50 p-2 rounded">
                                <h5>Solar, Hybrid, and Electrical Engineering</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="imgs/IMG_tailoring1.jpg" class="d-block w-100 rounded" alt="Fashion Design">
                            <div class="carousel-caption bg-dark bg-opacity-50 p-2 rounded">
                                <h5>Fashion Design and Textile Technology</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#courseCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#courseCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <!-- Right Side: Dropdowns, Course Divisions, and Requirements -->
            <div class="col-md-6">
                <h2 class="text-center mb-4">Admission Requirements</h2>

                <!-- Certificate Courses Dropdown -->
                <div class="mb-3">
                    <label class="form-label"><strong>Certificate Courses</strong></label>
                    <select class="form-select" onchange="showDivisions(this.value)">
                        <option value="">Select a Certificate Course</option>
                        <option value="computer-programming">Computer Programming</option>
                        <option value="ict">Information & Communication Technology (ICT)</option>
                        <option value="solar-hybrid-electrical">Solar, Hybrid, and Electrical Engineering</option>
                        <option value="fashion-design">Fashion Design and Textile Technology</option>
                        <option value="engineering">Engineering</option>
                        <option value="hospitality">Hospitality</option>
                        <option value="hairdressing-beautytherapy">Hairdressing and Beauty Therapy</option>
                    </select>
                </div>

                <!-- Course Divisions -->
                <div id="divisions" class="mb-3"></div>

                <!-- Short Courses Dropdown -->
                <div class="mb-3">
                    <label class="form-label"><strong>Short Courses</strong></label>
                    <select class="form-select" onchange="showRequirements(this.value)">
                        <option value="">Select a Short Course</option>
                        <option value="computer-packages">Computer Packages</option>
                    </select>
                </div>

                <!-- Admission Requirements -->
                <div id="requirements" class="border p-4 rounded bg-light" style="min-height: 250px;">
                    <p class="text-muted text-center">Loading general admission requirements...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')

    <script>
        let generalRequirements = `
            <h4>General Admission Requirements</h4>
            <ul>
                <li>KCSE Certificate or equivalent.</li>
                <li>Copy of National ID or Birth Certificate.</li>
                <li>Completed application form.</li>
                <li>Passport-size photos.</li>
                <li>Relevant academic certificates (if applicable).</li>
            </ul>`;

        let courseRequirements = {
            "computer-programming": `<h4>Computer Programming</h4><ul><li>KCSE Mean Grade: D+ (Plus) and above.</li><li>Basic knowledge of computers.</li></ul>`,
            "ict": `<h4>Information & Communication Technology (ICT)</h4><ul><li>KCSE Mean Grade: D+ (Plus) and above.</li><li>Interest in computer networks and systems.</li></ul>`,
            "solar-hybrid-electrical": `<h4>Solar, Hybrid, and Electrical Engineering</h4><ul><li>KCSE Mean Grade: D+ (Plus) and above.</li><li>Physics and Mathematics are an added advantage.</li></ul>`,
            "fashion-design": `<h4>Fashion Design and Textile Technology</h4><ul><li>Open to all interested in the field.</li><li>Passion for the fashion industry.</li></ul>`,
            "computer-packages": `<h4>Computer Packages</h4><ul><li>Open to all interested applicants.</li><li>Copy of National ID or Birth Certificate.</li></ul>`,
            "frontend-development": `<h4>Frontend Development</h4><ul><li>HTML, CSS, JavaScript knowledge preferred.</li></ul>`,
            "backend-development": `<h4>Backend Development</h4><ul><li>Experience with databases and server-side programming.</li></ul>`,
            "mobile-app-development": `<h4>Mobile Application Development</h4><ul><li>Interest in Android or iOS development.</li></ul>`,
            "networking": `<h4>Networking</h4><ul><li>Understanding of network infrastructure.</li></ul>`,
            "database-management": `<h4>Database Management</h4><ul><li>Experience with MySQL or PostgreSQL.</li></ul>`,
            "pastry": `<h4>Pastry</h4><ul><li>Passion for baking and pastry making.</li></ul>`,
            "hairdressing": `<h4>Hairdressing</h4><ul><li>Interest in hair styling and maintenance.</li></ul>`,
            "beauty-therapy": `<h4>Beauty Therapy</h4><ul><li>Passion for skincare and wellness.</li></ul>`
        };

        let courseDivisions = {
            "computer-programming": ["frontend-development", "backend-development", "mobile-app-development"],
            "ict": ["networking", "database-management"],
            "engineering": ["solar-hybrid-electrical"],
            "fashion-design": ["fashion-design"],
            "hairdressing-beautytherapy": ["hairdressing", "beauty-therapy", "cosmetology"],
            "hospitality": ["pastry"]
        };

        function showDivisions(course) {
            let divisions = courseDivisions[course] || [];
            let divisionsHtml = divisions.map(div =>
                `<li><a href="#" class="text-primary" onclick="showRequirements('${div}')">${div.replace(/-/g, " ")}</a></li>`
                ).join("");
            document.getElementById("divisions").innerHTML = divisionsHtml ?
                `<p>Select a division:</p><ul>${divisionsHtml}</ul>` : "";
            showRequirements(course);
        }

        function showRequirements(course) {
            document.getElementById("requirements").innerHTML = courseRequirements[course] || generalRequirements;
        }

        window.onload = () => document.getElementById("requirements").innerHTML = generalRequirements;
    </script>

</body>

</html>
