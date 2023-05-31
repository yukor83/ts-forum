CREATE TABLE Forum (
  forum_id INT PRIMARY KEY AUTO_INCREMENT,
  forum_name VARCHAR(255) NOT NULL,
  forum_description TEXT,
  created_at TIMESTAMP NOT NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;