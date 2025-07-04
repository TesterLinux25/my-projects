<?php
class ArticlesModel extends Model{
	public function Index(){
		$this->query('SELECT title, content, create_at, username FROM articles INNER JOIN users ON articles.user_id= users.id');
		$rows = $this->resultSet();
		return $rows;
	}
}