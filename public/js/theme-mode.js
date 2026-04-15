(function () {
    var storedTheme = localStorage.getItem('profileTheme');
    var theme = storedTheme === 'light' ? 'light' : 'dark';

    var applyTheme = function () {
        if (!document.body) {
            return;
        }

        document.body.classList.toggle('light-mode', theme === 'light');
        document.body.classList.toggle('theme-dark', theme === 'dark');
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', applyTheme);
    } else {
        applyTheme();
    }
})();
