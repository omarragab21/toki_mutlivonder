// Toki Authentication & Session State Handler
(function() {
    function initAuth() {
        var user = null;
        try {
            var stored = localStorage.getItem('toki_user');
            if (stored) {
                user = JSON.parse(stored);
            }
        } catch(e) {
            console.error('Error reading auth state:', e);
        }

        var isArabic = document.documentElement.lang === 'ar' || !document.documentElement.lang;

        var $welcomeName = $('.welcome__name');
        var $dropdownMenu = $('[aria-labelledby="dropthree"]');

        if (user && user.loggedIn && user.name) {
            if ($welcomeName.length) {
                $welcomeName.text(isArabic ? ('أهلاً ' + user.name) : ('Hi, ' + user.name));
            }
            if ($dropdownMenu.length) {
                var loggedInMenu = isArabic ? 
                    '<a class="dropdown-item" href="#"><i class="fa-regular fa-user ml-2"></i> الملف الشخصي</a>' +
                    '<a class="dropdown-item" href="#"><i class="fa-solid fa-box ml-2"></i> طلباتي</a>' +
                    '<div class="dropdown-divider"></div>' +
                    '<a class="dropdown-item text-danger" href="#" id="tokiLogoutBtn"><i class="fa-solid fa-arrow-right-from-bracket ml-2"></i> تسجيل الخروج</a>' :
                    '<a class="dropdown-item" href="#"><i class="fa-regular fa-user mr-2"></i> Profile</a>' +
                    '<a class="dropdown-item" href="#"><i class="fa-solid fa-box mr-2"></i> My Orders</a>' +
                    '<div class="dropdown-divider"></div>' +
                    '<a class="dropdown-item text-danger" href="#" id="tokiLogoutBtn"><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Log Out</a>';
                $dropdownMenu.html(loggedInMenu);
            }
        } else {
            if ($welcomeName.length) {
                $welcomeName.text(isArabic ? 'تسجيل الدخول' : 'Sign In');
            }
            if ($dropdownMenu.length) {
                var guestMenu = isArabic ?
                    '<a class="dropdown-item" href="login.html"><i class="fa-solid fa-arrow-right-to-bracket ml-2"></i> تسجيل دخول</a>' +
                    '<a class="dropdown-item" href="signup.html"><i class="fa-solid fa-user-plus ml-2"></i> إنشاء حساب</a>' :
                    '<a class="dropdown-item" href="login_en.html"><i class="fa-solid fa-arrow-right-to-bracket mr-2"></i> Sign In</a>' +
                    '<a class="dropdown-item" href="signup_en.html"><i class="fa-solid fa-user-plus mr-2"></i> Sign Up</a>';
                $dropdownMenu.html(guestMenu);
            }
        }
    }

    $(document).on('click', '#tokiLogoutBtn', function(e) {
        e.preventDefault();
        localStorage.removeItem('toki_user');
        window.location.reload();
    });

    $(document).ready(function() {
        initAuth();
    });
})();
