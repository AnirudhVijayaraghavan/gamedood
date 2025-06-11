<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gamedood. | @yield('title', 'Dashboard')</title>


    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?
    family=Press+Start+2P&family=Orbitron:wght@400;700&display=swap"
        rel="stylesheet">

    <style>
        /* Background gradients */
        :root {
            --bg-start-light: #ff77ff;
            --bg-end-light: #6633ff;
            --bg-start-dark: #1c1c2d;
            --bg-end-dark: #0a0a1a;
        }

        html {
            transition: background .5s, color .5s;
        }

        body {
            font-family: 'Orbitron', sans-serif;
            background:
                url('/images/grid.svg') center/cover no-repeat,
                linear-gradient(135deg, var(--bg-start-light), var(--bg-end-light));
            color: #111;
        }

        .dark body {
            background:
                url('/images/grid.svg') center/cover no-repeat,
                linear-gradient(135deg, var(--bg-start-dark), var(--bg-end-dark));
            color: #fafafa;
        }

        /* Neon text glow */
        .text-neon {
            text-shadow:
                0 0 4px currentColor,
                0 0 8px currentColor,
                0 0 16px currentColor;
        }

        /* Fade-in-up */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .fade-in {
            opacity: 0;
            animation: fadeInUp 1s ease-out forwards;
        }

        .delay-1 {
            animation-delay: 0.5s
        }

        .delay-2 {
            animation-delay: 1s
        }

        .delay-3 {
            animation-delay: 1.5s
        }

        .delay-4 {
            animation-delay: 2s
        }

        .delay-5 {
            animation-delay: 2.5s
        }

        /* Jittering neon shapes */
        @keyframes jitter {

            0%,
            100% {
                transform: translate(0, 0) scale(1)
            }

            20% {
                transform: translate(-4px, 4px) scale(1.05)
            }

            40% {
                transform: translate(4px, -4px) scale(0.95)
            }

            60% {
                transform: translate(-3px, -3px) scale(1.02)
            }

            80% {
                transform: translate(3px, 3px) scale(0.98)
            }
        }

        .shape {
            position: absolute;
            opacity: .6;
            animation: jitter 6s ease-in-out infinite alternate;
        }

        .circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--neon-blue);
            box-shadow: 0 0 20px var(--neon-blue);
            top: 10%;
            left: 15%;
            animation-duration: 5s;
        }

        .square {
            width: 140px;
            height: 140px;
            background: var(--neon-pink);
            box-shadow: 0 0 20px var(--neon-pink);
            top: 65%;
            left: 75%;
            animation-duration: 7s;
        }

        .triangle {
            width: 0;
            height: 0;
            border-left: 70px solid transparent;
            border-right: 70px solid transparent;
            border-bottom: 140px solid var(--cyber-green);
            box-shadow: 0 0 20px var(--cyber-green);
            top: 45%;
            left: 25%;
            animation-duration: 6s;
            animation-delay: 1s;
        }

        /* Keep toggle on top */
        #theme-toggle {
            z-index: 50
        }

        /* Flicker effect for neon text */
        @keyframes text-flicker {

            0%,
            18%,
            22%,
            25%,
            53%,
            57%,
            100% {
                opacity: 1;
                text-shadow:
                    0 0 4px currentColor,
                    0 0 8px currentColor,
                    0 0 16px currentColor;
            }

            20%,
            24%,
            55% {
                opacity: 0.4;
                text-shadow: none;
            }
        }

        .flicker {
            animation: text-flicker 3s linear infinite;
        }
    </style>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script> --}}

    @livewireStyles
</head>

<body class="overflow-x-hidden">

    {{-- Light/Dark toggle --}}
    <button id="theme-toggle" onclick="toggleTheme()"
        class="fixed top-4 right-4 p-2 bg-white dark:bg-gray-800 rounded-full shadow-lg" aria-label="Toggle theme">
        <svg id="theme-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900 dark:text-gray-200"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <!-- injected by JS -->
        </svg>
    </button>

    <main>
        @yield('content')
    </main>

    <script>
        // Theme logic (unchanged)
        if (
            localStorage.theme === 'dark' ||
            (!('theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        function setIcon() {
            const icon = document.getElementById('theme-icon');
            if (document.documentElement.classList.contains('dark')) {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 3v1m0 16v1m8.66-8.66h-1M4.34 12h-1
             m15.02 5.02l-.7-.7M6.34 6.34l-.7-.7
             m12.02 0l-.7.7M6.34 17.66l-.7.7
             M12 5a7 7 0 100 14 7 7 0 000-14z" />`;
            } else {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M20.354 15.354A9 9 0 118.646 3.646
             7 7 0 0020.354 15.354z" />`;
            }
        }

        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
            localStorage.theme = document.documentElement.classList.contains('dark') ?
                'dark' : 'light';
            setIcon();
        }
        setIcon();
    </script>
    @livewireScripts
</body>

</html>
