<?php

class CategoryManager extends AbstractManager {

    public function getAllCategories(): array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categoriesDB = $query->fetchAll(PDO::FETCH_ASSOC);
        $categoriesTab = [];
        foreach ($categoriesDB as $categoryDB) {
            $category = new Category($categoryDB['id'], $categoryDB['category_name']);
            $categoriesTab[] = $category;
        }
        return $categoriesTab;
    }

    public function getCategoryById(int $id): ?Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $query->execute(['id' => $id]);
        $categoryDB = $query->fetch(PDO::FETCH_ASSOC);

        if ($categoryDB) {
            return new Category($categoryDB['id'], $categoryDB['category_name']);
        }

        return null;
    }

    public function createCategory(string $categoryName): ?Category
    {
        $query = $this->db->prepare('INSERT INTO categories (category_name) VALUES (:categoryName)');
        $success = $query->execute(['categoryName' => $categoryName]);

        if ($success) {
            $categoryId = $this->db->lastInsertId();
            return new Category($categoryId, $categoryName);
        }

        return null;
    }



    public function deleteCategory(int $id): bool
    {
        $query = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        $success = $query->execute(['id' => $id]);

        return $success;
    }
}
