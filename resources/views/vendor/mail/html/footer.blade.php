{{-- resources/views/vendor/mail/html/footer.blade.php --}}
<style>
    .footer-content {
        text-align: center;
        padding: 20px 20px;
        background-color: #f9fafb;
        font-family: 'Nunito Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    }
    .footer-logo {
        height: 32px;
        margin-bottom: 20px;
    }
    .app-title {
        font-size: 18px;
        font-weight: 700;
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
        height: auto;
        max-height: 50px;
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
        font-size: 11px;
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
        font-size: 11px;
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
                            <a href="https://instagram.com/prismcheck" target="_blank">
                                <img src={{  asset('/assets/icon/socials/instagram.png') }} alt="IG" />
                            </a>
                            <a href="https://linkedin.com/company/prismcheck" target="_blank">
                                <img src={{  asset('/assets/icon/socials/linkedin.png') }} alt="LK" />
                            </a>
                            <a href="https://youtube.com/@prismcheck" target="_blank">
                                <img src={{  asset('/assets/icon/socials/youtube.png') }} alt="YT" />
                            </a>
                            <a href="https://facebook.com/prismcheck" target="_blank">
                                <img src={{  asset('/assets/icon/socials/facebook.png') }} alt="IG" />
                            </a>
                            <a href="https://x.com/prismcheck" target="_blank">
                                <img src={{  asset('/assets/icon/socials/twitter.png') }} alt="IG" />
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
