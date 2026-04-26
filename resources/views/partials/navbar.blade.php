<style>
    :root {
        --navbar-panel: rgba(255, 255, 255, 0.96);
        --navbar-panel-dark: rgba(23, 21, 18, 0.96);
        --navbar-border: #e2e2df;
        --navbar-text: #111111;
        --navbar-accent: #b87424;
        --navbar-accent-strong: #955b16;
    }
    .topbar {
        position: relative;
        display: grid;
        grid-template-columns: auto minmax(0, 1fr) auto;
        align-items: center;
        gap: 20px;
        z-index: 2000;
        overflow: visible;
    }
    .navbar-brand {
        flex: 0 0 auto;
    }
    .navbar-right {
        display: flex;
        align-items: center;
        gap: 12px;
        justify-self: end;
    }
    .navbar-menu {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 18px;
        flex-wrap: wrap;
    }
    .navbar-menu a {
        text-decoration: none;
        color: inherit;
        opacity: 0.88;
    }
    .navbar-menu a:hover {
        opacity: 1;
    }
    .navbar-menu a.nav-login-btn {
        padding: 10px 16px;
        border-radius: 999px;
        background: linear-gradient(180deg, var(--navbar-accent) 0%, var(--navbar-accent-strong) 100%);
        color: #fff;
        opacity: 1;
        font-weight: 700;
        box-shadow: 0 10px 24px rgba(184, 116, 36, 0.28);
    }
    .nav-utility {
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }
    .navbar-theme-toggle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 999px;
        border: 1px solid rgba(184, 116, 36, 0.32);
        background: rgba(184, 116, 36, 0.1);
        color: inherit;
        cursor: pointer;
        transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
    }
    .navbar-theme-toggle:hover {
        background: rgba(184, 116, 36, 0.16);
        border-color: rgba(184, 116, 36, 0.5);
        transform: translateY(-1px);
    }
    .navbar-theme-toggle svg {
        width: 18px;
        height: 18px;
        fill: currentColor;
    }
    .logout-form {
        margin: 0;
    }
    .logout-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 14px;
        border-radius: 999px;
        border: 1px solid rgba(17, 17, 17, 0.14);
        background: transparent;
        color: inherit;
        font: inherit;
        cursor: pointer;
    }
    .navbar-toggle {
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: transparent;
        border: 1px solid rgba(17, 17, 17, 0.12);
        border-radius: 12px;
        cursor: pointer;
        width: 42px;
        height: 42px;
        padding: 0;
    }
    .navbar-toggle span {
        display: block;
        width: 18px;
        height: 2px;
        background: currentColor;
        margin: 2px 0;
        transition: 0.3s;
    }
    .navbar-toggle.open span:nth-child(1) {
        transform: rotate(-45deg) translate(-4px, 4px);
    }
    .navbar-toggle.open span:nth-child(2) {
        opacity: 0;
    }
    .navbar-toggle.open span:nth-child(3) {
        transform: rotate(45deg) translate(-4px, -4px);
    }
    body.theme-dark .topbar {
        background: var(--navbar-panel-dark);
        border-color: rgba(255, 255, 255, 0.08);
        color: #f4ede2;
    }
    body.theme-dark .navbar-theme-toggle,
    body.theme-dark .navbar-toggle,
    body.theme-dark .logout-btn {
        border-color: rgba(255, 255, 255, 0.1);
        color: #f4ede2;
    }
    body.theme-dark .navbar-theme-toggle {
        background: rgba(217, 167, 103, 0.18);
    }
    @media (max-width: 768px) {
        .topbar {
            grid-template-columns: auto auto;
            align-items: center;
        }
        .navbar-right {
            gap: 10px;
        }
        .navbar-menu {
            display: flex;
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            right: 0;
            background: var(--navbar-panel);
            backdrop-filter: blur(8px);
            border: 1px solid var(--navbar-border);
            border-radius: 16px;
            flex-direction: column;
            align-items: stretch;
            padding: 16px;
            z-index: 2100;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform: translateY(-8px) scale(0.98);
            transform-origin: top center;
            max-height: 0;
            overflow: hidden;
            transition: opacity 0.2s ease, transform 0.22s ease, max-height 0.25s ease, visibility 0s linear 0.22s;
        }
        .navbar-menu.open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(0) scale(1);
            max-height: 72vh;
            overflow-y: auto;
            transition: opacity 0.2s ease, transform 0.22s ease, max-height 0.25s ease;
        }
        body.theme-dark .navbar-menu {
            background: var(--navbar-panel-dark);
            border-color: rgba(255, 255, 255, 0.08);
        }
        .navbar-menu a,
        .logout-btn {
            width: 100%;
            justify-content: center;
        }
        .navbar-toggle {
            display: inline-flex;
        }
    }
</style>
<div class="topbar">
    <div class="navbar-brand">Sword Showcase Hub</div>
    <nav class="navbar-menu" aria-label="Main navigation">
        <a href="/welcome">Explore</a>
        <a href="/feed">Feed</a>
        <a href="/shop">Shop</a>
        <a href="/discussions">Discussions</a>
        <a href="/profile">Profile</a>
        <a href="/upload">Upload Sword</a>
        @if (session('logged_in'))
            <form class="logout-form" method="post" action="/logout">
                @csrf
                <button class="logout-btn" type="submit">Logout</button>
            </form>
        @else
            <a class="nav-login-btn" href="/login">Login</a>
        @endif
    </nav>
    <div class="navbar-right">
        @if (!empty($showCartButton))
            <button class="cart-trigger" type="button" id="open-cart-btn" aria-label="Open cart">
                <span>Cart</span>
                <span class="cart-count" id="cart-count">0</span>
            </button>
        @endif
        <button class="navbar-theme-toggle" type="button" aria-label="Toggle theme">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
            </svg>
        </button>
        <button class="navbar-toggle" type="button" aria-label="Toggle menu" aria-expanded="false" aria-controls="primary-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</div>
<script>
    const navbarScript = document.currentScript;
    document.addEventListener('DOMContentLoaded', function() {
        const topbar = navbarScript && navbarScript.previousElementSibling
            ? navbarScript.previousElementSibling
            : document.querySelector('.topbar');

        if (!topbar) {
            return;
        }

        const hamburger = topbar.querySelector('.navbar-toggle');
        const menu = topbar.querySelector('.navbar-menu');
        const themeToggle = topbar.querySelector('.navbar-theme-toggle');

        if (!hamburger || !menu) {
            return;
        }

        const menuLinks = Array.from(menu.querySelectorAll('a'));

        menu.id = 'primary-menu';
        topbar.style.overflow = 'visible';

        const isMobile = function() {
            return window.innerWidth <= 768;
        };

        const setMenuState = function(isOpen) {
            if (isMobile()) {
                menu.classList.toggle('open', isOpen);
                hamburger.classList.toggle('open', isOpen);
                hamburger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                menu.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
            } else {
                menu.classList.remove('open');
                hamburger.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
                menu.setAttribute('aria-hidden', 'false');
            }
        };

        setMenuState(false);

        hamburger.addEventListener('click', function() {
            const nextState = !menu.classList.contains('open');
            setMenuState(nextState);
        });

        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                if (window.ThemeMode) {
                    window.ThemeMode.toggle();
                }
            });
        }

        menuLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                if (isMobile()) {
                    setMenuState(false);
                }
            });
        });

        window.addEventListener('resize', function() {
            setMenuState(menu.classList.contains('open'));
        });

        document.addEventListener('click', function(event) {
            if (!isMobile() || !menu.classList.contains('open')) {
                return;
            }

            if (!topbar.contains(event.target)) {
                setMenuState(false);
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && menu.classList.contains('open')) {
                setMenuState(false);
            }
        });
    });
</script>
