<?php


namespace App\Model;

class HistoryManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'history';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectAll(): array
    {
        $statement = $this->pdo->prepare("SELECT * from history h join recipe r on r.id=h.recipe_id 
join onigiri o on o.id=r.ingredient_id join step s on s.id=r.preparation_id");
        $statement->execute();

        return $statement->fetch();
    }

    public function selectOneById(int $id)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * from history h join recipe r on r.id=h.recipe_id 
join onigiri o on o.id=r.ingredient_id join step s on s.id=r.preparation_id WHERE h.id=:id");
        $statement->bindValue('id', $id);
        $statement->execute();

        return $statement->fetch();
    }
}
