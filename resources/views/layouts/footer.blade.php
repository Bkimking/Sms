<!-- Scroll-to-top Button -->
<div id="scrollToTopBtn" class="scroll-btn" style="display: none;">
    <span class="material-icons arrow arrow3">keyboard_arrow_up</span>
    <span class="material-icons arrow arrow2">keyboard_arrow_up</span>
    <span class="material-icons arrow arrow1">keyboard_arrow_up</span>
</div>

<footer class="bg-dark text-white py-5">
    <div class="container">
        <!-- Top Footer Section -->
        <div class="row">
            <!-- About Us -->
            <div class="col-md-4">
                <h5 class="footer-title">About Us</h5>
                <p>
                    At Kenswed TVTC, we aim to nurture talent and skills through top-notch technical and vocational training. Our goal is to empower students to achieve their dreams and transform their communities.
                    <a href="{{ route('about') }}" class="btn btn-outline-light footer-link">READMORE...</a>
                </p>
                <div class="social-icons mt-3">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5 class="footer-title">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="footer-link">Home</a></li>
                    <li><a href="courses.php" class="footer-link">Courses</a></li>
                    <li><a href="about.php" class="footer-link">About Us</a></li>
                    <li><a href="blog.php" class="footer-link">Blog</a></li>
                    <li><a href="contact.php" class="footer-link">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4">
                <h5 class="footer-title">Contact Us</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-phone"></i> +254 700 123 456</li>
                    <li><i class="fas fa-envelope"></i> info@kenswedtvtc.ac.ke</li>
                    <li><i class="fas fa-map-marker-alt"></i> Nairobi, Kenya</li>
                </ul>
                <a href="contact.php" class="btn btn-outline-light mt-3">Get in Touch</a>
            </div>
        </div>

        <!-- Newsletter Subscription -->
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <h5 class="footer-title">Subscribe to Our Newsletter</h5>
                <p>Stay updated with the latest news and offers from Kenswed TVTC.</p>
                <form id="newsletterForm" class="d-flex justify-content-center mt-3">
                    <input type="email" id="newsletterEmail" class="form-control w-50 me-2" placeholder="Enter your email" required>
                    <button type="submit" class="btn btn-outline-light">Subscribe</button>
                </form>
                <p id="subscriptionMessage" class="mt-3 text-success" style="display: none;">Thank you for subscribing!</p>
            </div>
        </div>

        <!-- Bottom Footer Bar -->
        <div class="row mt-5 border-top pt-4">
            <div class="col-md-6 text-start">
                <p>&copy; {{ date('Y') }} Kenswed TVTC | All Rights Reserved</p>
            </div>
            <div class="col-md-6 text-end">
                <p>Developed by <a href="#" class="footer-link">CBD devs & Cyber</a></p>
            </div>
        </div>
    </div>
</footer>