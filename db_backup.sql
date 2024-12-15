-- Ở đây lưu trữ dữ liệu gốc để tránh trường hợp cơ sở dữ liệu bị lỗi
-- ducvancoder - 0587282880 - ducvan05102002@gmail.com 

CREATE TABLE restaurant_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    restaurant_name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    monday_thursday_hours VARCHAR(50) NOT NULL,
    friday_saturday_hours VARCHAR(50) NOT NULL,
    sunday_holiday_hours VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE website_config (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    favicon LONGBLOB NOT NULL, 
    logo_light LONGBLOB NOT NULL,
    logo_dark LONGBLOB NOT NULL, 
    menu_pdf LONGBLOB NOT NULL, 
    iframe_link TEXT NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO website_config (title, iframe_link)
VALUES (
    'Kiyoko - The Best Sushi',
    'https://app.resmio.com/kiyoko-restaurant/widget?backgroundColor=%23ffffff&borderRadius=10&color=%23555555&commentsDisabled=false&disableBranding=false&facebookLogin=true&fontSize=14px&height=460&id=kiyoko-restaurant&linkBackgroundColor=%2307a7c4&newsletterSignup=true&showLogo=false&style&width=330'
);

CREATE TABLE store_info (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  image LONGBLOB NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `slider_images` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `image_path` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `subtitle` VARCHAR(255) NOT NULL,
    `link` VARCHAR(255) NOT NULL,
    `order` INT NOT NULL DEFAULT 0
);
INSERT INTO `slider_images` (`image_path`, `title`, `subtitle`, `link`, `order`) VALUES
('wp-content/uploads/2022/05/p2.jpeg', 'The Finest Asian Cuisine', '', '../main/contact/', 1),
('wp-content/uploads/2022/05/p1.jpeg', 'unsere Geschichte', '', '../main/about-me/', 2),
('wp-content/uploads/2022/05/p3.jpeg', 'im Herzen von Saarbrücken', '', 'main/photos/menu.pdf', 3);

CREATE TABLE social_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    platform VARCHAR(50),  -- Tên mạng xã hội như Facebook, Instagram, Google
    link VARCHAR(255),     -- Đường dẫn đến mạng xã hội
    icon_class VARCHAR(255) -- Class của icon (ví dụ: socicon-facebook, socicon-instagram)
);
INSERT INTO social_links (platform, link, icon_class) 
VALUES 
    ('Facebook', 'https://www.facebook.com', 'socicon-facebook'),
    ('Instagram', 'https://www.instagram.com', 'socicon-instagram'),
    ('Google', 'https://www.google.com', 'socicon-google');
CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    snow_effect BOOLEAN DEFAULT 0, -- 1 = có tuyết, 0 = không có tuyết
    store_status ENUM('open', 'coming_soon') DEFAULT 'open' -- Trạng thái cửa hàng
);
INSERT INTO settings (snow_effect, store_status) VALUES (1, 'open');

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO users (username, password) 
VALUES ('admin', 'kiyoko123');