<style>
    :root {
        --navbar-panel: rgba(255, 255, 255, 0.95);
        --navbar-border: #e2e2df;
        --navbar-text: #111111;
    }
    .topbar {
        position: relative;
    }
    .hamburger {
        display: none;
        flex-direction: column;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        width: 20px;
        height: 20px;
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
    }
    .hamburger span {
        display: block;
        width: 100%;
        height: 2px;
        background: var(--navbar-text);
        margin: 2px 0;
        transition: 0.3s;
    }
    .hamburger.open span:nth-child(1) {
        transform: rotate(-45deg) translate(-4px, 4px);
    }
    .hamburger.open span:nth-child(2) {
        opacity: 0;
    }
    .hamburger.open span:nth-child(3) {
        transform: rotate(45deg) translate(-4px, -4px);
    }
    @media (max-width: 768px) {
        .menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--navbar-panel);
            backdrop-filter: blur(6px);
            border: 1px solid var(--navbar-border);
            border-top: none;
            border-radius: 0 0 14px 14px;
            flex-direction: column;
            padding: 18px;
            gap: 12px;
            z-index: 99;
        }
        .menu.open {
            display: flex;
        }
        .hamburger {
            display: flex;
        }
    }
</style>
<div class="topbar">
    <div class="brand">Sword Showcase Hub</div>
    <nav class="menu" aria-label="Top navigation">
        <a href="/welcome">Explore</a>
        <a href="/feed">Feed</a>
        <a href="/shop">Shop</a>
        <a href="/discussions">Discussions</a>
        <a href="/profile">Profile</a>
        <a href="/upload">Upload Sword</a>
    </nav>
    <button class="hamburger" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.querySelector('.hamburger');
        const menu = document.querySelector('.menu');

        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('open');
            menu.classList.toggle('open');
        });
    });
</script>