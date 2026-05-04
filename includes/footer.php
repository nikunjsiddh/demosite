<?php
/**
 * Shared footer — marine footer block, scripts, closing tags.
 *
 * Pages may set $extra_scripts BEFORE including this file to inject
 * page-specific <script> tags just before </body>.
 */
$extra_scripts = $extra_scripts ?? '';
?>

    <!-- ─── MARINE FOOTER ─── -->
    <footer id="footer" class="marine-footer">
        <div class="footer-bubbles" id="footerBubbles"></div>

        <div class="marine-footer-inner">
            <div class="marine-footer-grid">
                <!-- Brand -->
                <div class="ftr-col">
                    <div class="ftr-logo">
                        <img src="images/logo-white.png" alt="<?= SITE_NAME ?>">
                        <div class="ftr-logo-text"><?= SITE_NAME ?><span>Ship Recycling · Since 1983</span></div>
                    </div>
                    <p class="ftr-about-text">
                        Leading India's ship recycling industry from Alang, Gujarat with over four decades of expertise,
                        sustainable practices, and unwavering commitment to environmental responsibility.
                    </p>
                    <div class="ftr-trust-badge">
                        <i class="fas fa-shield-halved"></i>
                        ISO Certified · HKC Compliant
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="ftr-col">
                    <h4>Quick Links</h4>
                    <ul class="ftr-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="sspsb.php">Sachdeva Steel Products</a></li>
                        <li><a href="jjsb.php">Jai Jagdish Ship Breakers</a></li>
                        <li><a href="news.php">News</a></li>
                        <li><a href="gallery.php">Media</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>

                <!-- Companies -->
                <div class="ftr-col">
                    <h4>Our Companies</h4>
                    <ul class="ftr-companies">
                        <li>
                            <a href="sspsb.php">
                                <span class="cmp-icon"><i class="fas fa-anchor"></i></span>
                                <span class="cmp-text">
                                    Sachdeva Steel Products (Ship Breaking Unit) LLP
                                    <small>Since 1997 · 36+ Ships</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="jjsb.php">
                                <span class="cmp-icon"><i class="fas fa-sailboat"></i></span>
                                <span class="cmp-text">
                                    Jai Jagdish Ship Breakers Pvt. Ltd.
                                    <small>Since 1998 · 35+ Ships</small>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="ftr-col">
                    <h4>Get In Touch</h4>
                    <ul class="ftr-contact">
                        <li>
                            <span class="ci-icon"><i class="fas fa-location-dot"></i></span>
                            <div class="ci-meta">
                                <b>Address</b>
                                <?= nl2br(htmlspecialchars(CONTACT_ADDRESS)) ?>
                            </div>
                        </li>
                        <li>
                            <span class="ci-icon"><i class="fas fa-envelope"></i></span>
                            <div class="ci-meta">
                                <b>Email</b>
                                <a href="mailto:<?= CONTACT_EMAIL ?>"><?= CONTACT_EMAIL ?></a>
                            </div>
                        </li>
                        <li>
                            <span class="ci-icon"><i class="fas fa-phone-volume"></i></span>
                            <div class="ci-meta">
                                <b>Call Us</b>
                                <a href="tel:<?= preg_replace('/\s/', '', CONTACT_PHONE) ?>"><?= CONTACT_PHONE ?></a>
                            </div>
                        </li>
                    </ul>

                    <div class="ftr-social-row">
                        <a href="#" class="ftr-social-btn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="ftr-social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="ftr-social-btn" title="Twitter / X"><i class="fab fa-x-twitter"></i></a>
                        <a href="#" class="ftr-social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="https://wa.me/919925499123" target="_blank" class="ftr-social-btn" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="marine-footer-bottom">
            <p>© <?= date('Y') ?> <?= SITE_NAME ?>. Crafted <i class="fas fa-anchor"></i> for the seas. All rights reserved.</p>
            <div class="ftr-bottom-links">
                <a href="#">Privacy Policy</a>
                <span>•</span>
                <a href="#">Terms of Service</a>
                <span>•</span>
                <a href="#">Sitemap</a>
            </div>
        </div>
    </footer>
    <script src="js/marine-footer.js"></script>

    <?= $extra_scripts ?>
</body>
</html>
