<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Electrical Services | Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">⚡ H.OneElectricPro</div>
            <ul class="nav-links" id="navLinks">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Reliable & Affordable Electrical Services</h1>
            <p>Safety-focused electrical solutions for your home and small business</p>
            <div class="cta-buttons">
                <a href="#contact" class="btn btn-primary">Request a Quote</a>
                <a href="tel:+254759147102" class="btn btn-secondary">Call Now</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <h2>About Me</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>Hello! I'm a dedicated trainee electrician committed to providing safe, reliable, and honest electrical services. While I'm early in my career, I bring enthusiasm, attention to detail, and a strong commitment to learning and professional standards.</p>
                    <p>Every job I undertake is approached with:</p>
                    <ul>
                        <li>✓ Safety as the top priority</li>
                        <li>✓ Honest and transparent pricing</li>
                        <li>✓ Continuous learning and skill development</li>
                        <li>✓ Professional workmanship and customer service</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">🔌</div>
                    <h3>Electrical Installation</h3>
                    <p>Professional installation of electrical systems for residential and small commercial properties.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">⚡</div>
                    <h3>Wiring & Rewiring</h3>
                    <p>Safe and efficient wiring solutions for new constructions and upgrades to existing systems.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">💡</div>
                    <h3>Socket & Lighting</h3>
                    <p>Installation and repair of sockets, switches, and lighting fixtures throughout your property.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🔧</div>
                    <h3>Breaker & Fuse Repairs</h3>
                    <p>Quick diagnosis and repair of circuit breakers, fuse boxes, and electrical panels.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🔍</div>
                    <h3>Fault Diagnosis</h3>
                    <p>Systematic troubleshooting to identify and resolve electrical issues safely and efficiently.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🏠</div>
                    <h3>Residential Services</h3>
                    <p>Comprehensive electrical services tailored to home and small business needs.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🔥</div>
                    <h3>Powew Backup & Energy</h3>
                    <p>Generator installation & maintenance, inverter & battery backup systems, and solar panel wiring & integration.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">📝</div>
                    <h3>Support Services</h3>
                    <p>Professional electrical consultation, project constructions estimation, preventive maintenance plans and Annual Service  Contracts (AMC).</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">📡</div>
                    <h3>Modern electrical Services</h3>
                    <p>Smart home electrical setup, smart switches & automation, CCTV &security system wiring, doorbell systems & data cabling.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>Get In Touch</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <div class="info-item">
                        <strong>📞 Phone:</strong>
                        <a href="tel:+254759147102">+254-759-147-102</a>
                    </div>
                    <div class="info-item">
                        <strong>📧 Email:</strong>
                        <a href="mailto:h@oneelectricpro.com">h@oneelectricpro.com</a>
                    </div>
                    <div class="info-item">
                        <strong>📍 Location:</strong>
                        <span>Serving Local Areas</span>
                    </div>
                    <a href="https://wa.me/+254 759147102" class="whatsapp-btn" target="_blank">
                        💬 Chat on WhatsApp
                    </a>
                </div>
                <div class="contact-form">
                    <form id="contactForm" action="php/submit_contact.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" id="phone" placeholder="Your Phone" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" rows="5" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                        <div id="formMessage"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>⚡ H.OneElectricPro</h3>
                    <p>Professional electrical services you can trust.</p>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#" target="_blank">Facebook</a>
                        <a href="#" target="_blank">Instagram</a>
                        <a href="#" target="_blank">LinkedIn</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 H.OneElectricPro. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
 