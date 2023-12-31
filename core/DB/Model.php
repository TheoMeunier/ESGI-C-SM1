<?php

namespace Core\DB;

class Model extends DB
{
    private string $table;
    private mixed $entity;

    public function __construct(mixed $entity)
    {
        parent::__construct();
        $this->entity = $entity;
        $this->table  = $this->getTableName();
    }

    public function find(int $id): object
    {
        $class  = get_called_class();
        $object = new $class();

        return $object->getOneBy(['id' => $id], 'object');
    }

    public function getAll(): array
    {
        $sql = 'SELECT * FROM '. $this->table . ' WHERE is_deleted = 0';
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute();

        return $queryPrepared->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }

    public function paginate(int $perPage, int $currentPage): array
    {
        $sql = 'SELECT * FROM '.$this->table.' WHERE is_deleted = 0 LIMIT '.($currentPage - 1) * $perPage.','.$perPage;
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute();

        return $queryPrepared->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }

    public function getOneBy(array $data, string $return = 'array')
    {
        $sql = 'SELECT * FROM '.$this->table.' WHERE ';

        foreach ($data as $column => $value) {
            $sql .= ' '.$column.'=:'.$column.' AND';
        }

        $sql = substr($sql, 0, -3);

        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($data);

        if ('object' == $return) {
            $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        }

        return $queryPrepared->fetch();
    }

    public function save(): void
    {
        $data = $this->getDataObject();

        if (empty($this->entity->getId())) {
            $sql = 'INSERT INTO '.$this->table.'('.implode(',', array_keys($data)).') 
            VALUES (:'.implode(',:', array_keys($data)).')';
        } else {
            $sql = 'UPDATE '.$this->table.' SET ';

            foreach ($data as $column => $value) {
                $sql .= $column.'=:'.$column.',';
            }

            $sql = rtrim($sql, ',');
            $sql .= ' WHERE id = :id';
            $data['id'] = $this->entity->getId();
        }

        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($data);
    }

    public function delete(): void
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute(['id' => $this->entity->getId()]);
    }

    public function getDataObject(): array
    {
        return array_diff_key(get_object_vars($this), get_class_vars(get_class()));
    }

    private function getTableName(): string
    {
        $table = get_called_class();
        $table = explode('\\', $table);
        $table = array_pop($table);

        $table = preg_replace('/(?<!^)([A-Z])/', '_$1', $table);

        return config('database.prefix'). '_' .strtolower($table);
    }
}
