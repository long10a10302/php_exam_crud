CREATE DATABASE C2312L
use c2312L;
CREATE TABLE books (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) UNIQUE,
    author VARCHAR(100),
    price FLOAT
);

INSERT INTO books (title, author, price)
VALUES
    ('The Great Gatsby', 'F. Scott Fitzgerald', 12.99),
    ('To Kill a Mockingbird', 'Harper Lee', 9.99),
    ('1984', 'George Orwell', 7.50),
    ('Pride and Prejudice', 'Jane Austen', 8.75),
    ('Harry Potter and the Sorcerer''s Stone', 'J.K. Rowling', 10.99);