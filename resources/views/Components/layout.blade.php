{{-- resources/views/components/layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    {{-- Add other global styles/scripts here --}}
</head>
<body>
    <x-nav-link />  {{-- This includes the nav bar on every page --}}
    @yield('content')  {{-- Page-specific content goes here --}}
    
    <script>
    // Define elements outside all functions so they are easily accessible globally
    const indicator = document.querySelector('.navbar-design-rect');
    const navCenter = document.querySelector('.nav-center');
    const links = document.querySelectorAll('.nav-center ul li a');

    // Define consistent padding for the indicator
    const INDICATOR_PADDING = 10; // 5px on each side

    /**
     * Calculates and applies the position and size of the indicator.
     * @param {HTMLElement} target - The link element (<a>) to position the indicator under.
     */
    const moveIndicator = (target) => {
        // Essential check: exit if required elements are missing
        if (!target || !indicator || !navCenter) {
            if (indicator) indicator.style.display = 'none'; // Hide if we can't position it
            return;
        }
        
        const linkRect = target.getBoundingClientRect();
        const navCenterRect = navCenter.getBoundingClientRect();

        // 1. Calculate new width with padding
        const newWidth = linkRect.width + INDICATOR_PADDING;
        
        // 2. Calculate left position: Link's left position relative to navCenter, minus half the padding to center it
        const offsetLeft = linkRect.left - navCenterRect.left - (INDICATOR_PADDING / 2);
        
        // Apply the new styles
        indicator.style.left = `${offsetLeft}px`;
        indicator.style.width = `${newWidth}px`;
    };


    // --- 1. Initial Load Positioning (When a new page loads) ---
    document.addEventListener('DOMContentLoaded', () => {
        const activeLink = document.querySelector('.nav-center ul li a.active');
        
        if (activeLink) {
            moveIndicator(activeLink);
            indicator.style.display = 'block'; // Make it visible once positioned
            indicator.style.opacity = '1'; // Full opacity on load
        } else {
             // If no active link is found (e.g., on an unlisted page), hide the indicator
            if (indicator) indicator.style.display = 'none'; 
        }
    });


    // --- 2. Hover/Mouse Movement Positioning (UX Improvement) ---
    links.forEach(link => {
        // Move indicator to the hovered link
        link.addEventListener('mouseenter', (e) => {
            moveIndicator(e.target);
            indicator.style.opacity = '0.7'; // Subtle hover effect
        });

        // Restore to the active link's position when hover leaves
        link.addEventListener('mouseleave', () => {
            const activeLink = document.querySelector('.nav-center ul li a.active');
            moveIndicator(activeLink);
            indicator.style.opacity = '1';
        });
    });

</script>
</body>
</html>