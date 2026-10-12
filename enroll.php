<?php
require 'includes/db.php';

$success = $error = '';
$program = htmlspecialchars($_GET['program'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['full_name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $prog    = trim($_POST['program'] ?? '');

    if ($name && $email && $prog) {
        $stmt = $pdo->prepare(
            'INSERT INTO enrollments (full_name, email, phone, program) VALUES (?, ?, ?, ?)'
        );
        $stmt->execute([$name, $email, $phone, $prog]);
        $success = "Thanks, $name! Your enrollment request has been received. We'll be in touch soon.";
    } else {
        $error = 'Please fill in all required fields.';
    }
}

require 'includes/header.php';
?>

<section class="enroll-hero">
    <div class="container">
        <p class="section-label" style="color:var(--accent);">Enroll Now</p>
        <h1>Start Your Tech Journey</h1>
        <p style="color:#ccc;">Fill in the form below and we'll reach out to guide you through the next steps.</p>
    </div>
</section>

<section style="background:#fff;">
    <div class="container enroll-form">
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
                <label>Phone number</label>
                <input type="tel" name="phone" placeholder="Phone number">
            </div>
            <div class="form-group">
                <label>Program *</label>
                <select name="program" required>
                    <option value="">Select a program</option>
                    <option value="frontend-engineering" <?= $program==='frontend-engineering'?'selected':'' ?>>Frontend Engineering</option>
                    <option value="backend-engineering"  <?= $program==='backend-engineering'?'selected':'' ?>>Backend Engineering</option>
                    <option value="full-stack-engineering" <?= $program==='full-stack-engineering'?'selected':'' ?>>Full Stack Engineering</option>
                    <option value="cybersecurity"        <?= $program==='cybersecurity'?'selected':'' ?>>Cybersecurity</option>
                    <option value="data-analysis"        <?= $program==='data-analysis'?'selected':'' ?>>Data Analysis</option>
                    <option value="data-science"         <?= $program==='data-science'?'selected':'' ?>>Data Science</option>
                    <option value="ai-foundation"        <?= $program==='ai-foundation'?'selected':'' ?>>AI Foundation</option>
                    <option value="ai-for-work"          <?= $program==='ai-for-work'?'selected':'' ?>>AI for Work</option>
                    <option value="ai-automation"        <?= $program==='ai-automation'?'selected':'' ?>>AI Automation</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Submit Enrollment</button>
        </form>
    </div>
</section>

<?php require 'includes/footer.php'; ?>
