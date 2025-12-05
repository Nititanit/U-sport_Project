<?php
// --- Mock Data (ข้อมูลเดิม) ---
$sports_categories = [
    [ 'name' => 'Football', 'color' => '#ffe0b2'],
    [ 'name' => 'Fitness', 'color' => '#ffcdd2'],
];

$venues = [
    [
        'id' => 1,
        'name' => 'Stadium 1(VIP)',
        'location' => 'Khlong 6, Pathum Thani',
        'rating' => 4.0, 'reviews' => 4,
        'image' => 'assets/images/stadium1.jpg',
        'type' => 'Football'
    ],
    [
        'id' => 2,
        'name' => 'Stadium 2(VIP)',
        'location' => 'Khlong 6, Pathum Thani',
        'rating' => 4.5, 'reviews' => 12,
        'image' => 'assets/images/stadium1.jpg',
        'type' => 'Football'
    ],
    [
        'id' => 3,
        'name' => 'Stadium 3',
        'location' => 'Khlong 6, Pathum Thani',
        'rating' => 4.8, 'reviews' => 20,
        'image' => 'assets/images/stadium.jpg',
        'type' => 'Football'
    ],
    [
        'id' => 4,
        'name' => 'Stadium 4',
        'location' => 'Khlong 6, Pathum Thani',
        'rating' => 4.8, 'reviews' => 20,
        'image' => 'assets/images/stadium.jpg',
        'type' => 'Football'
    ],
    [
        'id' => 5,
        'name' => 'Fitness U Sport',
        'location' => 'Khlong 6, Pathum Thani',
        'rating' => 4.2, 'reviews' => 8,
        'image' => 'assets/images/fitness.png',
        'type' => 'Fitness'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U-Sport Booking (Bootstrap Version)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* Custom CSS (เขียนทับ Bootstrap บางส่วนเพื่อให้สวยงามตามธีมเดิม) */
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar Customization */
        .navbar-brand {
            font-weight: bold;
            color: red !important;
        }
        .nav-link.active {
            color: #2e7d32 !important;
            font-weight: 600;
        }

        /* Banner (ยังใช้ Custom เพราะเป็นดีไซน์เฉพาะ) */
        .promo-banner {
            color: #fff;
            border-radius: 20px;
            padding: 50px;
            position: relative;
            align-items: center; 
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .promo-img img { 
            height: fit-content;
            object-fit: contain;
            margin-left: 50px;
        }

        /* Category Cards (Custom Design) */
        .cat-card {
            height: 120px;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
            padding: 15px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .cat-card:hover { 
            transform: translateY(-5px); 
        }

        .cat-card span { 
            font-weight: bold; 
            font-size: 1.2rem; 
            color: #333; 
            position: relative; 
            z-index: 2; 
        }
        .cat-card img { 
            position: absolute; 
            right: -10px; 
            bottom: -10px; 
            height: 100px; 
            opacity: 0.8; 
        }

        /* Customizing Bootstrap Card */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            transition: box-shadow 0.3s;
        }
        .card:hover { 
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
         }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .heart-icon {
            position: absolute; 
            top: 10px; 
            right: 10px;
            background: rgba(255,255,255,0.9); 
            padding: 8px;
            border-radius: 50%; 
            color: #aaa; 
            cursor: pointer;
            transition: color 0.3s;
        }
        .heart-icon:hover { 
            color: #f44336;
        }
        
        .rating-badge {
            background-color: #4caf50; 
            color: #fff;
            padding: 2px 8px; 
            border-radius: 4px; 
            font-size: 0.8rem;
        }
        
        /* Filter Tags */
        .btn-filter {
            border-radius: 20px;
            border: 1px solid #ddd;
            background: #fff;
            color: #666;
            margin-right: 5px;
        }

        .btn-filter.active-green { 
            background-color: #00c853; 
            color: white; 
            border-color: #00c853; 
        }

        .btn-filter.active-orange { 
            background-color: #ff3d00; 
            color: white; 
            border-color: #ff3d00; 
        }

        /* Search Box Wrapper */
        .search-wrapper { 
            position: relative; 
        }
        .search-wrapper i { 
            position: absolute; 
            right: 15px; 
            top: 50%; 
            transform: translateY(-50%); 
            color: #888; 
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="#">
              U-Sport
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex mx-auto my-3 my-lg-0 search-wrapper" style="width: 100%; max-width: 400px;">
                    <input class="form-control rounded-pill ps-3 pe-5" type="search" placeholder="Find sports, venues..." aria-label="Search">
                    <i class="fas fa-search"></i>
                </form>

                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-home"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-futbol"></i> Venues</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-calendar-check"></i> My Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user-circle"></i> Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        
        <div class="promo-banner mb-5">
            <div class="row align-items-center">
                <div class="col-md-4 text-center text-md-end mt-3 mt-md-0 promo-img">
                    <img src="assets/images/Promo_u-sport.jpg" alt="Sport Player">
                </div>
            </div>
        </div>

        <h3 class="h4 mb-3 fw-bold">Explore Sports</h3>
        <div class="row g-3 mb-5">
            <?php foreach ($sports_categories as $cat): ?>
                <div class="col-6 col-md-3">
                    <div class="cat-card h-100" style="background-color: <?php echo $cat['color']; ?>;">
                        <span><?php echo $cat['name']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="h4 fw-bold mb-0">Available Venues</h3>
            <div class="d-none d-md-block">
                <button class="btn btn-sm btn-filter active-orange">15 Sep</button>
                <button class="btn btn-sm btn-filter active-green">All</button>
                <button class="btn btn-sm btn-filter">Football</button>
                <button class="btn btn-sm btn-filter">Fitness</button>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($venues as $venue): ?>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100">
                        <div class="position-relative">
                            <img src="<?php echo $venue['image']; ?>" class="card-img-top" alt="<?php echo $venue['name']; ?>">
                            <div class="heart-icon"><i class="far fa-heart"></i></div>
                        </div>
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold mb-1"><?php echo $venue['name']; ?></h5>
                            <p class="card-text text-muted small mb-2">
                                <i class="fas fa-map-marker-alt me-1"></i> <?php echo $venue['location']; ?>
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="rating-badge">
                                    <i class="fas fa-star fa-xs me-1"></i> <?php echo $venue['rating']; ?> (<?php echo $venue['reviews']; ?>)
                                </span>
                                <small class="text-muted"><?php echo $venue['type']; ?></small>
                            </div>

                            <div class="mb-3 text-muted">
                                <i class="fas fa-wifi me-2" title="Wifi"></i>
                                <i class="fas fa-shower me-2" title="Shower"></i>
                                <i class="fas fa-parking" title="Parking"></i>
                            </div>

                            <a href="details-1.php?id=<?php echo $venue['id']; ?>" class="btn btn-success w-100 mt-auto fw-bold">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>