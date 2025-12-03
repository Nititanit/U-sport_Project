<?php
// --- Mock Data (เหมือนเดิม) ---
$sports_categories = [
    [ 'name' => 'Football', 'color' => '#ffe0b2', 'img' => 'https://cdn-icons-png.flaticon.com/512/3292/3292153.png' ],
    [ 'name' => 'Fitness', 'color' => '#ffcdd2', 'img' => 'https://cdn-icons-png.flaticon.com/512/2548/2548535.png' ],
    [ 'name' => 'Badminton', 'color' => '#b2ebf2', 'img' => 'https://cdn-icons-png.flaticon.com/512/2548/2548512.png' ], // เพิ่มตัวอย่างให้เห็นภาพบนจอใหญ่
    [ 'name' => 'Swimming', 'color' => '#e1bee7', 'img' => 'https://cdn-icons-png.flaticon.com/512/2906/2906263.png' ]
];

$venues = [
    [
        'id' => 1,
        'name' => 'Stadium 1(VIP)',
        'location' => 'Stephenson road, Perambur',
        'rating' => 4.0, 'reviews' => 4,
        'image' => 'https://images.unsplash.com/photo-1522778119026-d647f0565c6a?auto=format&fit=crop&w=600&q=80',
        'type' => 'Football'
    ],
    [
        'id' => 2,
        'name' => 'Stadium 2(VIP)',
        'location' => 'OMR Road, Navalur',
        'rating' => 4.5, 'reviews' => 12,
        'image' => 'https://images.unsplash.com/photo-1529900748604-07564a03e7a6?auto=format&fit=crop&w=600&q=80',
        'type' => 'Football'
    ],
    // เพิ่มข้อมูลจำลองเพื่อให้เห็น Grid ชัดเจนขึ้น
    [
        'id' => 3,
        'name' => 'City Arena Turf',
        'location' => 'Central Park, NY',
        'rating' => 4.8, 'reviews' => 20,
        'image' => 'https://images.unsplash.com/photo-1459865264687-595d652de67e?auto=format&fit=crop&w=600&q=80',
        'type' => 'Football'
    ],
    [
        'id' => 4,
        'name' => 'Pro Gym & Fitness',
        'location' => 'Downtown Street',
        'rating' => 4.2, 'reviews' => 8,
        'image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=600&q=80',
        'type' => 'Fitness'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
        /* --- CSS Global --- */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* --- Navbar (Top) --- */
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2e7d32; /* สีเขียวหลัก */
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .nav-links {
            display: flex;
            gap: 30px;
        }
        .nav-links a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s;
        }
        .nav-links a:hover, .nav-links a.active {
            color: #2e7d32;
        }
        .search-box-desktop {
            position: relative;
            width: 300px;
        }
        .search-box-desktop input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            background: #f1f1f1;
            outline: none;
        }
        .search-box-desktop i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }

        /* --- Main Layout --- */
        .main-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        /* Banner */
        .promo-banner {
            background-image: url('assets/images/Promo_u-sport.jpg');
            color: #fff;
            border-radius: 16px;
            padding: 150px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        /* Section Titles */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        h3.section-title { font-size: 24px; margin: 0; }

        /* Categories Grid */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Responsive Grid */
            gap: 20px;
            margin-bottom: 40px;
        }
        .cat-card {
            height: 120px;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            padding: 15px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .cat-card:hover { transform: translateY(-5px); }
        .cat-card span { font-weight: bold; font-size: 18px; color: #333; z-index: 2; }
        .cat-card img { position: absolute; right: -10px; bottom: -10px; height: 100px; opacity: 0.8; }

        /* Filters */
        .filter-bar {
            background: #fff;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            gap: 15px;
            align-items: center;
            border: 1px solid #eee;
        }
        .tag {
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            border: 1px solid #ddd;
            background: #fff;
            color: #666;
            cursor: pointer;
            transition: all 0.2s;
        }
        .tag:hover { background: #f0f0f0; }
        .tag.active-orange { background-color: #ff3d00; color: #fff; border-color: #ff3d00; }
        .tag.active-green { background-color: #00c853; color: #fff; border-color: #00c853; }

        /* Venues Grid (หัวใจสำคัญของ Web Layout) */
        .venue-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 คอลัมน์บนจอใหญ่ */
            gap: 25px;
        }
        
        /* Responsive Breakpoints */
        @media (max-width: 1024px) { .venue-grid { grid-template-columns: repeat(3, 1fr); } }
        @media (max-width: 768px) { .venue-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 480px) { .venue-grid { grid-template-columns: 1fr; } } /* กลับไปเป็น 1 แถวถ้าจอเล็กมาก */

        /* Venue Card Styles */
        .venue-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #eee;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            transition: box-shadow 0.3s;
        }
        .venue-card:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        
        .venue-img-wrapper { position: relative; height: 200px; }
        .venue-img-wrapper img { width: 100%; height: 100%; object-fit: cover; }
        
        .heart-icon {
            position: absolute; top: 10px; right: 10px;
            background: rgba(255,255,255,0.9); padding: 8px;
            border-radius: 50%; color: #aaa; cursor: pointer;
            transition: color 0.3s;
        }
        .heart-icon:hover { color: #f44336; }

        .venue-info { padding: 15px; }
        .venue-name { font-weight: bold; font-size: 18px; margin-bottom: 5px; color: #222; }
        .venue-location { font-size: 13px; color: #777; margin-bottom: 10px; }
        
        .rating-badge {
            background-color: #4caf50; color: #fff;
            padding: 4px 8px; border-radius: 4px;
            font-size: 12px; display: inline-flex; align-items: center; gap: 4px;
        }

        .venue-footer {
            display: flex; justify-content: space-between; align-items: center;
            margin-top: 15px; padding-top: 15px; border-top: 1px solid #f5f5f5;
        }
        .btn-book {
            background-color: #2e7d32; color: #fff; border: none;
            padding: 8px 16px; border-radius: 6px; cursor: pointer;
            font-size: 14px;
        }
        .btn-book:hover { background-color: #1b5e20; }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <i class="fas fa-running"></i> U-Sport
            </div>
            
            <div class="search-box-desktop">
                <input type="text" placeholder="Find sports, venues...">
                <i class="fas fa-search"></i>
            </div>

            <div class="nav-links">
                <a href="#" class="active"><i class="fas fa-home"></i> Home</a>
                <a href="#"><i class="fas fa-futbol"></i> Venues</a>
                <a href="#"><i class="fas fa-calendar-check"></i> My Bookings</a>
                <a href="#"><i class="fas fa-user-circle"></i> Profile</a>
            </div>
        </div>
    </nav>

    <div class="main-container">
        
        <div class="promo-banner">
        </div>

        <div class="section-header">
            <h3 class="section-title">Explore Sports</h3>
        </div>
        <div class="category-grid">
            <?php foreach ($sports_categories as $cat): ?>
                <div class="cat-card" style="background-color: <?php echo $cat['color']; ?>;">
                    <span><?php echo $cat['name']; ?></span>
                    <img src="<?php echo $cat['img']; ?>" alt="<?php echo $cat['name']; ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="section-header">
            <h3 class="section-title">Available Venues</h3>
            <div class="filter-bar" style="margin-bottom:0; background:none; border:none; padding:0;">
                <button class="tag active-orange">15 Sep</button>
                <button class="tag active-green">All</button>
                <button class="tag">Football</button>
                <button class="tag">Fitness</button>
            </div>
        </div>

        <div class="venue-grid">
            <?php foreach ($venues as $venue): ?>
                <div class="venue-card">
                    <div class="venue-img-wrapper">
                        <img src="<?php echo $venue['image']; ?>" alt="<?php echo $venue['name']; ?>">
                        <div class="heart-icon"><i class="far fa-heart"></i></div>
                    </div>
                    <div class="venue-info">
                        <div class="venue-name"><?php echo $venue['name']; ?></div>
                        <div class="venue-location">
                            <i class="fas fa-map-marker-alt" style="color:#888; margin-right:5px;"></i>
                            <?php echo $venue['location']; ?>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div class="rating-badge">
                                <i class="fas fa-star" style="font-size:10px;"></i> 
                                <?php echo $venue['rating']; ?> (<?php echo $venue['reviews']; ?>)
                            </div>
                            <span style="font-size:12px; color:#666;"><?php echo $venue['type']; ?></span>
                        </div>
                        
                        <div class="venue-footer">
                            <div class="features" style="color:#666;">
                                <i class="fas fa-wifi" title="Wifi"></i>
                                <i class="fas fa-shower" title="Shower"></i>
                                <i class="fas fa-parking" title="Parking"></i>
                            </div>
                            <button class="btn-book">Book Now</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>
</html>