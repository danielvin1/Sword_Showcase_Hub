(function () {
    var THEME_KEY = 'profileTheme';

    var getTheme = function () {
        return localStorage.getItem(THEME_KEY) === 'light' ? 'light' : 'dark';
    };

    var applyTheme = function (theme) {
        if (!document.body) {
            return;
        }

        document.body.classList.toggle('light-mode', theme === 'light');
        document.body.classList.toggle('theme-dark', theme === 'dark');
    };

    var setTheme = function (theme) {
        var normalizedTheme = theme === 'light' ? 'light' : 'dark';
        localStorage.setItem(THEME_KEY, normalizedTheme);
        applyTheme(normalizedTheme);
        return normalizedTheme;
    };

    var toggleTheme = function () {
        return setTheme(getTheme() === 'light' ? 'dark' : 'light');
    };

    window.ThemeMode = {
        apply: function () {
            applyTheme(getTheme());
        },
        get: getTheme,
        set: setTheme,
        toggle: toggleTheme
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', window.ThemeMode.apply);
    } else {
        window.ThemeMode.apply();
    }
})();
