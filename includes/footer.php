<footer>
    <div class="footer-inner">
        <div class="footer-brand">
            <strong>BriQsLab</strong>
            <p>Empowering the next generation of tech innovators with cutting-edge skills for the digital economy.</p>
        </div>
        <div class="footer-links">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact</a>
            <a href="courses.php">Courses</a>
        </div>
        <div class="footer-contact">
            <p>info@briqslab.com</p>
            <p>+2347065986380</p>
            <p>118, BriQsLab, along Akeja St, opposite Gbenga Daniel Estate, Ota 112104, Ogun State</p>
        </div>
    </div>
    <p class="footer-copy">&copy; <?= date('Y') ?> BriQsLab. All rights reserved.</p>
</footer>
<script>
    document.querySelector('.nav-toggle').addEventListener('click', () => {
        document.querySelector('.nav-links').classList.toggle('open');
    });
</script>
</body>
</html>
