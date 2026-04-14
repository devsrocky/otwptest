<?php
/**
 * TASK 3 — Debug Challenge
 *
 * This file has 5 bugs. Find them ALL and fix them.
 * Make a SEPARATE COMMIT for each bug fix.
 *
 * Bug categories to look for:
 * - PHP syntax/logic errors
 * - HTML structure errors
 * - CSS errors
 * - Security vulnerabilities (XSS)
 * - Responsive/layout issues
 *
 * Run this file to see which bugs cause visible errors:
 *   php task-3-debug/broken-page.php > output.html
 *   Then open output.html in a browser.
 */

// Simulated data
$practice_info = [
    'name'    => 'Sunshine Dental Clinic',
    'tagline' => 'Your Smile, Our Priority <script>alert("hacked")</script>',
    'phone'   => '(555) 123-4567',
    'address' => '123 Main Street, Suite 200',
];

$services = [
    ['title' => 'General Dentistry',  'icon' => '🦷', 'desc' => 'Routine checkups and cleanings.'],
    ['title' => 'Orthodontics',       'icon' => '😁', 'desc' => 'Braces and Invisalign for all ages.'],
    ['title' => 'Cosmetic Dentistry', 'icon' => '✨', 'desc' => 'Veneers, whitening, and smile makeovers.'],
];

$testimonials = [
    ['name' => 'John D.',    'text' => 'Best dental experience ever!', 'rating' => 5],
    ['name' => 'Sarah M.',   'text' => 'Very professional and caring staff.', 'rating' => 4],
    ['name' => 'Ahmed K.',   'text' => 'Transformed my smile completely.', 'rating' => 5],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($practice_info['name']); ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Lato', sans-serif; color: #333; }

        .hero {
            background: #2E86AB;
            color: white;
            padding: 80px 20px;
            text-align: center;
        }
        .hero h1 { font-family: 'Quicksand', sans-serif; font-size: 48px; margin-bottom: 16px; }
        .hero p { font-size: 20px; }

        .services {
            padding: 60px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .services h2 {
            text-align: center;
            font-family: 'Quicksand', sans-serif;
            font-size: 36px;
            margin-bottom: 40px;
        }
        .services-grid {
            display: flex;
            gap: 30px;
            justify-content: center;
        }
        .service-card {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            width: 300px;
        }
        .service-card .icon { font-size: 48px; margin-bottom: 16px; }
        .service-card h3 { font-family: 'Quicksand', sans-serif; margin-bottom: 8px; }

        .testimonials {
            background: #f0f7fa;
            padding: 60px 20px;
        }
        .testimonials h2 {
            text-align: center;
            font-family: 'Quicksand', sans-serif;
            font-size: 36px;
            margin-bottom: 40px;
        }
        .testimonial-grid {
            display: flex;
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
            justify-content: center;
        }
        .testimonial-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            width: 300px;
        }
        .stars { color: gold; font-size: 20px; margin-bottom: 12px; }

        /* BUG IS IN THIS MEDIA QUERY — FIND IT */
        @media (max-width: 768px) {
            .services-grid {
                flex-direction: column;
                align-items: center;
            }
            .testimonial-grid {
                flex-direction: column;
                align-items: center;
            }
            .hero h1 { font-size: 32px; }
        }

    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <h1><?php echo $practice_info['name']; ?></h1>
        <p><?php echo htmlspecialchars($practice_info['tagline']); ?></p>
    </section>

    <!-- Services Section -->
    <section class="services">
        <h2>Our Services</h2>
        <div class="services-grid">
            <?php foreach ($services as $service) { ?>
                <div class="service-card">
                    <div class="icon"><?php echo $service['icon']; ?></div>
                    <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                    <p><?php echo htmlspecialchars($service['desc']); ?></p>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <h2>What Our Patients Say</h2>
        <div class="testimonial-grid">
            <?php foreach ($testimonials as $testimonial) { ?>
                <div class="testimonial-card">
                    <div class="stars">
                        <?php for ($i = 0; $i <= $testimonial['rating']; $i++) { ?>
                            ★
                        <?php } ?>
                    </div>
                    <p>"<?php echo htmlspecialchars($testimonial['text']); ?>"</p>
                    <strong>— <?php echo htmlspecialchars($testimonial['name']); ?></strong>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- Footer -->
    <footer style="background: #333; color: white; padding: 40px 20px; text-align: center;">
        <p><?php echo htmlspecialchars($practice_info['name']); ?></p>
        <p><?php echo htmlspecialchars($practice_info['address']); ?> | <?php echo $practice_info['phone']; ?></p>
        <p>&copy; <?php echo date('Y'); ?> All rights reserved.</p>
    </footer>

</body>
</html>
