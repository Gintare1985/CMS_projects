<?php

class Comment extends Db_object {

	protected static $db_table = "comments";
	protected static $db_table_fields = array('id', 'photo_id', 'author', 'body', 'comment_date');
	public $id;
	public $photo_id;
	public $author;
	public $body;
	public $comment_date;


	public static function create_comment($photo_id, $author="John", $body="", $comment_date=""){

		if(!empty($photo_id) && !empty($author) && !empty($body)) {

			$comment = new Comment();

			$comment->photo_id		= (int)$photo_id;
			$comment->author		= $author;
			$comment->body			= $body;
			$comment->comment_date 	= $comment_date;

			return $comment;

		} else {
			return false;
		}
	}

	public static function find_the_comments($photo_id=0) {

		global $database;

		$sql = "SELECT * FROM " . self::$db_table;
		$sql .= " WHERE photo_id = " . $database->escape_string($photo_id);
		$sql .= " ORDER BY id DESC";

		return self::find_by_query($sql);

	}

} // End of User Class









?>
