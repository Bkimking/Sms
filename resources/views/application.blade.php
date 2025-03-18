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

    <!-- Application Form Section -->
    <section id="application-form" class="container py-5">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="application-section text-center py-4">
            <!-- Heading -->
            <h3 class="mb-3">Start Your Application Today!</h3>

            <!-- Description -->
            <p class="text-muted mb-4">
                Ready to take the next step toward your future? Complete our application form to get started.
                It only takes a few minutes!
            </p>

            <!-- Button -->
            <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal"
                data-bs-target="#applicationFormModal">
                Start Application Form
            </button>
        </div>

        <form action="{{ route('student.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="applicationFormModal" tabindex="-1" aria-labelledby="applicationFormModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content"
                        style="background-image: linear-gradient(to right, #9b1c31, #dc3545); padding: 50px; color: white; border-radius: 8px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="applicationFormModalLabel">Application Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Step Container -->
                            <div id="step-1" class="step">
                                <!-- Step 1 Content -->
                                <h3>Step 1: Personal Details</h3>
                                <div class="row">
                                    <!-- Fields from Step 1 -->
                                    <div class="col-md-6 mb-3">
                                        <label for="surname" class="form-label">Surname</label>
                                        <input type="text" id="surname" name="surname" class="form-control"
                                            placeholder="Enter your Surname name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="firstname" class="form-label">First Name</label>
                                        <input type="text" id="firstname" name="firstname" class="form-control"
                                            placeholder="Enter your First name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="middlename" class="form-label">Middle Name</label>
                                        <input type="text" id="middlename" name="middlename" class="form-control"
                                            placeholder="Enter your middle name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email </label>
                                        <input type="text" id="email" name="email" class="form-control"
                                            placeholder="Enter your Email">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" id="dob" name="dob" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="idnumber" class="form-label">ID Number</label>
                                        <input type="text" id="idnumber" name="idnumber" class="form-control"
                                            placeholder="Enter your ID number" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select id="gender" name="gender" class="form-select" required>
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="marital-status" class="form-label">marital-status</label>
                                        <select id="marital-status" name="marital-status" class="form-select"
                                            required>
                                            <option value="">marital-status</option>
                                            <option value="single">single</option>
                                            <option value="married">married</option>
                                            <option value="bachelor">bachelor</option>
                                            <option value="divorced">divorced</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="tshirtsize" class="form-label">T-Shirt Size</label>
                                        <select id="tshirtsize" name="tshirtsize" class="form-select" required>
                                            <option value="">Select T-Shirt Size</option>
                                            <option value="small">Small</option>
                                            <option value="medium">Medium</option>
                                            <option value="large">Large</option>
                                            <option value="xlarge">Extra Large</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="address" class="form-label">Home Physical Address</label>
                                        <input type="text" id="homeaddress" name="homeaddress"
                                            class="form-control" placeholder="HomeTown" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="county" class="form-label">County</label>
                                        <select id="county" name="county" class="form-select" required
                                            onchange="updateSubCounties()">
                                            <option value="">Select your county</option>
                                            <option value="Baringo">Baringo</option>
                                            <option value="Bomet">Bomet</option>
                                            <option value="Bungoma">Bungoma</option>
                                            <option value="Busia">Busia</option>
                                            <option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
                                            <option value="Embu">Embu</option>
                                            <option value="Garissa">Garissa</option>
                                            <option value="Homa Bay">Homa Bay</option>
                                            <option value="Isiolo">Isiolo</option>
                                            <option value="Kajiado">Kajiado</option>
                                            <option value="Kakamega">Kakamega</option>
                                            <option value="Kericho">Kericho</option>
                                            <option value="Kiambu">Kiambu</option>
                                            <option value="Kilifi">Kilifi</option>
                                            <option value="Kirinyaga">Kirinyaga</option>
                                            <option value="Kisii">Kisii</option>
                                            <option value="Kisumu">Kisumu</option>
                                            <option value="Kitui">Kitui</option>
                                            <option value="Kwale">Kwale</option>
                                            <option value="Laikipia">Laikipia</option>
                                            <option value="Lamu">Lamu</option>
                                            <option value="Machakos">Machakos</option>
                                            <option value="Makueni">Makueni</option>
                                            <option value="Mandera">Mandera</option>
                                            <option value="Marsabit">Marsabit</option>
                                            <option value="Meru">Meru</option>
                                            <option value="Migori">Migori</option>
                                            <option value="Mombasa">Mombasa</option>
                                            <option value="Murang'a">Murang'a</option>
                                            <option value="Nairobi">Nairobi</option>
                                            <option value="Nakuru">Nakuru</option>
                                            <option value="Nandi">Nandi</option>
                                            <option value="Narok">Narok</option>
                                            <option value="Nyamira">Nyamira</option>
                                            <option value="Nyandarua">Nyandarua</option>
                                            <option value="Nyeri">Nyeri</option>
                                            <option value="Samburu">Samburu</option>
                                            <option value="Siaya">Siaya</option>
                                            <option value="Taita-Taveta">Taita-Taveta</option>
                                            <option value="Tana River">Tana River</option>
                                            <option value="Tharaka-Nithi">Tharaka-Nithi</option>
                                            <option value="Trans Nzoia">Trans Nzoia</option>
                                            <option value="Turkana">Turkana</option>
                                            <option value="Uasin Gishu">Uasin Gishu</option>
                                            <option value="Vihiga">Vihiga</option>
                                            <option value="Wajir">Wajir</option>
                                            <option value="West Pokot">West Pokot</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="subcounty" class="form-label">Sub-County</label>
                                        <select id="subcounty" name="subcounty" class="form-select" required>
                                            <option value="">Select a sub-county</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="tel" class="form-label">Telephone</label>
                                        <input type="tel" id="tel" name="tel" class="form-control"
                                            placeholder="Enter your telephone number" required>
                                    </div>
                                </div>
                            </div>

                            <div id="step-2" class="step d-none">
                                <!-- Step 2 Content -->
                                <h3>Step 2: Course Selection</h3>
                                <div class="mb-3">
                                    <label for="course" class="form-label">Choose a Course</label>
                                    <select id="course" name="course" class="form-select" required
                                        onchange="updateSubOptions()">
                                        <option value="">Select a Course</option>
                                        <option value="computer-programming">Computer Programming</option>
                                        <option value="hairdressing-beauty-therapy">HairDressing & BeautyTherapy
                                        </option>
                                        <option value="Solar-Hybrid-Electrical-Program">Solar Hybrid Electrical Program
                                        </option>
                                        <option value="Fashion-Design">Fashion & Design</option>
                                        <option value="Pastry-Cook">Pastry Cook</option>
                                        <option value="Computer-Packages">Computer Packages</option>
                                    </select>
                                </div>

                                <!-- Sub-options -->
                                <div class="mb-3" id="sub-options-container" style="display: none;">
                                    <label for="sub-course" class="form-label">Choose a Specialization</label>
                                    <select id="sub-course" name="subcourse" class="form-select">
                                        <option value="">Select a Specialization</option>
                                    </select>
                                </div>
                            </div>

                            <div id="step-3" class="step d-none">
                                <!-- Step 3 Content -->
                                <h3>Step 3: Parent/Guardian Details</h3>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_surname" class="form-label">Surname</label>
                                        <input type="text" id="guardian_surname" name="guardiansurname"
                                            class="form-control" placeholder="Enter guardian's surname" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_firstname" class="form-label">First Name</label>
                                        <input type="text" id="guardian_firstname" name="guardianfirstname"
                                            class="form-control" placeholder="Enter guardian's first name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_middlename" class="form-label">Middle Name</label>
                                        <input type="text" id="guardian_middlename" name="guardianmiddlename"
                                            class="form-control" placeholder="Enter guardian's middle name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_email" class="form-label">Email</label>
                                        <input type="email" id="guardian_email" name="guardianemail"
                                            class="form-control" placeholder="Enter guardian's email address"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_occupation" class="form-label">Occupation</label>
                                        <input type="text" id="guardian_occupation" name="guardianoccupation"
                                            class="form-control" placeholder="Enter guardian's occupation" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_idnumber" class="form-label">ID Number</label>
                                        <input type="text" id="guardian_idnumber" name="guardianidnumber"
                                            class="form-control" placeholder="Enter guardian's ID number" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_address" class="form-label">Home Physical Address</label>
                                        <input type="text" id="guardian_address" name="guardianhomeaddress"
                                            class="form-control" placeholder="HomeTown" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_county" class="form-label">County</label>
                                        <input type="text" id="guardian_county" name="guardiancounty"
                                            class="form-control" placeholder="Enter guardian's county" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guardian_tel" class="form-label">Telephone</label>
                                        <input type="tel" id="guardian_tel" name="guardiantel"
                                            class="form-control" placeholder="Enter guardian's telephone number"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div id="step-4" class="step d-none">
                                <h3>Step 4: Other Details</h3>
                                <div class="row">
                                    <!-- Educational Background -->
                                    <h5>Educational Background</h5>
                                    <!-- Primary Education -->
                                    <div class="row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <label for="primary_school_name" class="form-label">Primary School
                                                Name</label>
                                            <input type="text" id="primary_school_name" name="primaryschoolname"
                                                class="form-control" placeholder="Enter primary school name">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="primary_year" class="form-label">Year of
                                                Completion</label>
                                            <input type="text" id="primary_year" name="primaryyear"
                                                class="form-control" placeholder="Enter year of completion">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="primary_grade" class="form-label">Grade/Marks
                                                Attained</label>
                                            <input type="text" id="primary_grade" name="primarygrade"
                                                class="form-control" placeholder="Enter grade/marks attained">
                                        </div>
                                    </div>

                                    <!-- Secondary Education -->
                                    <div class="row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <label for="secondary_school_name" class="form-label">Secondary
                                                School Name</label>
                                            <input type="text" id="secondary_school_name"
                                                name="secondaryschoolname" class="form-control"
                                                placeholder="Enter secondary school name">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="secondary_year" class="form-label">Year of
                                                Completion</label>
                                            <input type="text" id="secondary_year" name="secondaryyear"
                                                class="form-control" placeholder="Enter year of completion">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="secondary_grade" class="form-label">Grade/Marks
                                                Attained</label>
                                            <input type="text" id="secondary_grade" name="secondarygrade"
                                                class="form-control" placeholder="Enter grade/marks attained">
                                        </div>
                                    </div>

                                    <!-- Tertiary Education -->
                                    <div class="row mb-3">
                                        <div class="col-md-4 mb-3">
                                            <label for="tertiary_school_name" class="form-label">Tertiary
                                                School Name</label>
                                            <input type="text" id="tertiary_school_name" name="tertiaryschoolname"
                                                class="form-control" placeholder="Enter tertiary school name">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tertiary_year" class="form-label">Year of
                                                Completion</label>
                                            <input type="text" id="tertiary_year" name="tertiaryyear"
                                                class="form-control" placeholder="Enter year of completion">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tertiary_grade" class="form-label">Grade/Marks
                                                Attained</label>
                                            <input type="text" id="tertiary_grade" name="tertiarygrade"
                                                class="form-control" placeholder="Enter grade/marks attained">
                                        </div>
                                    </div>

                                    <!-- Add more education levels if needed -->
                                    <button type="button" class="btn btn-outline-secondary" id="add_education">Add
                                        More Education</button>

                                    <!-- Medical History -->
                                    <div class="col-md-12 mb-3">
                                        <h5>Medical History</h5>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" id="has_medical_condition"
                                                class="form-check-input" onclick="toggleMedicalCondition()">
                                            <label for="has_medical_condition" class="form-check-label">Do you
                                                have any medical condition?</label>
                                            <p class="sm text-muted" style="font-size: 0.8rem">Click the
                                                checkbox</p> <!-- Small and faded color -->
                                        </div>
                                        <div id="medical_condition_section" class="d-none">
                                            <label for="medical_condition" class="form-label">Medical
                                                Condition</label>
                                            <textarea id="medical_condition" name="medicalcondition" class="form-control"
                                                placeholder="Describe the medical condition"></textarea>
                                        </div>
                                    </div>

                                    <!-- Checkbox for acknowledging the rules -->
                                    <div class="form-check mb-3">
                                        <label for="rules_checkbox" class="form-check-label">
                                            The information provided in this form is true and complete to the
                                            best of my knowledge and I have read and agree to the
                                            <a href="#" id="view_rules">rules and regulations</a>.
                                        </label>
                                        <input type="checkbox" id="rules_checkbox" class="form-check-input ms-2"
                                            name="agreetorules" required>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="prevBtn"
                                disabled>Previous</button>
                            <button type="button" class="btn btn-warning" id="nextBtn">Next</button>
                            <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </section>

    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')

</body>

</html>
