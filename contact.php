<?php
require 'includes/db.php';

$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['full_name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name && $email && $message) {
        $stmt = $pdo->prepare(
            'INSERT INTO contact_messages (full_name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)'
        );
        $stmt->execute([$name, $email, $phone, $subject, $message]);
        $success = 'Your message has been sent. We\'ll get back to you shortly.';
    } else {
        $error = 'Please fill in all required fields.';
    }
}

require 'includes/header.php';
?>

<section class="contact-hero">
    <div class="container">
        <p class="section-label" style="color:var(--accent);">Get In Touch</p>
        <h1>Let's Start a Conversation</h1>
        <p style="color:#ccc;">Have a question about our programs, admissions, or learning experience? We're here to help.</p>
    </div>
</section>

<section style="background:#fff;">
    <div class="container contact-grid">
        <!-- FORM -->
        <div>
            <h2 style="margin-bottom:1.5rem;">How Can We Help?</h2>
            <?php if ($success): ?><div class="alert alert-success"><?= htmlspecialchars($success) ?></div><?php endif; ?>
            <?php if ($error):   ?><div class="alert alert-error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label>Full name *</label>
                    <input type="text" name="full_name" placeholder="Full name" required>
                </div>
                <div class="form-group">
                    <label>Email address *</label>
                    <input type="email" name="email" placeholder="Email address" required>
                </div>
                <div class="form-group">
                    <label>Phone number (optional)</label>
                    <input type="tel" name="phone" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <label>What is this about?</label>
                    <select name="subject">
                        <option value="">Select a category</option>
                        <option>Program Enquiry</option>
                        <option>Admissions</option>
                        <option>Fees &amp; Payment</option>
                        <option>Technical Support</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Your message *</label>
                    <textarea name="message" placeholder="How can we help?"></textarea>
                </div>
                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>

        <!-- INFO -->
        <div>
            <h2 style="margin-bottom:1.5rem;">For more enquiries</h2>
            <div class="contact-info-item">
                <span class="icon">✉️</span>
                <div><h4>Email</h4><a href="mailto:info@briqslab.com">info@briqslab.com</a></div>
            </div>
            <div class="contact-info-item">
                <span class="icon">📞</span>
                <div><h4>Call our support</h4><p>Available during business hours</p><a href="tel:07065986380">07065986380</a></div>
            </div>
            <div class="contact-info-item">
                <span class="icon">💬</span>
                <div><h4>WhatsApp</h4><a href="https://wa.me/2348185768945" target="_blank">08185768945</a></div>
            </div>
            <div class="contact-info-item">
                <span class="icon">📍</span>
                <div><h4>Location</h4><p>118, BriQsLab, along Akeja St, opposite Gbenga Daniel Estate, Ota 112104, Ogun State</p><a href="https://maps.google.com" target="_blank">Find on map →</a></div>
            </div>
            <div class="contact-info-item">
                <span class="icon">🕐</span>
                <div><h4>Opening Hours</h4><p>9am–5pm, Monday–Saturday</p></div>
            </div>
        </div>
    </div>
</section>

<!-- QUICK LINKS -->
<section style="background:var(--light);">
    <div class="container">
        <h2 class="section-title">Looking for something?</h2>
        <div class="why-grid">
            <div class="why-card"><h3>Explore Programs</h3><p>Find a program that matches your goals.</p><a href="courses.php" style="color:var(--accent);font-weight:600;">Go →</a></div>
            <div class="why-card"><h3>Frequently Asked Questions</h3><p>Get answers about courses, fees, schedules and admissions.</p><a href="courses.php#faq" style="color:var(--accent);font-weight:600;">Go →</a></div>
            <div class="why-card"><h3>Admissions</h3><p>Learn how to apply and start your journey.</p><a href="enroll.php" style="color:var(--accent);font-weight:600;">Go →</a></div>
        </div>
    </div>
</section>

<?php require 'includes/footer.php'; ?>
