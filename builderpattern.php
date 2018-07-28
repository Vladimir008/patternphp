<?php
    namespace pattern\builder;

    interface SQLQueryBuilder{
        public function select(string $table,array $fields):SQLQueryBuilder;
        public function where (string $field,string $vaule,string $operator = '='):SQLQueryBuilder;
        public function limit(int $start,int $offset):SQLQueryBuilder;
        public function getSQL():string;
    }

    class MysqlQueryBuilder implements SQLQueryBuilder{
        protected $query;

        protected function reset(){
            $this->query=new \StdClass();
        }
        public function select(string $table, array $fields): SQLQueryBuilder
        {
            $this->reset();
            $this->query->base="SELECT ".implode(",",$fields)." FROM ".$table;
            $this->query->type="select";
            return $this;
        }
        public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
        {
            if (!in_array($this->query->type, ['select', 'update'])) {
                throw new \Exception("WHERE can only be added to SELECT OR UPDATE");
            }
            $this->query->where[] = "$field $operator '$value'";

            return $this;
        }

        /**
         * Добавление ограничения LIMIT.
         */
        public function limit(int $start, int $offset): SQLQueryBuilder
        {
            if (!in_array($this->query->type, ['select'])) {
                throw new \Exception("LIMIT can only be added to SELECT");
            }
            $this->query->limit = " LIMIT " . $start . ", " . $offset;

            return $this;
        }

        /**
         * Получение окончательной строки запроса.
         */
        public function getSQL(): string
        {
            $query = $this->query;
            $sql = $query->base;
            if (!empty($query->where)) {
                $sql .= " WHERE " . implode(' AND ', $query->where);
            }
            if (isset($query->limit)) {
                $sql .= $query->limit;
            }
            $sql .= ";";
            return $sql;
        }

    }

    function clientCode(SQLQueryBuilder $queryBuilder)
    {
        // ...

        $query = $queryBuilder
            ->select("users", ["name", "email", "password"])
            ->where("age",18,">")
            ->getSQL();
        print($query);

        // ...
    }

    print("Testing MySQL query builder:\n");
    clientCode(new MysqlQueryBuilder());