<!-- this is scripts for Sponsored student -->

<!-- Scripts -->

<!-- Include SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Include FontAwesome for the eye icon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

<!-- Font Awesome -->
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>

<!-- Google Material Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/material-icons/0.4.1/material-icons.min.js" crossorigin="anonymous">
</script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js" crossorigin="anonymous"></script>

<!-- Simple DataTables -->
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>

<!-- Custom Scripts -->
@vite('resources/js/scripts.js')

<!-- for application form admin side -->
<script>
    // Modal Navigation
    document.addEventListener('DOMContentLoaded', () => {
        const steps = document.querySelectorAll('.step');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        let currentStep = 0;

        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.classList.toggle('d-none', index !== stepIndex);
            });
            prevBtn.disabled = stepIndex === 0;
            nextBtn.classList.toggle('d-none', stepIndex === steps.length - 1);
            submitBtn.classList.toggle('d-none', stepIndex !== steps.length - 1);
        }

        prevBtn.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });

        showStep(currentStep);
    });



    // SweetAlert to show the rules and regulations
    document.getElementById("view_rules").addEventListener("click", function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Rules and Regulations',
            html: `
            <h6>ACADEMICS</h6>
            <ul style="text-align: left;">
                <li>Students should be punctual to class and will NOT be allowed to enter class 15 minutes after class has begun.</li>
                <li>Any student who wishes to change their course should do so within the first two weeks of learning. Students who want to shift after this will be required to make fee payment for the course they want to move to.</li>
                <li>All classes are compulsory and examinable, including the common units (Entrepreneurship, ICT, Communication Skills).</li>
                <li>Students will NOT be allowed to sit for exams if 75% of attendance is not met.</li>
                <li>Students with missing marks for any common unit or any other core unit will not be able to graduate.</li>
                <li>Exam irregularities will not be tolerated. Students found culpable will be expelled from the school.</li>
                <li>Discipline issues will go through a hearing with the disciplinary committee to determine the student's fate.</li>
            </ul>
            <h6>DISCIPLINE</h6>
            <ul style="text-align: left;">
                <li>Students are required to dress decently and always be presentable.</li>
                <li>Students are individually responsible for any loss or damage of school property. Group damage will be collectively charged.</li>
                <li>Drugs and alcohol are NOT allowed on school premises. Intoxicated students will not be permitted entry.</li>
                <li>Any grievances should be channeled through the course instructor or KTVTC administrator.</li>
            </ul>
        `,
            icon: 'info',
            confirmButtonText: 'Close'
        });
    });


    // Prevent form submission if the checkbox is not checked
    document.addEventListener('DOMContentLoaded', () => {
        const submitBtn = document.getElementById('submitBtn');
        const rulesCheckbox = document.getElementById('rules_checkbox');

        submitBtn.addEventListener('click', (event) => {
            if (!rulesCheckbox || !rulesCheckbox.checked) {
                event.preventDefault();
                Swal.fire({
                    title: 'Warning',
                    text: 'You must read and agree to the rules and regulations before submitting the application.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
            }
        });
    });

    //
    function updateSubOptions() {
        const courseSelect = document.getElementById("course");
        const subOptionsContainer = document.getElementById("sub-options-container");
        const subCourseSelect = document.getElementById("sub-course");

        // Define sub-options for each course
        const subOptions = {
            "computer-programming": [{
                    value: "frontend",
                    text: "Frontend"
                },
                {
                    value: "backend",
                    text: "Backend"
                },
                {
                    value: "mobile-app",
                    text: "Mobile App"
                }
            ],
            "hairdressing-beauty-therapy": [{
                    value: "hairdressing",
                    text: "Hairdressing"
                },
                {
                    value: "cosmetology",
                    text: "Cosmetology"
                },
                {
                    value: "beauty-therapy",
                    text: "Beauty Therapy"
                },
                {
                    value: "nail-technology",
                    text: "Nail Technology"
                }
            ]
        };

        // Get the selected course
        const selectedCourse = courseSelect.value;

        // Clear and populate sub-options
        subCourseSelect.innerHTML = '<option value="">Select a Specialization</option>'; // Reset options
        if (subOptions[selectedCourse]) {
            subOptions[selectedCourse].forEach(option => {
                const opt = document.createElement("option");
                opt.value = option.value;
                opt.textContent = option.text;
                subCourseSelect.appendChild(opt);
            });
            subOptionsContainer.style.display = "block";
        } else {
            subOptionsContainer.style.display = "none";
        }
    }

    //sub-counties
    const subCounties = {
        "Baringo": ["Baringo Central", "Baringo North", "Baringo South", "Eldama Ravine", "Mogotio", "Tiaty"],
        "Bomet": ["Bomet Central", "Bomet East", "Chepalungu", "Konoin", "Sotik"],
        "Bungoma": ["Bumula", "Kabuchai", "Kanduyi", "Kimilili", "Mt. Elgon", "Sirisia", "Tongaren", "Webuye East",
            "Webuye West"
        ],
        "Busia": ["Budalangi", "Butula", "Funyula", "Matayos", "Nambale", "Teso North", "Teso South"],
        "Elgeyo-Marakwet": ["Alale", "Keiyo North", "Keiyo South", "Marakwet East", "Marakwet West", "Tot"],
        "Embu": ["Embu North", "Embu South", "Mbeere North", "Mbeere South"],
        "Garissa": ["Garissa Township", "Ijara", "Lagdera", "Fafi", "Dadaab"],
        "Homa Bay": ["Homa Bay Town", "Kaksingri", "Karachuonyo", "Kendu Bay", "Mbita", "Ndhiwa", "Rangwe", "Suba"],
        "Isiolo": ["Isiolo Town", "Merti", "Oldonyiro"],
        "Kajiado": ["Kajiado East", "Kajiado North", "Kajiado South", "Kajiado West", "Loitokitok"],
        "Kakamega": ["Butere", "Kakamega Central", "Kakamega East", "Kakamega North", "Kakamega South", "Lurambi",
            "Matungu", "Mumias East", "Mumias West", "Shinyalu"
        ],
        "Kericho": ["Ainamoi", "Bureti", "Kapsoit", "Kipkelion", "Kiptigis", "Sotik"],
        "Kiambu": ["Gatundu North", "Gatundu South", "Juja", "Kabete", "Kikuyu", "Kiambaa", "Kimbo", "Limuru",
            "Ruiru", "Thika Town"
        ],
        "Kilifi": ["Kilifi North", "Kilifi South", "Malindi", "Magarini", "Ganze", "Kaloleni", "Rabai"],
        "Kirinyaga": ["Gichugu", "Kutus", "Mwea", "Kirinyaga Central", "Kirinyaga East", "Kirinyaga West"],
        "Kisii": ["Bosogo", "Kitutu Chache", "Mogonga", "Nyamache", "South Mugirango", "West Mugirango", "Bobasi"],
        "Kisumu": ["Kisumu Central", "Kisumu East", "Kisumu West", "Nyando", "Nyakach", "Seme", "Muhoroni",
            "Ahero"
        ],
        "Kitui": ["Kitui Central", "Kitui East", "Kitui West", "Mwingi Central", "Mwingi East", "Mwingi West",
            "Zombe", "Mutomo", "Ikutha"
        ],
        "Kwale": ["Lunga Lunga", "Matuga", "Msambweni", "Kinango"],
        "Laikipia": ["Laikipia East", "Laikipia North", "Laikipia West", "Nyahururu", "Nanyuki", "Rumuruti"],
        "Lamu": ["Lamu East", "Lamu West", "Lamu Central"],
        "Machakos": ["Machakos Town", "Masinga", "Matungulu", "Kangundo", "Yatta", "Kathiani", "Mwala"],
        "Makueni": ["Makueni", "Kangundo", "Kangundo West", "Mbooni", "Kilungu", "Kaiti", "Mbooni East",
            "Mbooni West"
        ],
        "Mandera": ["Mandera East", "Mandera North", "Mandera West", "Banisa", "Lafey", "Fafi"],
        "Marsabit": ["Marsabit Town", "North Horr", "Laisamis", "Saku", "Turbi", "Sololo"],
        "Meru": ["Imenti North", "Imenti South", "Imenti Central", "Buuri", "Tigania East", "Tigania West", "Chuka",
            "Tharaka", "Magumoni"
        ],
        "Migori": ["Migori Town", "Awendo", "Rongo", "Kuria East", "Kuria West", "Suna East", "Suna West"],
        "Mombasa": ["Mombasa Town", "Changamwe", "Jomvu", "Kisauni", "Nyali", "Likoni"],
        "Murang'a": ["Kangema", "Kahuro", "Kiharu", "Maragua", "Mathioya", "Murang'a Town"],
        "Nairobi": ["Central", "Eastlands", "Westlands", "South B", "South C", "Westlands", "Kasarani", "Lang'ata"],
        "Nakuru": ["Nakuru Town", "Gilgil", "Naivasha", "Subukia", "Molo", "Rongai", "Kuresoi North",
            "Kuresoi South"
        ],
        "Nandi": ["Nandi Hills", "Chesumei", "Emgwen", "Ainabkoi"],
        "Narok": ["Narok North", "Narok South", "Narok East", "Transmara"],
        "Nyamira": ["Nyamira Town", "Bokeira", "Borabu", "Manga", "Nyamira North", "Nyamira South"],
        "Nyandarua": ["Ol Kalou", "Ndaragwa", "Kinangop", "Nyandarua East", "Nyandarua West", "Karatina"],
        "Nyeri": ["Nyeri Town", "Nyeri North", "Nyeri South", "Othaya", "Kieni"],
        "Samburu": ["Samburu Central", "Samburu East", "Samburu North", "Samburu West"],
        "Siaya": ["Siaya Town", "Ugunja", "Ugenya", "Bondo", "Rarieda", "Gem", "Alego Usonga"],
        "Taita-Taveta": ["Taveta", "Voi", "Mwatate", "Wundanyi", "Bura", "Taita"],
        "Tana River": ["Bura", "Garsen", "Hidaman", "Tana Delta", "Tana River West"],
        "Tharaka-Nithi": ["Chuka", "Muthambi", "Maara", "Tharaka", "Igembe North", "Igembe South"],
        "Trans Nzoia": ["Kiminini", "Cherangani", "Endebess", "Saboti", "Trans Nzoia West"],
        "Turkana": ["Turkana Central", "Turkana East", "Turkana South", "Turkana North", "Turkana West", "Loima"],
        "Uasin Gishu": ["Eldoret East", "Eldoret West", "Turbo", "Kapseret", "Kesses", "Rongai"],
        "Vihiga": ["Emuhaya", "Hamisi", "Luanda", "Sabatia", "Vihiga Town"],
        "Wajir": ["Wajir East", "Wajir North", "Wajir South", "Wajir West"],
        "West Pokot": ["Kapenguria", "Kacheliba", "Kibung'a", "Pokot Central", "Pokot South", "Pokot West"]
    };


    function updateSubCounties() {
        const countySelect = document.getElementById("county");
        const subCountySelect = document.getElementById("subcounty");
        const selectedCounty = countySelect.value;

        // Clear existing sub-county options
        subCountySelect.innerHTML = '<option value="">Select a sub-county</option>';

        if (selectedCounty && subCounties[selectedCounty]) {
            // Populate sub-county options
            subCounties[selectedCounty].forEach(subCounty => {
                const option = document.createElement("option");
                option.value = subCounty;
                option.textContent = subCounty;
                subCountySelect.appendChild(option);
            });
        }
    }

    // Toggle medical condition textarea visibility
    function toggleMedicalCondition() {
        const conditionSection = document.getElementById('medical_condition_section');
        const hasCondition = document.getElementById('has_medical_condition').checked;
        conditionSection.classList.toggle('d-none', !hasCondition);
    }
</script>

<!-- Js notification for missing profile -->
<script>
    function checkProfile() {
        fetch('/admin/api/check-profile')
            .then(response => response.json())
            .then(data => {
                let container = document.getElementById('notification-container');

                if (data.empty) {
                    if (!document.getElementById('profile-warning')) { 
                        // ✅ Only add if it doesn't exist
                        showNotification('Your profile is incomplete. <a href="{{ route("admin.profile.edit") }}" style="color: black; font-weight: bold;">Update Now</a>');
                    }
                } else {
                    // ✅ Remove notification if profile is complete
                    let existingNotification = document.getElementById('profile-warning');
                    if (existingNotification) {
                        existingNotification.remove();
                    }
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function showNotification(message) {
        let container = document.getElementById('notification-container');

        // Create notification only if it doesn't exist
        let notification = document.createElement('div');
        notification.id = 'profile-warning'; // ✅ Unique ID to prevent duplicates
        notification.innerHTML = message;
        notification.style.cssText = 
            "background: #ffc107; color: black; padding: 10px; border-radius: 5px; font-weight: bold; text-align: center;";

        // Append the notification inside the container
        container.appendChild(notification);
    }

    // ✅ Run immediately, then every 60 seconds (1 min)
    checkProfile();
    setInterval(checkProfile, 60000); 
</script>


