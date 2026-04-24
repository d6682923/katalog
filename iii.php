-- Переключение на базу данных product (если она уже создана)
USE product;

-- Создание таблицы categories
CREATE TABLE categories (
    id_cat INT NOT NULL,
    category VARCHAR(60),
    PRIMARY KEY (id_cat)
);

INSERT INTO categories (id_cat, category) VALUES
(1, 'Молочные продукты'),
(2, 'Хлебобулочные изделия'),
(3, 'Кондитерские изделия');