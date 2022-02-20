<!-- SEO -->
<?php function SEO($title, $desc){ ?>
    <title><?php echo $title ? $title : "PinjamMobil | Naufal Akbar Nugroho" ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Naufal Akbar Nugroho">
    <meta name="description" content="<?php echo $desc ? $desc : "Car Rental App with PHP Native by Naufal Akbar Nugroho" ?>">
    <meta property="og:title" content="<?php echo $title ? $title : "PinjamMobil | Naufal Akbar Nugroho" ?>">
    <meta property="og:description" content="<?php echo $desc ? $desc : "Car Rental App with PHP Native by Naufal Akbar Nugroho" ?>">
    <meta property="og:image" content="/some-image.png">
    <!-- <meta property="og:url" content="/this-page.html"> -->
    <!-- <meta property="og:site_name" content="Your Site Name"> -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image:alt" content="image description">
    <link rel="apple-touch-icon" sizes="180x180" href="./public/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/favicon-16x16.png">
    <link rel="icon" href="./public/favicon.ico">
    <link rel="manifest" href="./public/site.webmanifest">
<?php } ?>

<!-- TailwindCSS CDN -->
<?php function TailwindCSS(){ ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
        }
    </script>
<?php } ?>

<!-- Bootstrap Icons CDN -->
<?php function BootstrapIcons(){ ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<?php } ?>

<!-- Script Dark Mode Button -->
<?php function DarkMode(){ ?>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }

        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        var logoDark = document.getElementById('logo-dark');
        var logoLight = document.getElementById('logo-light');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
            logoLight.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
            logoDark.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');
            logoDark.classList.toggle('hidden');
            logoLight.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === '') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', '');
                }

            // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', '');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
            
        });
    </script>
<?php } ?>