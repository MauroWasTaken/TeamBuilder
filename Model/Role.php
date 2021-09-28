<?php

class Role
{
    static function make(array $fields): Role
    {
        return new Role();
    }

    static function find($id): ?Role
    {
        return new Role();
    }

    static function all(): array
    {
        return [];
    }

    static function destroy($id): bool
    {
        return true;
    }

    function create(): bool
    {
        return true;
    }

    function save(): bool
    {
        return true;
    }

    function delete(): bool
    {
        return true;
    }
}