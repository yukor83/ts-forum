CREATE TABLE Topic (
  topic_id INT PRIMARY KEY AUTO_INCREMENT,
  forum_id INT NOT NULL,
  user_id INT NOT NULL,
  topic_title VARCHAR(255) NOT NULL,
  topic_description TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL,
  FOREIGN KEY (forum_id) REFERENCES Forum(forum_id),
  FOREIGN KEY (user_id) REFERENCES User(user_id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;