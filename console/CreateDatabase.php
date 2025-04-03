<?php
class CreateDatabase
{
    public function run()
    {
        $db = new Database();
        $db->createTables();
    }
}
