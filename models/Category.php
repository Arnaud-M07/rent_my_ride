<?php

class Category
{
    // ATTRIBUTS
    private ?int $id_category;
    private string $name;

    // METHODES
    // CONSTRUCT
    public function __construct(int $id_category = null, string $name)
    {
        $this->id_category = $id_category;
        $this->name = $name;
    }

    // SETTERS / GETTERS
    // $name
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }

    // $idCategory
    public function setIdCategory(int $id_category)
    {
        $this->id_category = $id_category;
    }
    public function getIdCategory(): int
    {
        return $this->id_category;
    }
}

// $berline = new Category('berline');
// $berline->setName('berline')
