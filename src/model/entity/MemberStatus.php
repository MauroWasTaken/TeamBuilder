<?php

namespace Teambuilder\model\entity;

class MemberStatus extends Entity
{

    //region Fields

    protected const TABLE_NAME = 'memberstatus';

    protected string $name;
    protected string $slug;

    //endregion
}
