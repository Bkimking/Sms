<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us - Kenswed TVTC</title>
    @include('layouts.head')
    <style>
        #contact {
            padding: 50px 20px;
            text-align: center;
        }

        #contact h2 {
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #contact p {
            font-size: 1.1rem;
            color: #6c757d;
            margin-bottom: 30px;
        }

        .contact-details {
            max-width: 600px;
            margin: 0 auto;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .contact-details p {
            margin: 10px 0;
            font-size: 1rem;
        }
    </style>
</head>

<body>
    @include('layouts.header')

    <section id="contact">
        <h2>Contact Us</h2>
        <p>Have questions? Reach out to us through the following ways:</p>

        <div class="contact-details">
            <p><strong>Phone:</strong> <a href="tel:+254790148509">+254 790 148 509</a></p>
            <p><strong>Email:</strong> <a href="mailto:info@kenswedvtc.kenswedtectclub.org">info@kenswedvtc.kenswedtectclub.org</a></p>
            <p><strong>P.O BOX:</strong> 5490 00200</p>
            <p><strong>Address:</strong> Kibiko, Ngong, Kajiado West, Kenya</p>
            <p><strong>Social Media:</strong></p>
            <p>TikTok: <a href="https://www.tiktok.com/@kenswedtechnicalcollege">TikTok/kenswedtvtc</a></p>
        </div>
    </section>

    @include('layouts.footer')
    @include('layouts.scripts')
</body>

</html>