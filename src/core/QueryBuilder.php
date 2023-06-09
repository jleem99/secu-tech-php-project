<?php

namespace Core;

class QueryBuilder
{
	private $dataSource;
	private $query;
	private $parameters = [];

	public function __construct(RelationalDataSource $dataSource)
	{
		$this->dataSource = $dataSource;
	}

	public function select($table, $columns = '*')
	{
		$this->query = "SELECT $columns FROM $table";
		return $this;
	}

	public function where($column, $value)
	{
		$this->query .= " WHERE $column = :$column";
		$this->parameters[$column] = $value;
		return $this;
	}

	public function get()
	{
		return $this->dataSource->execute($this->query, $this->parameters);
	}
}
