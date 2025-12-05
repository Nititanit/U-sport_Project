<?php
// --- 1. รับค่า ID จาก URL ---
// ถ้ามีค่าส่งมา (เช่น ?id=2) ให้ใช้ค่านั้น ถ้าไม่มีให้เริ่มที่ 1
$venue_id = isset($_GET['id']) ? $_GET['id'] : 1;

// --- 2. ข้อมูลจำลอง (ต้องมีข้อมูลเหมือนหน้า index เพื่อให้ดึงมาโชว์ได้) ---
$venues_data = [
    1 => [
        'name' => 'Stadium 1(VIP)',
        'location' => 'Khlong 6, Pathum Thani',
        'rating' => 4.0, 'reviews' => 4,
        'image' => 'assets/images/stadium1.jpg',
        'type' => 'Football',
        'amenities' => ['UPI Accepted', 'Card Accepted', 'Free Parking', 'Toilets', 'Showers']
    ],
    2 => [
        'name' => 'Stadium 2(VIP)',
        'location' => 'Khlong 6, Pathum Thani',
        'rating' => 4.5, 'reviews' => 12,
        'image' => 'assets/images/stadium1.jpg',
        'type' => 'Football',
        'amenities' => ['Parking', 'Drinking Water', 'Changing Room']
    ],
    3 => [
        'name' => 'Stadium 3',
        'location' => 'Khlong 6, Pathum Thani',
        'rating' => 4.8, 'reviews' => 20,
        'image' => 'assets/images/stadium.jpg',
        'type' => 'Football',
        'amenities' => ['Wifi', 'Cafe', 'Pro Shop', 'Lockers']
    ],
    4 => [
        'name' => 'Stadium 4',
        'location' => 'Khlong 6, Pathum Thani',
        'rating' => 4.8, 'reviews' => 20,
        'image' => 'assets/images/stadium.jpg',
        'type' => 'Football',
        'amenities' => ['Wifi', 'Cafe', 'Pro Shop', 'Lockers']
    ],
    5 => [
        'name' => 'Fitness U Sport',
        'location' => 'Khlong 6, Pathum Thani',
        'rating' => 4.2, 'reviews' => 8,
        'image' => 'assets/images/fitness.png',
        'type' => 'Fitness',
        'amenities' => ['AC', 'Trainer', 'Supplements']
    ]
];

// --- 3. เลือกข้อมูลให้ตรงกับ ID ---
// ถ้า ID ที่ส่งมาไม่มีในระบบ ให้ใช้ข้อมูลตัวที่ 1 เป็นค่าเริ่มต้น
$current_venue = isset($venues_data[$venue_id]) ? $venues_data[$venue_id] : $venues_data[1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $current_venue['name']; ?> - Details</title> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* CSS เดิมที่เคยให้ไป (ย่อเพื่อความกระชับ) */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background-color: #f5f7fa; 
            color: #333; 
        }
        .navbar { 
            background-color: #fff; 
            padding: 15px 0; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); 
            margin-bottom: 30px; 
        }
        .nav-container { 
            max-width: 1100px; 
            margin: 0 auto; 
            padding: 0 20px; 
            display: flex; 
            align-items: center; 
            gap: 10px; 
        }
        .container { 
            max-width: 1100px; 
            margin: 0 auto; 
            padding: 0 20px; 
            display: grid; 
            grid-template-columns: 1.2fr 0.8fr; 
            gap: 40px; 
            margin-bottom: 50px; 
        }
        
        .main-image { 
            width: 100%; 
            height: 500px; 
            object-fit: cover; 
            border-radius: 16px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); 
        }
        .details-section { 
            background: #fff; 
            padding: 30px; 
            border-radius: 16px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
            height: fit-content; 
        }
        
        .venue-header { 
            display: flex; 
            justify-content: space-between; 
            align-items: flex-start; 
            margin-bottom: 15px; 
        }
        .venue-title h1 { 
            font-size: 28px; 
            margin-bottom: 5px; 
        }
        .rating-box { 
            background-color: #4caf50; 
            color: #fff; 
            padding: 4px 8px; 
            border-radius: 6px; 
            font-weight: bold; 
            font-size: 14px; 
            display: inline-flex; 
            align-items: center; 
        }
        
        .action-buttons { 
            display: flex; 
            gap: 15px; 
            margin-bottom: 30px; 
            border-bottom: 1px solid #eee; 
            padding-bottom: 20px; 
        }

        .btn { 
            padding: 10px 20px; 
            border-radius: 8px; 
            border: none; 
            cursor: pointer; 
            font-weight: 600; 
            color: white; 
        }

        .btn-direction { 
            background-color: #ff3d00; 
            flex: 1; 
        }

        .btn-call { 
            background-color: #00c853; 
        }
        
        .info-group { 
            margin-bottom: 20px; 
        }

        .info-label { 
            font-weight: bold; 
            margin-bottom: 10px; 
            display: block; 
        }

        .tag-pill { 
            display: inline-block; 
            border: 1px solid #2e7d32; 
            color: #2e7d32; 
            padding: 5px 20px; 
            border-radius: 20px; 
            background: #fff; 
        }
        
        .amenities-list { 
            list-style: none; 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 12px; 
        }

        .amenity-item i { 
            color: #00c853; 
            width: 25px; 
        }
        
        .btn-select-slot { 
            width: 100%; 
            background-color: #00c853; 
            color: white; 
            padding: 15px; 
            border: none; 
            border-radius: 8px; 
            font-weight: bold; 
            cursor: pointer; 
            text-transform: uppercase;
             margin-top: 20px; 
            }

        @media (max-width: 768px) { 
            .container { grid-template-columns: 1fr; } 
            .main-image { height: 300px; } }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" style="color: #333; text-decoration: none;">
                <i class="fas fa-arrow-left" style="font-size: 20px; margin-right: 10px;"></i>
            </a>
            <div class="logo" style="font-weight:bold; font-size:22px; color:#2e7d32;">U-Sport</div>
        </div>
    </nav>

    <div class="container">
        <div class="gallery-section">
            <img src="<?php echo $current_venue['image']; ?>" alt="<?php echo $current_venue['name']; ?>" class="main-image">
        </div>

        <div class="details-section">
            <div class="venue-header">
                <div class="venue-title">
                    <h1><?php echo $current_venue['name']; ?></h1> 
                    <div class="rating-box">
                        <i class="fas fa-star" style="margin-right:4px;"></i> 
                        <?php echo $current_venue['rating']; ?>
                        <span style="font-weight:normal; margin-left:5px; color:#eee;">[<?php echo $current_venue['reviews']; ?> Reviews]</span>
                    </div>
                </div>
                <i class="far fa-heart" style="font-size:24px; color:#2e7d32; cursor:pointer;"></i>
            </div>

            <div class="action-buttons">
                <button class="btn btn-direction">Get Direction</button>
                <button class="btn btn-call"><i class="fas fa-phone-alt"></i></button>
            </div>

            <div class="info-group">
                <span class="info-label">Type</span>
                <span class="tag-pill"><?php echo $current_venue['type']; ?></span>
            </div>

            <div class="info-group">
                <span class="info-label">Location</span>
                <span style="color:#666;"><?php echo $current_venue['location']; ?></span>
            </div>
            

            <div class="info-group">
                <span class="info-label">Amenities</span>
                <ul class="amenities-list">
                    <?php foreach($current_venue['amenities'] as $amenity): ?>
                        <li class="amenity-item">
                            <i class="fas fa-check-circle"></i> <?php echo $amenity; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <button class="btn-select-slot">Proceed to select a slot</button>
        </div>
    </div>

</body>
</html>