<?php


class CategoryModel extends Database
{
    const TABLE = 'categories';

    public static function getAll()
    {
        $sql = "SELECT title, background FROM " . self::TABLE . ";";
        $query = self::_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return json_encode($data);
    }

}