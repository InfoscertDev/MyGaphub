{{-- resources/views/vendor/mail/html/footer.blade.php --}}
<style>
    .footer-content {
        text-align: center;
        padding: 40px 20px 20px 20px;
        background-color: #f9fafb;
    }
    .footer-logo {
        height: 32px;
        margin-bottom: 20px;
    }
    .app-title {
        font-size: 16px;
        font-weight: 600;
        color: #1a1a1a;
        margin: 20px 0;
    }
    .app-badges {
        margin: 20px 0;
    }
    .app-badges a {
        display: inline-block;
        margin: 0 8px;
    }
    .app-badges img {
        height: 40px;
        vertical-align: middle;
    }
    .social-links {
        margin: 24px 0;
    }
    .social-links a {
        display: inline-block;
        margin: 0 10px;
        text-decoration: none;
    }
    .social-icon {
        width: 32px;
        height: 32px;
    }
    .copyright {
        font-size: 12px;
        color: #9ca3af;
        margin: 16px 0;
    }
    .legal-text {
        font-size: 11px;
        color: #9ca3af;
        line-height: 1.6;
        margin: 16px auto;
        max-width: 600px;
    }
    .disclaimer-text {
        font-size: 10px;
        color: #9ca3af;
        line-height: 1.5;
        margin: 16px auto;
        max-width: 600px;
    }
    .footer-links {
        font-size: 12px;
        color: #9ca3af;
        margin-top: 24px;
    }
    .footer-links a {
        color: #9ca3af;
        text-decoration: none;
        margin: 0 8px;
    }
    .footer-divider {
        border-top: 1px solid #e5e7eb;
        margin: 20px 0 30px 0;
    }
</style>

<tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td class="content-cell" align="center">
                    <div class="footer-content">
                        <div class="footer-divider"></div>

                        <img src="https://mygaphub.com/images/Logo.png" alt="GAPhub" class="footer-logo">

                        <p class="app-title">Get the GAPhub app</p>

                        <div class="app-badges">
                            <a href="https://apps.apple.com/us/app/gaphub/id1577758374" target="_blank">
                                <img src="https://mygaphub.com/images/cta/mobile-app-store-apple.png" alt="Download on App Store">
                            </a>
                            <a href="https://play.google.com/store/apps/details?id=com.prismcheck.gaphub&pli=1" target="_blank">
                                <img src="https://mygaphub.com/images/cta/mobile-app-store-android.png" alt="Get it on Google Play">
                            </a>
                        </div>

                        <div class="social-links">
                            <a href="https://instagram.com/mygaphub" target="_blank">
                                <svg class="social-icon" fill="#E4405F" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            <a href="https://linkedin.com/company/mygaphub" target="_blank">
                                <svg class="social-icon" fill="#0077B5" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="https://youtube.com/@mygaphub" target="_blank">
                                <svg class="social-icon" fill="#FF0000" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                            <a href="https://facebook.com/mygaphub" target="_blank">
                                <svg class="social-icon" fill="#1877F2" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="https://twitter.com/mygaphub" target="_blank">
                                <svg class="social-icon" fill="#000000" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </a>
                        </div>

                        <p class="copyright">© {{ date('Y') }} myGAPhub. All rights reserved.</p>

                        <p class="legal-text">
                            myGAPhub© is the digital product of PRISM Financial Technology Limited, a Fintech company registered in England & Wales with registration no. 12837226 and registered office at 20-22 Wenlock Road, London, England, N1 7GU. Our terms and conditions apply.
                        </p>

                        <p class="disclaimer-text">
                            This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error, please notify the system manager. This message contains confidential information and is intended only for the individual named. If you are not the named addressee, you should not disseminate, distribute or copy this email. Please notify the sender immediately by email if you have received this email by mistake and delete this email from your system. If you are not the intended recipient, you are notified that disclosing, copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited.
                        </p>

                        <div class="footer-links">
                            <a href="#">Privacy policy</a> •
                            <a href="#">Terms of service</a> •
                            <a href="#">Help center</a> •
                            <a href="#">Unsubscribe</a>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>
