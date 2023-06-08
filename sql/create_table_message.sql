CREATE TABLE Messages (
  id INT PRIMARY KEY AUTO_INCREMENT,
  topic_id INT NOT NULL,
  user_id INT NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL,
  FOREIGN KEY (topic_id) REFERENCES Topic(topic_id),
  FOREIGN KEY (user_id) REFERENCES User(user_id)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;