<?php

interface iCRUD
{
    public function create($params, $table);
    public function read($table);
    public function edit($donnees, $id, $table);
    public function delete($id, $table);
}
